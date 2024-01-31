<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\mokashers\StoreMokasherRequest;
use App\Http\Requests\Web\Admin\mokashers\UpdateMokasherRequest;
use App\Http\Requests\Web\Admin\users\StoremokasharatInputs;
use Illuminate\Support\Facades\Auth;
use App\Models\{Execution_year, Mokasher, MokasherExecutionYear, MokasherGehaInput};
use App\Models\MokasherInput;
use App\Models\User;
use App\Traits\ResponseJson;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

// Alias the Validator facade
use Symfony\Component\HttpFoundation\Response;

class MokasherController extends Controller
{
    use ResponseJson;

    public function __construct(private readonly Mokasher $mokasherModel)
    {
    }

    public function show($program_id = null): \Illuminate\View\View
    {
        $selectedYear = Execution_year::whereHas('MokasherExcutionYears', function ($query) {
            $query->where('value', '!=', '0');
        })->where('selected', 1)->first();


        if ($selectedYear) {
            $selectedYearId = $selectedYear->id;
            $mokashert = $this->mokasherModel
                ->whereHas('mokasher_execution_years', function ($query) use ($selectedYearId) {
                    $query->where('year_id', $selectedYearId)->where('value', '!=', '0');
                })->with('mokasher_inputs' ,'mokasher_geha_inputs' ,'addedBy_fun', 'program')
                ->where('program_id', $program_id)
                ->get();
        } else {
            $mokashert = collect(); // Empty collection if no selected year is found
        }
        return view('gehat.moksherat.index', compact('mokashert', 'program_id'));
    }
    public function create(): \Illuminate\View\View
    {
        return view('gehat.moksherat.create');
    }

    public function store(StoreMokasherRequest $StoreMokasherRequest): \Illuminate\Http\JsonResponse
    {
        $this->mokasherModel->create($StoreMokasherRequest->validated());
        return $this->responseJson(['type' => 'success', 'message' => ' تم أضافه المؤشر بنجاح'], Response::HTTP_CREATED);
    }

    public function destroy($mokasher_id = null): \Illuminate\Http\RedirectResponse
    {
        $found_mokaser = Mokasher::find($mokasher_id);
        $program_id = $found_mokaser->program_id;
        $found_mokaser->delete();
        return redirect()->route('gehat.moksherat.show', $program_id)->with('success', ' تم  حذف المؤشر  بنجاح');
    }

    public function edit(Mokasher $mokasher): \Illuminate\Http\JsonResponse
    {
        return $this->responseJson(['data' => $mokasher], Response::HTTP_OK);
    }

    public function update(UpdateMokasherRequest $UpdateMokasherRequest, Mokasher $mokasher): \Illuminate\Http\RedirectResponse
    {
        $mokasher->update($UpdateMokasherRequest->validated());
        return redirect()->route('gehat.moksherat.show', $mokasher->program_id)->with('success', ' تم  تعديل  المؤشر بنجاح');
    }

    public function mokaseerinput($mokasher_id)
    {

        $users = User::where('geha_id' , Auth::user()->id)->get();
        $mokasher_kehta = Mokasher::with('program.goal.objective.kheta')->where('id', $mokasher_id)->first();
        $stored_kheta_id =  $mokasher_kehta->program->goal->objective->kheta->id ;  //الحصول   على id  الخطه
        $selected_year = Execution_year::whereHas('MokasherExcutionYears')
            ->where(['kheta_id' => $stored_kheta_id, 'selected' => 1])
            ->first();
        $selected_year_value = MokasherExecutionYear::where(['mokasher_id' => $mokasher_id, 'year_id' => $selected_year->id])
            ->first();
        $mokasher = Mokasher::with(['mokasher_geha_inputs' => function($query) use($selected_year_value){
             $query->where('year_id' , $selected_year_value->year_id);
        }])->with('program.goal.objective.kheta' ,'mokasher_inputs')->where('id', $mokasher_id)->first();

        return view('gehat.moksherat.create_mokaseerinput', compact('users', 'mokasher_id', 'mokasher' ,'selected_year_value' ,'selected_year'));
    }

    public function store_mokaseerinput(StoremokasharatInputs $StoremokasharatInputs)
    {
        // Create a new instance of MokasherInput and save to the database
        MokasherInput::create($StoremokasharatInputs->validated());
        // Redirect back or return a response
        return redirect()->back()->with('success', 'تم أضافه بيانات المؤشر بنجاح');
    }

    public function redirect_mokasher(Request $request, $id)
    {
        $validate = ValidatorFacade::make($request->all(), [
            'target' => 'required',
            'mokasher_id' => 'required',
            'sub_geha_id' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', 'يوجد خطا  ما  ');
        }

        MokasherGehaInput::updateOrCreate(
            [
                'mokasher_id' => $request->mokasher_id,
                'year_id' => $request->year_id,
                'geha_id' => Auth::user()->id
            ],
            [
                'sub_geha_id' => $request->sub_geha_id,
                'target' => $request->target,
                'part_1' => $request->part_1,
                'part_2' => $request->part_2,
                'part_3' => $request->part_3,
                'part_4' => $request->part_4,
            ]
        );
        return redirect()->back()->with('success', 'تم توجيه المؤشر  للجهه بنجاح ');
    }

        public function sub_geha_moksherat()
    {
        $mokashert = Mokasher::whereHas('mokasher_geha_inputs', function ($query) {
            $query->where('sub_geha_id', Auth::user()->id);
        })->with(['mokasher_geha_inputs' => function ($query) {
            $query->where('sub_geha_id', Auth::user()->id);
        }])->get();
        return view('sub_geha.moksherat.index', compact('mokashert'));
    }

    public function sub_geha_mokaseerinput($id)
    {
        $mokasher = Mokasher::with('mokasher_geha_inputs')->where('id', $id)->first();
        return view('sub_geha.moksherat.mokasher_data.create', compact('mokasher'));
    }

    public function store_sub_geha_mokasher_input(Request $request, $id)
    {

        if (!empty($request->part)) {
            $input = MokasherGehaInput::updateOrCreate(
                [
                    'geha_id' => $request->input('geha_id'),
                    'mokasher_id' => $request->input('mokasher_id')
                ],
                [
                    'vivacity' => $request->input('vivacity'),
                    'target' => $request->input('target'),
                    'part_1' => $request->input('part_1'),
                    'part_2' => $request->input('part_2'),
                    'part_3' => $request->input('part_3'),
                    'part_4' => $request->input('part_4'),
                    'impediments' => $request->input('impediments'),
                ]
            );

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file1');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);

                // Merge new file with stored files
                $existingFilePaths = $input->files ? json_decode($input->files, true) : [];
                $existingFilePaths[] = $fileName;
                $input->files = json_encode($existingFilePaths);
            }

            $input->save();
        }

        return redirect()->back()->with('success', 'لقد تم أدخال  بيانات المؤشر بنجاح ');
    }

    /** Custom Function  To Store  الادله والشواهد والمعواقات  للجهات  */
    public function store2_sub_geha_mokasher_input(Request $request, $id)
    {
        if(!empty($request->part)) {
            if($request->part == 'part_1'){
                $input = MokasherGehaInput::updateOrCreate(
                    [
                        'sub_geha_id' => $request->input('geha_id'),
                        'mokasher_id' => $request->input('mokasher_id') ,
                        'year_id' => $request->input('year_id')
                    ],
                    [
                        'vivacity1' => $request->input('vivacity1'),
                        'impediments1' => $request->input('impediments1'),
                    ]
                );
                // Retrieve existing file paths
                if ($request->hasFile('file1')) {
                    $file = $request->file('file1');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $fileName);

                    // Merge new file with stored files
                    $existingFilePaths = $input->evidence1 ? json_decode($input->evidence1, true) : [];
                    $existingFilePaths[] = $fileName;
                    $input->evidence1 = json_encode($existingFilePaths);
                }
                $input->save();

                return redirect()->back()->with('success', 'لقد تم أدخال  بيانات الربع الأول  بنجاح ');
            }
            if($request->part == 'part_2'){
                $input = MokasherGehaInput::updateOrCreate(
                    [
                        'sub_geha_id' => $request->input('geha_id'),
                        'mokasher_id' => $request->input('mokasher_id') ,
                        'year_id' => $request->input('year_id')
                    ],
                    [
                        'vivacity2' => $request->input('vivacity2'),
                        'impediments2' => $request->input('impediments2'),
                    ]
                );
                // Retrieve existing file paths
                if ($request->hasFile('files2')) {
                    $file = $request->file('files2');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $fileName);

                    // Merge new file with stored files
                    $existingFilePaths = $input->evidence2 ? json_decode($input->evidence2, true) : [];
                    $existingFilePaths[] = $fileName;
                    $input->evidence2 = json_encode($existingFilePaths);
                }
                $input->save();

                return redirect()->back()->with('success', 'لقد تم أدخال  بيانات الربع الثانى  بنجاح ');
            }
            if($request->part == 'part_3'){
                $input = MokasherGehaInput::updateOrCreate(
                    [
                        'sub_geha_id' => $request->input('geha_id'),
                        'mokasher_id' => $request->input('mokasher_id') ,
                        'year_id' => $request->input('year_id')
                    ],
                    [
                        'vivacity3' => $request->input('vivacity3'),
                        'impediments3' => $request->input('impediments3'),
                    ]
                );
                // Retrieve existing file paths
                $existingFilePaths = $input->evidence3 ? json_decode($input->evidence3, true) : [];
                // Handle file uploads
                if ($request->hasFile('files3')) {
                    $file = $request->file('files3');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $fileName);

                    // Merge new file with stored files
                    $existingFilePaths = $input->evidence3 ? json_decode($input->evidence3, true) : [];
                    $existingFilePaths[] = $fileName;
                    $input->evidence3 = json_encode($existingFilePaths);
                }
                $input->save();

                return redirect()->back()->with('success', 'لقد تم أدخال  بيانات الربع الثالث   بنجاح ');
            }
            if($request->part == 'part_4'){
                $input = MokasherGehaInput::updateOrCreate(
                    [
                        'sub_geha_id' => $request->input('geha_id'),
                        'mokasher_id' => $request->input('mokasher_id') ,
                        'year_id' => $request->input('year_id')
                    ],
                    [
                        'vivacity4' => $request->input('vivacity4'),
                        'impediments4' => $request->input('impediments4'),
                    ]
                );
                // Retrieve existing file paths
                $existingFilePaths = $input->evidence4 ? json_decode($input->evidence4, true) : [];
                // Handle file uploads
                if ($request->hasFile('files4')) {
                    $file = $request->file('files4');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $fileName);

                    // Merge new file with stored files
                    $existingFilePaths = $input->evidence4 ? json_decode($input->evidence4, true) : [];
                    $existingFilePaths[] = $fileName;
                    $input->evidence4 = json_encode($existingFilePaths);
                }
                $input->save();

                return redirect()->back()->with('success', 'لقد تم أدخال  بيانات الربع الثالث   بنجاح ');
            }
        }
    }
    public function  mokasherData($id)
    {
      $mokaser_data  =  Mokasher::with('mokasher_geha_inputs' , 'mokasher_inputs')->where('id' , $id)->first() ;
      return view('gehat.moksherat.show' , compact('mokaser_data')) ;
    }
    public function delete_file(Request $request)
    {
        $id = $request->id;
        // Assuming $mokasher is your model instance with the files column
        $mokasher = MokasherGehaInput::where('mokasher_id', $request->mokasher_id)->first();

        if (!$mokasher) {
            return redirect()->back()->with('error', 'تعذر العثور على الملف');
        }

        // Retrieve the file paths from the database
        $files = json_decode($mokasher->files, true);

        // Check if the file with the specified key exists
        if (array_key_exists($id, $files)) {
            // Retrieve the file path
            $filePath = $files[$id];

            // Delete the file from storage
            Storage::delete($filePath);

            // Remove the file path from the array
            unset($files[$id]);

            // Update the database with the modified file paths array
            $mokasher->files = json_encode($files);
            $mokasher->save();

            return redirect()->back()->with('success', 'تم حذف الملف بنجاح');
        }

        return redirect()->back()->with('error', 'تعذر العثور على الملف');
    }
    public  function update_mokasher_parts(Request $request)
    {
        if($request->part == 1 ) {
            MokasherGehaInput::where('id', $request->mokasher_geha_id)->update(['part_1' => $request->part_1]) ;
        }else if($request->part == 2)
        {
            MokasherGehaInput::where('id', $request->mokasher_geha_id)->update(['part_2'=> $request->part_2]) ;
        }
        else if($request->part == 3)
        {
            MokasherGehaInput::where('id', $request->mokasher_geha_id)->update(['part_3'=> $request->part_3]) ;
        }
        else if($request->part == 4)
        {
            MokasherGehaInput::where('id', $request->mokasher_geha_id)->update(['part_4'=> $request->part_4]) ;
        }
        return redirect()->back()->with('success' ,  'تم  تعديل  بيانات  المؤشر بنجاح ') ;
    }
}

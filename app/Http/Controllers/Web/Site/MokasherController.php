<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\mokashers\StoreMokasherRequest;
use App\Http\Requests\Web\Admin\mokashers\UpdateMokasherRequest;
use App\Http\Requests\Web\Admin\users\StoremokasharatInputs;
use Illuminate\Support\Facades\Auth;
use App\Models\{Mokasher, MokasherGehaInput};
use App\Models\MokasherInput;
use App\Models\User;
use App\Traits\ResponseJson;
use Dotenv\Validator;
use Illuminate\Http\Request;
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
        $mokashert = $this->mokasherModel->with('addedBy_fun')->where('program_id', $program_id)->get();
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
        $users = User::get();
        $mokasher = Mokasher::with('mokasher_inputs')->where('id', $mokasher_id)->first();
        return view('gehat.moksherat.create_mokaseerinput', compact('users', 'mokasher_id', 'mokasher'));
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
            'geha_id' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', 'يوجد خطا  ما  ');
        }

        MokasherGehaInput::updateOrCreate(
            ['mokasher_id' => $request->mokasher_id, 'target' => $request->target], ['geha_id' => $request->geha_id]
        );

        return redirect()->back()->with('success', 'تم توجيه المؤشر  للجهه بنجاح ');
    }

    public function sub_geha_moksherat()
    {
        $mokashert = Mokasher::whereHas('mokasher_geha_inputs', function ($query) {
            $query->where('geha_id', Auth::user()->id);
        })->with(['mokasher_geha_inputs' => function ($query) {
            $query->where('geha_id', Auth::user()->id);
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

        // Retrieve existing file paths
        $existingFilePaths = $input->files ? json_decode($input->files, true) : [];

        // Handle file uploads
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $newFilePaths = [];

            foreach ($files as $file) {
                // Generate a unique filename to avoid overwriting existing files
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Store the file in the specified directory
                $filePath = $file->storeAs('public/uploads/files', $fileName);

                if ($filePath) {
                    $newFilePaths[] = $filePath;
                } else {
                    throw new \Exception('File upload failed.');
                }
            }

            // Merge existing file paths with new file paths
            $mergedFilePaths = array_merge($existingFilePaths, $newFilePaths);

            // Save the updated list of file paths
            $input->files = json_encode($mergedFilePaths);
        }

        // Save the model instance
        $input->save();

        return redirect()->back()->with('success', 'لقد تم أدخال  بيانات المؤشر بنجاح ');
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
}

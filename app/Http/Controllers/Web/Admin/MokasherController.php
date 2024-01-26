<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\mokashers\StoreMokasherRequest;
use App\Http\Requests\Web\Admin\mokashers\UpdateMokasherRequest;
use App\Http\Requests\Web\Admin\users\StoremokasharatInputs;
use App\Models\Execution_year;
use App\Models\Mokasher;
use App\Models\MokasherInput;
use App\Models\Program;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Models\MokasherExecutionYear ;
use Symfony\Component\HttpFoundation\Response;
class MokasherController extends Controller
{
    use ResponseJson ;

    public function __construct(private readonly Mokasher $mokasherModel)
    {}
    public function show($program_id =null ): \Illuminate\View\View
    {
        $program = Program::find($program_id) ;
        $mokashert = $this->mokasherModel->where('program_id' , $program_id)->get() ;
        return view('admins.moksherat.index', compact('mokashert' ,  'program_id' , 'program'));
    }

    public function create(): \Illuminate\View\View
    {
        return view('admins.moksherat.create');
    }

    public function store(StoreMokasherRequest $StoreMokasherRequest): \Illuminate\Http\JsonResponse
    {
        $this->mokasherModel->create($StoreMokasherRequest->validated());
        return $this->responseJson(['type' => 'success', 'message' => ' تم أضافه المؤشر بنجاح'], Response::HTTP_CREATED);
    }

    public function destroy($mokasher_id = null): \Illuminate\Http\RedirectResponse
    {
        $found_mokaser = Mokasher::find($mokasher_id) ;
        $program_id = $found_mokaser->program_id ;
        $found_mokaser->delete();
        return redirect()->route('dashboard.moksherat.show',$program_id )->with('success', ' تم  حذف المؤشر  بنجاح');
    }

    public function edit(Mokasher $mokasher): \Illuminate\Http\JsonResponse
    {
        return $this->responseJson(['data' => $mokasher], Response::HTTP_OK);
    }

    public function update(UpdateMokasherRequest $UpdateMokasherRequest, Mokasher $mokasher): \Illuminate\Http\RedirectResponse
    {
        $mokasher->update($UpdateMokasherRequest->validated());
        return redirect()->route('dashboard.moksherat.show',$mokasher->program_id)->with('success', ' تم  تعديل  المؤشر بنجاح');
    }
    public function mokaseerinput($mokasher_id)
    {
        $users = User::where('is_manger' , 1)->get() ;
        $mokasher = Mokasher::with('mokasher_inputs', 'mokasher_geha_inputs' , 'program' , 'program.goal.Objective.kheta')->find($mokasher_id) ;
        $kheta_id = $mokasher->program->goal->Objective->kheta->id ;

        $selected_year  = Execution_year::where(['kheta_id'=> $kheta_id , 'selected' =>  1 ])->first() ;
        $excuction_years = MokasherExecutionYear::where('mokasher_id', $mokasher_id)->get() ;

        return view('admins.moksherat.create_mokaseerinput' , compact('mokasher' ,'users' ,'mokasher_id' , 'excuction_years' ,'selected_year', 'kheta_id'));
    }
    public function store_mokaseerinput(StoremokasharatInputs $StoremokasharatInputs)
    {
        $mokasher_data = MokasherInput::updateOrCreate(
            ['mokasher_id' => $StoremokasharatInputs->mokasher_id],
            [
                'users' => json_encode($StoremokasharatInputs->users),
                'equation' => $StoremokasharatInputs->equation,
                'type' => $StoremokasharatInputs->type,
            ]
        );

        if(!empty($StoremokasharatInputs->ids)) {
            foreach ($StoremokasharatInputs->ids as $Key => $id) {
                    MokasherExecutionYear::updateOrCreate([
                        'mokasher_id' => $StoremokasharatInputs->mokasher_id,
                        'year_id' => $id ,
                    ],
                    [
                        'value' => $StoremokasharatInputs->years[$Key]
                    ]
                );
            }
        }
        // Redirect back or return a response
        return redirect()->back()->with('success', 'تم أضافة بيانات المؤشر بنجاح');
    }
}

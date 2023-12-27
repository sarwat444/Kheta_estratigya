<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\mokashers\StoreMokasherRequest;
use App\Http\Requests\Web\Admin\mokashers\UpdateMokasherRequest;
use App\Http\Requests\Web\Admin\users\StoremokasharatInputs;
use App\Models\Mokasher;
use App\Models\MokasherInput;
use App\Models\Program;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class MokasherController extends Controller
{
    use ResponseJson ;

    public function __construct(private readonly Mokasher $mokasherModel)
    {}
    public function show($program_id =null ): \Illuminate\View\View
    {
        $mokashert = $this->mokasherModel->where('program_id' , $program_id)->get() ;
        return view('admins.moksherat.index', compact('mokashert' ,  'program_id'));
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
    public function mokaseerinput ($mokasher_id)
    {
        $users = User::get() ;
        return view('admins.moksherat.create_mokaseerinput' , compact('users' ,'mokasher_id'));
    }

    public function store_mokaseerinput(StoremokasharatInputs $StoremokasharatInputs)
    {
        // Create a new instance of MokasherInput and save to the database
        MokasherInput::create($StoremokasharatInputs->validated());
        // Redirect back or return a response
        return redirect()->back()->with('success', 'تم أضافه بيانات المؤشر بنجاح');
    }

}

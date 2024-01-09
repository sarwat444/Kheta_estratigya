<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\Admin\kheta\UpdateKhetaRequest;
use App\Http\Requests\Web\Admin\kheta\StoreKhetaRequest;
use App\Models\Kheta ;
use App\Models\Execution_year ;
use App\Traits\ResponseJson;
use Illuminate\Http\Response;
class KhetaController extends Controller
{
    use ResponseJson ;
    public function __construct(private readonly Kheta $khetaModel)
    {}
    public  function  index()
    {
        $ketas = $this->khetaModel->withCount('objectives')->get();
        return view('admins.kehta.index', compact('ketas'));
    }
    public function create(): \Illuminate\View\View
    {
        return view('admins.kheta.create');
    }
    public function store(StoreKhetaRequest  $StoreKhetaRequest): \Illuminate\Http\JsonResponse
    {

        $kheta = new Kheta() ;
        $kheta->name = $StoreKhetaRequest->name ;
        $kheta->save() ;

        /** Store Execution Year  */
        foreach($StoreKhetaRequest['outer-group'] as $group)
        {
            foreach($group as $sub_group)
            {
                foreach($sub_group as $year)
                {
                    $excution_year  = new Execution_year() ;
                    $excution_year->year_name = $year['years'];
                    $excution_year->kheta_id = $kheta->id;
                    $excution_year->save() ;
                }
            }
        }



        return $this->responseJson(['type' => 'success', 'message' => ' تم أضافه الخطه  بنجاح'], Response::HTTP_CREATED);
    }

    public function destroy( $kheta_id = null  ): \Illuminate\Http\RedirectResponse
    {

        $kheta = Kheta::find($kheta_id) ;
        $kheta->delete();
        return redirect()->route('dashboard.kheta.index')->with('success', ' تم  حذف الخطه  بنجاح');
    }

    public function edit( $kheta_id = null): \Illuminate\Http\JsonResponse
    {
        $kheta = Kheta::find($kheta_id) ;
        return $this->responseJson(['data' => $kheta], Response::HTTP_OK);
    }

    public function update(UpdateKhetaRequest $UpdateKhetaRequest, Kheta $kheta): \Illuminate\Http\RedirectResponse
    {
        $goal->update($UpdateKhetaRequest->validated());
        return redirect()->route('dashboard.kheta.index' )->with('success', ' تم  تعديل  الخطه بنجاح  ');
    }
}

<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\mangement\StoreMangementRequest;
use App\Http\Requests\Web\Admin\mangement\UpdateMangementRequest;
use App\Models\Mangement;
use App\Traits\ResponseJson;
use Symfony\Component\HttpFoundation\Response;

class MangementController extends Controller
{
    use ResponseJson;

    public function __construct(private readonly Mangement $mangementModel)
    {
    }

    public function index(): \Illuminate\View\View
    {
        $mangements = $this->mangementModel->get();
        return view('admins.mangement.index', compact('mangements'));
    }

    public function create(): \Illuminate\View\View
    {
        return view('admins.mangement.create');
    }

    public function   store(StoreMangementRequest $StoreMangementRequest): \Illuminate\Http\JsonResponse
    {
        $this->mangementModel->create($StoreMangementRequest->validated());
        return $this->responseJson(['type' => 'success', 'message' => 'تم حفظ الأداره بنجاح'], Response::HTTP_CREATED);
    }

    public function destroy(Mangement $mangement): \Illuminate\Http\RedirectResponse
    {
        $mangement->delete();
        return redirect()->route('dashboard.mangements.index')->with('success', 'تم الحذف الأداره بنجاح');
    }

    public function edit(Mangement $mangement): \Illuminate\Http\JsonResponse
    {
        return $this->responseJson(['data' => $mangement], Response::HTTP_OK);
    }

    public function update(UpdateMangementRequest $UpdateMangementRequest, Mangement $mangement): \Illuminate\Http\RedirectResponse
    {
        $mangement->update($UpdateMangementRequest->validated());
        return redirect()->route('dashboard.mangements.index')->with('success', 'Category updated successfully');
    }

}

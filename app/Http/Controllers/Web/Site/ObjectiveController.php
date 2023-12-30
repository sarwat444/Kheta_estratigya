<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function __construct(private readonly Objective $objectiveModel)
    {}
    public function index(): \Illuminate\View\View
    {
        $objectives = $this->objectiveModel->withCount('goals')->get() ;
        return view('gehat.objectives.index', compact('objectives'));
    }
}

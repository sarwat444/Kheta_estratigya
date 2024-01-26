<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Execution_year;
use App\Models\Goal;
use App\Models\Mokasher;
use App\Models\MokasherGehaInput;
use App\Models\Objective;
use App\Models\Program ;
use DB ;

class DashboardController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $Execution_years = Execution_year::get() ;
        return view('admins.dashboard.index' , compact('Execution_years'));
    }
    public function kheta_dashboard($kheta_id , $year_id = null): \Illuminate\View\View
    {
        if(!empty($year_id)) {
            $Execution_years = Execution_year::where('kheta_id', $kheta_id)->get();
            $objectives = Objective::withCount('goals')->with(['goals.programs.moksherat.mokasher_geha_inputs' => function ($query) use ($year_id) {
                $query->select('mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->where('year_id', $year_id)->groupBy('mokasher_id');
            }])->where('kheta_id', $kheta_id)->get();
            return view('admins.dashboard.objectives', compact('Execution_years', 'objectives' ,'year_id' ,'kheta_id'));
        }else
        {
            $first_year = Execution_year::where('kheta_id', $kheta_id)->first();
            $year_id = $first_year->id;
            $Execution_years = Execution_year::where('kheta_id', $kheta_id)->get();
            $objectives = Objective::withCount('goals')->with(['goals.programs.moksherat.mokasher_geha_inputs' => function ($query) {
                $query->select('mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->groupBy('mokasher_id');
            }])->where('kheta_id', $kheta_id)->get();
            return view('admins.dashboard.objectives', compact('Execution_years', 'objectives' ,'kheta_id' ,'year_id'));
        }
    }
    public function goal_statastics($kheta_id , $objective_id , $year_id = null )
    {
        $Execution_years  = Execution_year::where('kheta_id', $kheta_id)->get();
        if(!empty($year_id)) {
            $goals = Goal::withCount('programs')->with(['programs.moksherat.mokasher_geha_inputs' => function ($query) use ($year_id) {
                $query->select('mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->where('year_id', $year_id)->groupBy('mokasher_id');
            }])->where('objective_id', $objective_id)->get();
        }else
        {
            $goals = Goal::withCount('programs')->with(['programs.moksherat.mokasher_geha_inputs' => function ($query) {
                $query->select('mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->groupBy('mokasher_id');
            }])->where('objective_id', $objective_id)->get();
        }
        return view('admins.dashboard.goals' , compact('goals' ,'Execution_years' ,'year_id' ,'objective_id' ,'kheta_id'));

    }
    public function program_statastics($kheta_id ,$goal_id, $year_id = null )
    {
        $Execution_years  = Execution_year::where('kheta_id', $kheta_id)->get();
        if(!empty($year_id)) {
        $programs  = Program::withCount('moksherat')->with(['moksherat.mokasher_geha_inputs' => function($query) use ($year_id){
            $query->select('mokasher_id',
                DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
            )->where('year_id' ,$year_id )->groupBy('mokasher_id');
        }])->where('goal_id' , $goal_id)->get() ;
        }else
        {
            $programs  = Program::withCount('moksherat')->with(['moksherat.mokasher_geha_inputs' => function($query) use ($year_id){
                $query->select('mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->groupBy('mokasher_id');
            }])->where('goal_id' , $goal_id)->get() ;
        }
        return view('admins.dashboard.programs' , compact('programs','Execution_years','goal_id','year_id' ,'kheta_id'));
    }
    public function mokashrat_statastics($kheta_id ,$program_id , $year_id = null , $part = null  )
    {

        $Execution_years  = Execution_year::where('kheta_id', $kheta_id)->get();
        if (!empty($year_id)) {
            if (!empty($part)) {
                $mokashers = Mokasher::with(['mokasher_geha_inputs' => function($query) use ($year_id, $part) {
                    $query->select(
                        'mokasher_id',
                        DB::raw("(SUM(rate_part_$part) / SUM(part_$part)) * 100 as percentage")
                    )->where('year_id', $year_id)->groupBy('mokasher_id');
                }])->where('program_id', $program_id)->get();
            } else {
                $mokashers = Mokasher::with(['mokasher_geha_inputs' => function($query) use ($year_id) {
                    $query->select(
                        'mokasher_id',
                        DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                    )->where('year_id', $year_id)->groupBy('mokasher_id');
                }])->where('program_id', $program_id)->get();
            }
            return view('admins.dashboard.mokashrat' , compact('mokashers' ,'Execution_years' ,'program_id','year_id','kheta_id' ,'part' ));
        }else
        {
            $mokashers = Mokasher::with(['mokasher_geha_inputs' => function($query) use ($year_id) {
                $query->select(
                    'mokasher_id',
                    DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                )->groupBy('mokasher_id');
            }])->where('program_id', $program_id)->get();
        }
        return view('admins.dashboard.mokashrat' , compact('mokashers' ,'Execution_years' ,'program_id','year_id','kheta_id' ));
    }
}

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
    public function kheta_dashboard($kheta_id): \Illuminate\View\View
    {
        $Execution_years = Execution_year::where('kheta_id' , $kheta_id)->get() ;
        $year_id = 1 ;
        $objectives = Objective::withCount('goals')->with(['goals.programs.moksherat.mokasher_geha_inputs' => function($query) use ($year_id){
            $query->select('mokasher_id',
                  DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
                   )->where('year_id' ,$year_id )->groupBy('mokasher_id');
        }])->where('kheta_id',$kheta_id)->get() ;
        return view('admins.dashboard.objectives' , compact('Execution_years' ,'objectives'));
    }
    public function goal_statastics($objective_id)
    {

        $kheta_id = 1 ;
        $year_id = 1 ;

        $goals = Goal::withCount('programs')->with(['programs.moksherat.mokasher_geha_inputs' => function($query) use ($year_id){
            $query->select('mokasher_id',
                DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
            )->where('year_id' ,$year_id )->groupBy('mokasher_id');
        }])->where('objective_id' , $objective_id)->get() ;

        return view('admins.dashboard.goals' , compact('goals'));

    }
    public function program_statastics($goal_id)
    {
        $kheta_id = 1 ;
        $year_id = 1 ;
        $programs  = Program::withCount('moksherat')->with(['moksherat.mokasher_geha_inputs' => function($query) use ($year_id){
            $query->select('mokasher_id',
                DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
            )->where('year_id' ,$year_id )->groupBy('mokasher_id');
        }])->where('goal_id' , $goal_id)->get() ;

        return view('admins.dashboard.programs' , compact('programs'));
    }
    public function mokashrat_statastics($program_id)
    {
        $year_id = 1 ;
        $kheta_id = 1 ;

        $Execution_years = Execution_year::where('kheta_id' , $kheta_id)->get() ;

        $mokashers = Mokasher::with(['mokasher_geha_inputs' => function($query) use ($year_id) {
            $query->select(
                'mokasher_id',
                DB::raw('(SUM(rate_part_1 + rate_part_2 + rate_part_3 + rate_part_4) / SUM(part_1 + part_2 + part_3 + part_4)) * 100 as percentage')
            )->where('year_id' ,$year_id )->groupBy('mokasher_id');
        }])->where('program_id', $program_id)->get();



        return view('admins.dashboard.mokashrat' , compact('mokashers' ,'Execution_years'));
    }
}

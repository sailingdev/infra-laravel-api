<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $uCnt = User::count();
        $fCnt = FileModel::count();
        $pCnt = Project::count();
        return view('dashboard.dashboard', ['uCnt' => $uCnt, 'fCnt' => $fCnt, 'pCnt' => $pCnt]);
    }



    public function getStatistics(){

        $date = Carbon::today()->subDays(30);
        $files_per_day = FileModel::select(array('uploaded_at'))->where('uploaded_at', '>=', date($date))->get()->groupBy(function($item) {
            return $item->uploaded_at->format('Y-m-d');
        });

        foreach ($files_per_day as $key => $val){
            $files_per_day_result[$key] = count($val);
        }

        $files_per_project = FileModel::select(array('project_id'))->get()->groupBy(function ($item) {
            return $item->project_id;
        });
        foreach ($files_per_project as $key => $val){
            $files_per_project_result[$key] = count($val);
        }
        $projects = Project::all();

        $result['files_per_day'] = $files_per_day_result;
        $result['files_per_project'] = $files_per_project_result;
        $result['projects'] = $projects;

        return response()->json($result, 200);

    }


}

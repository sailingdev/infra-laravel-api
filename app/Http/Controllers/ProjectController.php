<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project(){
        $projects = Project::all();
        return view('project_tab.project', ['projects' => $projects]);
    }

    public function add_project(){
        return view('project_tab.add_project');
    }

    public function create_project(Request $request){
        try{
            $project = new Project();
            $project->project_name = $request->project_name;
            $project->save();
            return redirect('/project')->with('success', 'Added Project Successfully');
        }catch (\Exception $exception){
            return back()->with('failed', "There was a problem" . $exception->getMessage());
        }
    }


    public function edit_project($project_id){
        $project = Project::where('project_id', $project_id)->first();
        return view('project_tab.edit_project', ['project' => $project]);
    }


    public function update_project(Request $request){
        try{
            Project::where('project_id', $request->project_id)->update(['project_name' => $request->project_name]);
            return redirect('/project')->with('success', 'Updated Project Name Successfully');
        }catch (\Exception $exception){
            return back()->with('failed', "There was a problem" . $exception->getMessage());
        }
    }



    public function delete_project($project_id){
        try{
            Project::where('project_id', $project_id)->delete();
            return back()->with('success', 'Deleted Project Name Successfully');
        }catch (\Exception $exception){
            return back()->with('failed', "There was a problem" . $exception->getMessage());
        }
    }



}

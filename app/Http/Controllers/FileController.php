<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\Notification;
use App\Option;
use App\Project;
use App\ProjectPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function file_form(){

        $projects = Project::all();
        $options = Option::all();
        return view('file_tab.file', ['options' => $options, 'projects' => $projects]);
    }


    public function fileUpload(Request $request){
        $file = $request->file('file');
        $project_id = $request->project;
        $option_id = $request->option;

        try{
            $new_name = time().'.'.$file->getClientOriginalExtension();
            $origin_name = $file->getClientOriginalName();


            $destinationPath = public_path('/uploads/file');

            $file_url = url('/public/uploads/file').'/'.$new_name;
            $file->move($destinationPath, $new_name);



            $file = new FileModel();
            $file->option_id = $option_id;
            $file->project_id = $project_id;
            $file->file_name = $origin_name;
            $file->file_url = $file_url;
            $time = Carbon::now();
            $file->uploaded_at = $time;
            $file->save();



            $sender_id = 1;
            $sender_username = 'admin';
            $option_name = Option::where('option_id', $option_id)->first()->option_name;
            $project_permission_users = ProjectPermission::where('project_id', $project_id)->get();
            $receiver_ids = array();
            $receiver_only_ids = array();
            foreach ($project_permission_users as $item){
                array_push($receiver_ids, '+'.$item->user_id.'-');
                array_push($receiver_only_ids, $item->user_id);
            }
            $receiver_ids = implode($receiver_ids, ',');

            $notification = new Notification();
            $notification->sender_id = $sender_id;
            $notification->sender_name = $sender_username;
            $notification->project_id = $project_id;
            $notification->project_name = $origin_name;
            $notification->option_id = $option_id;
            $notification->option_name = $option_name;
            $notification->receivers = $receiver_ids;
            $notification->file_url = $file_url;
            $notification->uploaded_at = $time;
            $notification->save();

            $sender_noti = new SendNotificationController();
            foreach ($receiver_only_ids as $id){
                $sender_noti->sendNotificationToSpecifyUsers($sender_id, $sender_username, $project_id, $origin_name, $option_id, $receiver_ids, $id);
            }


            return back()->with('success', 'Uploaded File Successfully');
        }catch (\Exception $exception){
            return back()->with('failed', "There was a problem " . $exception->getMessage());
        }
    }



}

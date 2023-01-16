<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\Notification;
use App\Option;
use App\ProjectPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;

class ApisInfraController extends Controller
{

    public function signup(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $username = $request['username'];
        $company = $request['company'];
        $password = $request['password'];
        $user_type = $request['user_type'];

        $keys = array();
        foreach ($_POST as $key => $val) {
            $keys[] = $key;
        }
        $column_arr = array(
            'name',
            'email',
            'password',
            'username',
            'company',
            'user_type'
        );

        $flag = 0;
        foreach ($column_arr as $val) {
            if (!in_array($val, $keys)) {
                $flag = 1;
                break;
            }
        }
        if ($flag == '1') {
            $code = 403;
            $message = "Please send " . $val . " parameter in post.";

            $user_data = null;
            $data = [
                'results' => [
                    'user_data' => null,
                    'user_id' => '',
                    'error_code' => $code,
                    'error_message' => $message
                ],
            ];
            return $data;
        }


        $time = Carbon::now();
        $personal_array = array(
            'company' => $company,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'encriptp' => md5($password),
            'user_name' => $username,
            'user_type' => $user_type,
            'time' => $time
        );

        $result = DB::table('users')->where('email', $email)->first();

        if (!empty($result)) {
            $code = 403;
            $message = "Your email address was registered already.";
            $user_id = "";
            $user_data = null;

        }  else {
            $code = 0;
            DB::table('users')->insert($personal_array);
            $user_data = DB::table('users')->where('email', $email)->first();
            $message = "Successfully Registered";
            $user_id = $user_data->id;

        }

        $data = [
            'results' => [
                'user_data' => $user_data,
            ],
            'error_code' => $code,
            'error_message' => $message
        ];

        return $data;
    }



    public function emailverify(Request $request)
    {
        $email = $request['email'];
        $veryfiycode = rand(1000, 9999);
        $veryfiycode = "$veryfiycode";
        $to = $email;
        $subject = "verify email";
        $txt = "verify Code: " . $veryfiycode;
        $headers = "From: no-reply@heavykiwi.com" . "\r\n" .
            "CC: jonmr0727222@gmail.com";

        $r = mail($to, $subject, $txt, $headers);
        if ($r){
            $code = 0;
            $message = "";
        }else{
            $code = 403;
            $message = "Server error!";
        }

        $data = [
            'results' => [
                'verification_code' => $veryfiycode,
            ],
            'error_code' => $code,
            'error_message' => $message
        ];
        return $data;
    }


    function signin(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $projects = '';

        $keys = array();
        foreach ($_POST as $key => $val) {
            $keys[] = $key;
        }

        $column_arr = array(
            'email',
            'password'
        );

        $flag = 0;
        foreach ($column_arr as $val) {
            if (!in_array($val, $keys)) {
                $flag = 1;
                break;
            }
        }
        if ($flag == '1') {
            $code = 403;
            $message = "Please send " . $val . " parameter in post.";
            $user_data = null;
            $data = [
                'results' => [
                    'user_data' => null,
                ],
                'error_code' => $code,
                'error_message' => $message
            ];
            return $data;
        }

        $user = User::where('email', $email)
            ->where('encriptp', md5($password))
            ->first();
        if (!empty($user)) {
            $isActived = $user->isActived;

            if ($isActived == 1){
                $message = '';
                $code = 0;
                $projects = ProjectPermission::select(['project_id', 'project_name'])->where('user_id', $user->id)->get();
                $user['projects'] = $projects;
                $options = Option::all();
                $user['options'] = $options;
            }else {
                $user = null;
                $message = 'You are pending';
                $code = 403;
            }
        } else {
            $user = null;
            $message = 'Email or Password is wrong';
            $code = 403;
        }


        $data = [
            'results' => [
                'user_data' => $user,
            ],
            'error_code' => $code,
            'error_message' => $message
        ];
        return $data;
    }




    public function getfiles(Request $request){
        $project_id = $request['project_id'];
        $option_id = $request['option_id'];

        $keys = array();
        foreach ($_POST as $key => $val) {
            $keys[] = $key;
        }

        $column_arr = array(
            'project_id',
            'option_id'
        );

        $flag = 0;
        foreach ($column_arr as $val) {
            if (!in_array($val, $keys)) {
                $flag = 1;
                break;
            }
        }
        if ($flag == '1') {
            $code = 403;
            $message = "Please send " . $val . " parameter in post.";
            $user_data = null;
            $data = [
                'results' => [
                    'file_data' => null,
                ],
                'error_code' => $code,
                'error_message' => $message
            ];
            return $data;
        }

        $file = FileModel::where('project_id', $project_id)
            ->where('option_id', $option_id)->get();
        if (!empty($file)) {
            $message = '';
            $code = 0;

        } else {
            $file = null;
            $message = 'No file data';
            $code = 403;
        }

        $data = [
            'results' => [
                'file_data' => $file,
            ],
            'error_code' => $code,
            'error_message' => $message
        ];
        return $data;

    }



    public function getnotifications(Request $request){
        $user_id = $request['user_id'];

        $keys = array();
        foreach ($_POST as $key => $val) {
            $keys[] = $key;
        }

        $column_arr = array(
            'user_id',
        );

        $flag = 0;
        foreach ($column_arr as $val) {
            if (!in_array($val, $keys)) {
                $flag = 1;
                break;
            }
        }
        if ($flag == '1') {
            $code = 403;
            $message = "Please send " . $val . " parameter in post.";
            $user_data = null;
            $data = [
                'results' => [
                    'notifications' => null,
                ],
                'error_code' => $code,
                'error_message' => $message
            ];
            return $data;
        }

        $search_pattern = '+'.$user_id.'-';
        $notifications =Notification::where('receivers', 'LIKE',"%{$search_pattern}%")->get();

        $message = '';
        $code = 0;
        $data = [
            'results' => [
                'notifications' => $notifications,
            ],
            'error_code' => $code,
            'error_message' => $message
        ];
        return $data;

    }



}

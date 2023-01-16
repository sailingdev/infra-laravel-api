<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('pages.subject.show_subject')->with('result', Subject::get());
    }


    public function create()
    {
        return view('pages.subject.create_subject');
    }

    public function store(Request $request)
    {
       unset($request['_token']);
       $request->validate([
           'subject_name'=> 'required',

       ]);

       Try {
           Subject::create($request->all());
           return redirect('/subject/show')->with('success', "Subject Save");
       } catch (\Exception $exception) {
           return redirect('/subject/show')->with('failed', "There was a Problem" . $exception->getMessage());
       }
    }


    public function show(Subject $subject)
    {
        //
    }

    public function edit($subject_id)
    {
        return view('pages.subject.edit_subject')->with('result', Subject::where('subject_id', $subject_id)->first());
    }

    public function update(Request $request)
    {
        $subject_id= $request['subject_id'];
        unset($request['_token']); //Remove Token
        unset($request['subject_id']);

        $request->validate([
            'subject_name' => 'required',
        ]);

        try {

            Subject::where('subject_id', $subject_id)->update($request->all());
            return redirect('/subject/show')->with('success', "Subject Updated");
        } catch (\Exception $exception) {
            return redirect('/subject/show')->with('failed', "There was a problem. " . $exception->getMessage());
        }
    }

    public function destroy($subject_id)
    {
        try {
            Subject::where('subject_id', $subject_id)->delete();
            return back()->with('success', "Subject Deleted");
        } catch (\Exception $exception) {
            return back()->with('failed', "There was a problem. " . $exception->getMessage());
        }
    }
}

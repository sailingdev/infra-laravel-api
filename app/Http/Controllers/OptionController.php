<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function option(){
        $options = Option::all();
        return view('option_tab.option', ['options' => $options]);
    }

    public function edit_option($option_id){
        $option = Option::where('option_id', $option_id)->first();
        return view('option_tab.edit_option', ['option' => $option]);
    }



    public function update_option(Request $request){


        try{
            Option::where('option_id', $request->option_id)->update(['option_name' => $request->option_name]);
            return redirect('/option')->with('success', 'Updated Option Name Successfully');
        }catch (\Exception $exception){
            return back()->with('failed', "There was a problem" . $exception->getMessage());
        }
    }


}

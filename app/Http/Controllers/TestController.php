<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use File;

class TestController extends Controller
{
    
    public function show(){
        $test = Test::all();
		return view('login')->with('test',$test);
    }

    public function add(){
        return view('form');
    }
    public function submit(Request $request){
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'image' =>'required | mimes:jpeg,png,jpg'
            ]);
      
                $test = new Test();
                $test->name = $request->name;
                $test->email = $request->email;
                $test->password = $request->password;
                $test->image = $request->file('image')->store('photo','public');
                $test->save();

            return redirect('/')->with('success','Form submited successfully');
            
        }
    }
        public function update(Test $test){
                return view('edit', compact('test'));
        } 

   public function edit(Request $request,Test $test){
        {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                ]);
        
                    $test->name = $request->name;
                    $test->email = $request->email;      
                    if($request->file('image')== null){
                        $image ="";
                    }else{
                        File::delete('storage/'.$test->image);
                        $test->image = $request->file('image')->store('photo','public');
                    }
                    $test->save();

                return redirect('/')->with('success','Form updated successfully');
        
        }
    }
    public function delete(Test $test){
        File::delete('storage/'.$test->image);
        test::find($test->id)->delete();
        return redirect('/')->with('success','Form deleted successfully');
    } 
}

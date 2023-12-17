<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
   public function slider(){
    return view('slider');
   }

   public function  addslider(Request $request){
    $request->validate([
        'name' => 'required',
        'link' => 'required',       
        'image' =>'required | mimes:jpeg,png,jpg',
        
    ]);

        $slider = new slider();
        $slider->name = $request->name;
        $slider->image = $request->file('image')->store('sliderimg','public');
        $slider->link = $request->link;
        $slider->save();

    return redirect('/slider')->with('success','Form submited successfully');
   }

}

<?php

namespace App\Http\Controllers;
use App\Models\admin;


use Illuminate\Http\Request;
	
use Illuminate\support\facades\Hash;
use DB;
use File;

class LoginController extends Controller
{
    public function show(){


        return view('index');
    }

    public function loginpro(Request $request){

				$data = Admin::select('*')->where('email',$request->email)->get()->first();

            if(!empty($data)){

                if(Hash::check($request->pwd,$data->password)){
                
                    Session()->put('admin');
                    
                    return redirect('/');

                }else{

                   return redirect('/login')->with('error','password are wrong');
                   
                }

            } else{

                return redirect('/login')->with('error','somethong wants to wrong');
            }
    }

    public function changeprofile(){
        $admin =  Admin::all();
        return view('editprofile')->with( 'admin', $admin);
    }

    public function changeadmin(Request $request){
        
   
            $unm = $request->unm;
            $email = $request->email;

            if($request->file('image')== null){
             $image ="";
                DB::table('admins')->update([
                    'unm' => $unm,
                    'email' => $email,
                ]);


            }else{
              
               $adminimage =  DB::table('admins')->get();
               foreach($adminimage as $admins){
              File::delete('storage/.$admins->image');
              $request->file('image')->store('adminphoto','public');
            }
        }
        return redirect('changeprofile')->with('sucess','your profile successfully updated');
        
    }

    
}
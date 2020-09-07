<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class userController extends Controller
{
    public function uploadAvatar(Request $request){
        
        // $request->image->store('images','public');

        if($request->hasfile('image')){
           User::uploadAvatar($request->image);
           return redirect()->back()->with('message','GGGGG');
        }
        return redirect()->back()->with('error','failed');
    }

    

    public function index(){

        // $data=['name'=>'samsweety',
        //         'email'=>'sam@google.com',
        //         'password'=>'pw',
        // ];

        // User::create($data);


        // //insert eloquent
        // $user=new User();
        // $user->name='sam';
        // $user->password=bcrypt('55688');
        // $user->email='sam@anet.com';
        // $user->save();

        $user=User::all();
        return $user;
        
        // User::where('id',2)->delete();

        // User::where('id',3)->update(['name'=>'sansweety']);



        // DB::insert('insert into users (name,email,password) values (?,?,?)',['sam','sam@example.com','1234']);
       
        // return "here is userController";

        // DB::update('update users set name="samsweety" where id=1');

        // DB::delete('delete from users where id =1');

        //  $users=DB::select('select * from users');
        // return $users;
}
}
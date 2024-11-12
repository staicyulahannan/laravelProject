<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
         $users = User::withTrashed()->get();
         return view('admin/get_users', compact('users'));
      
    }
    public function create()
    {
         $users = User::all();
         return view('admin/create_user');
      
    }
    public function save()
    {
         $name=request('name');
         $email=request('email');
         $password=request('password');
        User::firstorCreate([
            'email'=>$email
        ],[
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);
        //  User::create([
        //     'name'=>$name,
        //     'email'=>$email,
        //     'password'=>$password
        //  ]);
        return redirect()->route('list.user')->with('message','User created successfuly!!');
      
    }
    public function edit($id){
        $user = User::find(decrypt($id));
        return view('admin/edit_user', compact('user'));
    }
    public function update(){
        $userid = decrypt(request('id'));
        $user=User::find($userid);
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
         return redirect()->route('list.user')->with('message','User Updated successfuly!!');
    }
    public function delete($userid){
        $userid = decrypt($userid);
        $user=User::find($userid);
        $user->delete();
         return redirect()->route('list.user')->with('message','User delete successfuly!!');
    }
    public function forceDelete($userid){
        User::find(decrypt($userid))->forceDelete();
         return redirect()->route('list.user')->with('message','User force delete successfuly!!');
    }
    public function activate($userid){
        $userid = decrypt($userid);
        $user=User::withTrashed()->find($userid);
        $user->restore();
         return redirect()->route('list.user')->with('message','User Activate successfuly!!');
    }
}


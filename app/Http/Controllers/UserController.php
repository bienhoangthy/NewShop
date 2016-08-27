<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getList() {
    	$users = User::select('id','name','fullname','email','role')->get()->toArray();
    	return view('admin.user.list', compact('users'));
    }

    public function getAdd() {
    	return view('admin.user.add');
    }

    public function postAdd(UserRequest $request) {
    	$user = new User();
    	$user->name = $request->txtUser;
    	$user->fullname = $request->txtFullname;
    	$user->password = Hash::make($request->txtPass);
    	$user->email = $request->txtEmail;
    	$user->role = $request->rdoLevel;

    	$user->save();

    	return redirect()->route('admin.user.getDetail',$user->id)->with(['flash_status'=>'success','flash_message'=>'Add User Complete!']);
    }

    public function getDelete($id) {
        $current_user = Auth::user();
        $user = User::find($id);
        if ($id == 1 || $current_user->id != 1 && $user->role == 1) {
            return redirect()->route('admin.user.getList')->with(['flash_status'=>'danger','flash_message'=>'Permission Denied!']);
        } else {
            User::destroy($id);
            return redirect()->route('admin.user.getList')->with(['flash_status'=>'success','flash_message'=>'Delete User Complete!']);
        }
    }

    public function getEdit($id) {
        $current_user = Auth::user();
        $user = User::find($id);
        if (($current_user->id != 1) && ($id == 1 || ($user->role == 1 && $current_user->id != $id))) {
            return redirect()->route('admin.user.getList')->with(['flash_status'=>'danger','flash_message'=>'Permission Denied!']);
        } else {
            return view('admin.user.edit', compact('user'));
        }
    }

    public function postEdit($id, Request $request) {
        $user = User::find($id);
        $this->validate($request, [
                'txtFullname'=>'required',
                'txtEmail'=>'required|unique:users,email,'.$id,       
            ],
            [
                'txtFullname.required' => 'Please Input Fullname!',
                'txtEmail.required' => 'Please Input Email!',
                'txtEmail.unique' => 'Email Does Exists!',
            ]);
        $user->fullname = $request->txtFullname;
        $user->email = $request->txtEmail;
        $user->remember_token = $request->_token;

        if ($request->input('txtPass')) {
            $this->validate($request, 
             [
                 'txtPass' => 'min:6',
                 'txtRePass' => 'same:txtPass',
             ],
             [
                 'txtPass.min' => 'Password Be At Least 6 Characters!',
                 'txtRePass.same' => 'Two Password Do Not Match',
             ]);
            $user->password = Hash::make($request->txtPass);
        }
        if (Auth::user()->id != $id) {
            $user->role = $request->rdoLevel;
        }

        $user->save();
        return redirect()->route('admin.user.getDetail',$id)->with(['flash_status'=>'success','flash_message'=>'Update User Complete!']);
    }

    public function getDetail($id) {
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }
}

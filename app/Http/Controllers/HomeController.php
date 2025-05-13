<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function dashboard(){
        return view('dashboard');
    }

    /**
     * Users List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function users (){
        $Users = User::where('id', '!=', auth()->user()->id)->get();
        $total = User::count();
        return view('/backend.user.users', compact('Users'), compact('total'));
    }

    /**
     * Delete User
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function userDelete($id){

        if (auth()->user()->id == $id) {
            return redirect()->back()->with('error', 'You can not delete yourself');
        }
        $User = User::find($id);

        if (!$User) {
            return redirect()->back()->with('error', 'User not found');
        }

        $User->destroy($id);
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
    /**
     * Edit User
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    function userEdit($id)
    {
        return view('/backend.user.edit', compact('id'));
    }

    // Update User
    function userUpdate(Request $request, $id)
    {
        $User = User::find($id);

        if (!$User) {
            return redirect()->back()->with('error', 'User not found');
        }

        $User->update($request->all());
        return redirect('/users')->with('success', 'Profile Updated Successfully');

    }



}

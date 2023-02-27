<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Image;

class UserController extends Controller
{


    public function UserAll()
    {

        $users = User::latest()->get();
        return view('backend.master.user.user_all', compact('users'));
    } // End Method


    public function UserAdd()
    {
        $jabatan = Jabatan::all();
        return view('backend.master.user.user_add',compact('jabatan'));
    }    // End Method

    public function create(): View
    {
        return view('auth.register');
    }


    public function  UserStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profile_image' => ['string', 'max:255'],
            'jabatan' => [ 'integer', 'max:11'],
            'role' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'profile_image' => $request->profile_image,
            'jabatan' => $request->jabatan,
             'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $notification = array(
            'message' => 'Create User Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.all')->with($notification);
    }


    public function UserView($id)
    {

        $user = User::findOrFail($id);
        return view('backend.master.user.user_view', compact('user'));
    } // End Method


    public function UserEdit($id)
    {
        $jabatan = Jabatan::all();
        $editData = User::findOrFail($id);
        return view('backend.master.user.user_edit', compact('editData','jabatan'));
    } // End Method



    public function UserUpdate(Request $request)
    {

        $user_id = $request->id;

        if ($request->file('profile_image')) {

            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200, 200)->save('upload/admin_images/' . $name_gen);
            $save_url = '' . $name_gen;

            User::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'profile_image' => $save_url,
                'role' => $request->role,
                'jabatan' => $request->jabatan,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'User Updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.all')->with($notification);
        } else {

            User::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'jabatan' => $request->jabatan,
                'username' => $request->username,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.all')->with($notification);
        } // end else

    } // End Method




    public function UserDelete($id)
    {

        // $users = User::findOrFail($id);
        // $img = $users->profile_image;
        // unlink($img);

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function  UserReset(Request $request)
    {

        $user_id = $request->id;
        User::findOrFail($user_id)->update([
            'updated_at' => Carbon::now(),
            'password' => bcrypt($request->password),

        ]);

        $notification = array(
            'message' => 'Reset Password Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

   
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Spatie\Analytics\Period;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function settings()
    {
        return view('admin.setting');
    }


    public function user_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'phone' => 'required',
        ]);
        $users = User::where('phone', $request->phone)->first();
        if ($users) {
            return back()->with(
                'error',
                'User already exists'
            );
        }
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();
        return back()->with(
            'success',
            'User added successfully'
        );

    }

    public function analytics()
    {

        // $analyticsData = Analy::fetchVisifetorsAndPageViews(Period::days(7));
        return view('admin.analytics');
    }


    public function staffs()
    {
        $users = User::where('role', 'hospital')->get();
        return view('admin.staff', compact('users'));
    }


    public function upload_logo(Request $request)
    {

        // update logo
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('uploads/logo'), $name);
        $update = Setting::where('id', 1)->update([
            'logo' => $name,
        ]);
        if ($update) {
            return back()->with(
                'success',
                'Logo updated successfully'
            );
        } else {
            return back()->with(
                'error',
                'Logo not updated'
            );
        }
    }

    public function delete_staff($id)
    {
        $user = User::find($id);
        $user->role = 'user';
        $user->save();
        return back()->with(
            'success',
            'User removed successfully'
        );


    }

    public function block_staff($id)
    {
        $user = User::find($id);
        $user->status = 'blocked';
        $user->save();
        return back()->with(
            'success',
            'User blocked successfully'
        );

    }
    public function unblock_staff($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        return back()->with(
            'success',
            'User unblocked successfully'
        );

    }
}
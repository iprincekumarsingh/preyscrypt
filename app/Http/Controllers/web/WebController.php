<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\report_categories;
use App\Models\ReportCatgories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function saveCategories(CategoriesRequest $categoriesRequest)
    {
        $categories = ReportCatgories::create([
            'name' => $categoriesRequest->name,

            'user_id' => Auth::user()->id,
            'ip_address' => request()->ip(),
            'web_agent' => request()->header('User-Agent'),
        ]);

        return redirect()->route('hospital.home')->with('success', 'Category Added Successfully');
    }

    public function reportCategories()
    {
        $categories = ReportCatgories::all();
        return view('web.reportCategories', compact('categories'));
    }

    public function users()
    {

        $users = User::where('role', 'user')->get();
        return view('web.userlist', compact('users'));
    }


    
}
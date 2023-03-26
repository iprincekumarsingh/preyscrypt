<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\FileUploadRequest;
use App\Models\Prescription;
use App\Models\report_categories;
use App\Models\ReportCatgories;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function saveCategories(CategoriesRequest $categoriesRequest)
    {
        $categories = ReportCatgories::create([
            'name' => $categoriesRequest->name,
            'description' => "",
            'report_type' => $categoriesRequest->report_type,
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
    public function index()
    {
        $hospitals = User::where('role', 'user')->get();

        $report_count = Reports::count();
        $presecription = Prescription::count();
        $total_report_categorires = ReportCatgories::count();
        return view('hospital.index', ['hospitals' => $hospitals, 'report_count' => $report_count, 'presecription' => $presecription, 'total_report_categorires' => $total_report_categorires]);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $hospitals = User::where('name', 'like', '%' . $search . '%')->get();
        return view('hospital.index', ['hospitals' => $hospitals]);
    }


    public function SingleUser($customerId)
    {
        $users = User::where('id', $customerId)->get();
        $report = ReportCatgories::get();
        // $user_report = Reports::where('id', $users->customer_id)->get();


        // get user customer id from the user variable
        $user_customer_id = $users[0]['customer_id'];
        $user_report = Reports::where('user_id', $user_customer_id)->get();

        $presription = Prescription::where('customer_id', $user_customer_id)->get();

        // return response()->json([
        //     'users' => $users,
        //     'report' => $report,
        //     'user_report' => $user_report,
        // ]);
        return view('web.userprofile', compact('users', 'report', 'user_report', 'presription'));

    }


    public function search_user(Request $request)
    {
        // $users = User::where('customer_id', $request->customer_id)->first();
        // $usercount = User::where('customer_id', $request->customer_id)->count();
        // $user_report = Reports::where('user_id', $request->customer_id)->get();

        // search user by name and customer id
        $users = User::where('customer_id', 'like', $request->customer_id)->orWhere('name', 'like', $request->customer_id)->first();

        $usercount = User::where('customer_id', $request->customer_id)->orWhere('name', $request->customer_id)->count();

        $user_report = Reports::where('user_id', $request->customer_id)->orWhere('user_id', $request->customer_id)->get();



        // return view('hospital.search', ['users' => $users]);
        if ($usercount > 0) {
            return view('hospital.search', ['users' => $users, 'user_report' => $user_report]);
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
        // if ($users->count() > 0) {
        //     // return view('web.userprofile', ['users' => $users]);
        // } else {
        //     return redirect()->back()->with('error', 'User Not Found');
        // }
    }



    public function hospital_upload_user_report(Request $fileUploadRequest)
    {
        $fileUploadRequest->validate([
            // 'file' => 'required|mimes:pdf,docx,doc,jpg,jpeg,png',
            // 'category_id' => 'required',
            // 'user_id' => 'required',
            // 'category_upload' => 'required',
        ]);

        $document_number = rand(1000, 9999) + Date('His') + $fileUploadRequest->customer_id;

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $fileUploadRequest->file->move(public_path('uploads'), $name);

        $documentType = ReportCatgories::where('id', $fileUploadRequest->category_id)->first();



        $file = new Reports;
        $file->DocumentType = $documentType->name;
        $file->user_id = $fileUploadRequest->user_id;
        $file->report_cat_id = $fileUploadRequest->category_id;
        $file->DocumentNumber = $document_number;
        $file->document_url = $name;
        $file->save();

        return redirect()->back()->with('success', 'Report Uploaded Successfully');
    }

    public function view_report($id)
    {
        $report = Reports::where('id', $id)->first();
        return view('web.view_report', compact('report'));
    }



}
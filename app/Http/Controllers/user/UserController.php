<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUploadRequest;
use App\Http\Requests\PrescriptionUploadRequest;
use App\Models\Prescription;
use App\Models\Reports;
use App\Models\User;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function new_user()
    {
        return view('user.new_user');
    }
    public function update_user(Request $request)
    {
        // validate 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::where('phone', Auth::user()->phone)->first();

        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('home')->with('success', 'Account Updated Successfully');
            ;
        }
    }


    public function profile()
    {
        return view('user.profile');
    }


    public function report_category($id)
    {
        $report_catgoires = \App\Models\ReportCatgories::where('id', $id)->get();
        $user_report = \App\Models\Reports::where('user_id', Auth::user()->customer_id)->where('report_cat_id', $id)->get();
        return view('user.report_category', compact('report_catgoires', 'user_report'));
        // return response()->json([
        //     'report_catgoires' => $report_catgoires,
        //     'user_report' => $user_report,
        // ]);
    }


    public function upload_report(FileUploadRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,doc,jpg,jpeg,png',
            'category_id' => 'required',
            'category_upload' => 'required',
        ]);



        $document_number = rand(1000, 9999) + Date('His');

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('uploads'), $name);

        $file = new Reports;
        $file->DocumentType = $request->category_upload;
        $file->user_id = Auth::user()->customer_id;
        $file->report_cat_id = $request->category_id;
        $file->DocumentNumber = $document_number;
        $file->document_url = $name;
        $file->save();

    }

    public function pdf_view($document_id)
    {
        $pdf = Reports::where('DocumentNumber', $document_id)->get();
        return view('web.document', compact('pdf'));
    }


    public function prescription()
    {

        $prescriptions = Prescription::where('customer_id', Auth::user()->customer_id)->get();

        return view('user.prescriptions')->with(compact('prescriptions'));
    }


    protected function upload_prescription(PrescriptionUploadRequest $prescriptionUploadRequest)
    {

        $prescriptionUploadRequest->validate([
            'file' => 'required|mimes:pdf,docx,doc,jpg,jpeg,png',
        ]);

        $document_number = "pre" . rand(1000, 9999) + Date('His') + Auth::user()->id;

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $prescriptionUploadRequest->file->move(public_path('uploads/prescription'), $name);

        $file = new Prescription;
        $file->customer_id = Auth::user()->customer_id;
        $file->presNumber = $document_number;
        $file->file_link = $name;
        $file->save();

        // return redirect()->route('user.prescription')->with('success', 'Prescription Uploaded Successfully');
        return 1;
    }

    public function prescription_view($presNumber)
    {
        $pdf = Prescription::where('presNumber', $presNumber)->get();
        return view('user.prescriptions_view', compact('pdf'));

        echo "<pre>";
        print_r($pdf);
        // return 
    }

    public function search_report(Request $request)
    {


        // search within date range in laravel
        $from = $request->from;
        $to = $request->to;

        $report = null;


        if ($from == null) {
            $report = Reports::where('user_id', Auth::user()->customer_id)
                ->whereDate('created_at', $to)
                ->get();

            if ($report->count() == 0) {
                return redirect()->back()->with('error', 'No Report Found');
            }

        } else if ($to == null) {
            $report = Reports::where('user_id', Auth::user()->customer_id)
                ->whereDate('created_at', $from)
                ->get();

            if ($report->count() == 0) {
                return redirect()->back()->with('error', 'No Report Found');
            }

        } else {
            $report = Reports::where('user_id', Auth::user()->customer_id)
                ->whereBetween('created_at', [$from, $to])
                ->get();

            if ($report->count() == 0) {
                return redirect()->back()->with('error', 'No Report Found');
            }
        }



        return view('user.user_search', compact('report'));

        // return view('user.search_report');
    }


    public function update_Profile(Request $request)
    {
        // update user profile
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required'
        ]);

        $user = User::where('phone', Auth::user()->phone)->first();

        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob
            ]);
            return redirect()->route('home')->with('success', 'Account Updated Successfully');
        }
    }

}
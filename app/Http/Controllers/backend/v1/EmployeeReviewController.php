<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employee_reviews'] = EmployeeReview::orderBy('date', 'DESC')->orderBy('updated_at', 'DESC')->get();
        return view('backend.v1.pages.employee-review.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('employee-review.index');
        }
        $data['employee_review'] = EmployeeReview::orderBy('id', 'DESC')->first();
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.employee-review.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('employee-review.index');
        }
        $request->validate([
            'number' => 'required',
            'regarding' => 'required',
            'disposition' => 'required',
            'date' => 'required',
            'file' => 'required|max:10024|mimes:pdf',
            'employee_id' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid();
        $data['file'] = $request->file('file')->store('assets/employee-review', 'public');
        EmployeeReview::create($data);

        return redirect()->route('employee-review.index')->with('toast_success', 'Surat Keputusan Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeReview  $employeeReview
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeReview $employeeReview)
    {
        Carbon::setLocale('id');
        $data['employee_review'] = $employeeReview;
        return view('backend.v1.pages.employee-review.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeReview  $employeeReview
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeReview $employeeReview)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('employee-review.index');
        }
        $data['employee_review'] = $employeeReview;
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.employee-review.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeReview  $employeeReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeReview $employeeReview)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('employee-review.index');
        }
        $request->validate([
            'number' => 'required',
            'regarding' => 'required',
            'disposition' => 'required',
            'date' => 'required',
            'employee_id' => 'required'
        ]);

        $data = $request->all();
        if (!is_null($request->file)) {
            $request->validate([
                'file' => 'required|max:10024|mimes:pdf'
            ]);
            Storage::disk('public')->delete($request->oldFile);
            $data['file'] = $request->file('file')->store('assets/decree', 'public');
        }
        $employeeReview->update($data);

        return redirect()->route('employee-review.index')->with('toast_success', 'Surat Keputusan Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeReview  $employeeReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeReview $employeeReview)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('employee-review.index');
        }
        File::delete('storage/' . $employeeReview->file);
        $employeeReview->delete();
        return redirect()->back()->with('toast_success', 'Surat Keputusan Berhasil di Hapus');
    }
}

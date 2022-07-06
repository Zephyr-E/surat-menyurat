<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\IncomingMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['incoming_mails'] = IncomingMail::all();
        return view('backend.v1.pages.incoming-mail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('incoming-mail.index');
        }
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.incoming-mail.create', $data);
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
            return redirect()->route('incoming-mail.index');
        }
        $request->validate([
            'number' => 'required',
            'regarding' => 'required',
            'date' => 'required',
            'agency' => 'required',
            'file' => 'required|max:10024|mimes:pdf',
            'employee_id' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid();
        $data['file'] = $request->file('file')->store('assets/incoming-mail', 'public');
        IncomingMail::create($data);

        return redirect()->route('incoming-mail.index')->with('toast_success', 'Surat Masuk Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingMail $incomingMail)
    {
        Carbon::setLocale('id');
        $data['incoming_mail'] = $incomingMail;
        return view('backend.v1.pages.incoming-mail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingMail $incomingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('incoming-mail.index');
        }
        $data['incoming_mail'] = $incomingMail;
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.incoming-mail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomingMail $incomingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('incoming-mail.index');
        }
        $request->validate([
            'number' => 'required',
            'regarding' => 'required',
            'date' => 'required',
            'agency' => 'required',
            'employee_id' => 'required'
        ]);

        $data = $request->all();
        if (!is_null($request->file)) {
            $request->validate([
                'file' => 'required|max:10024|mimes:pdf'
            ]);
            Storage::disk('public')->delete($request->oldFile);
            $data['file'] = $request->file('file')->store('assets/incoming-mail', 'public');
        }
        $incomingMail->update($data);

        return redirect()->route('incoming-mail.index')->with('toast_success', 'Surat Masuk Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingMail $incomingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('incoming-mail.index');
        }
        File::delete('storage/' . $incomingMail->file);
        $incomingMail->delete();
        return redirect()->back()->with('toast_success', 'Surat Masuk Berhasil di Hapus');
    }
}

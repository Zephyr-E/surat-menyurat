<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\OutgoingMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OutgoingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['outgoing_mails'] = OutgoingMail::all();
        return view('backend.v1.pages.outgoing-mail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('outgoing-mail.index');
        }
        $data['outgoingMail'] = OutgoingMail::orderBy('id', 'DESC')->first();
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.outgoing-mail.create', $data);
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
            return redirect()->route('outgoing-mail.index');
        }
        $request->validate([
            'code' => 'required',
            'regarding' => 'required',
            'date' => 'required',
            'agency' => 'required',
            'file' => 'required|max:10024|mimes:pdf',
            'employee_id' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid();
        $data['file'] = $request->file('file')->store('assets/outgoing-mail', 'public');
        OutgoingMail::create($data);

        return redirect()->route('outgoing-mail.index')->with('toast_success', 'Surat Keluar Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function show(OutgoingMail $outgoingMail)
    {
        Carbon::setLocale('id');
        $data['outgoing_mail'] = $outgoingMail;
        return view('backend.v1.pages.outgoing-mail.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(OutgoingMail $outgoingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('outgoing-mail.index');
        }
        $data['outgoing_mail'] = $outgoingMail;
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.outgoing-mail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutgoingMail $outgoingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('outgoing-mail.index');
        }
        $request->validate([
            'number' => 'required',
            'code' => 'required',
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
            $data['file'] = $request->file('file')->store('assets/outgoing-mail', 'public');
        }
        $outgoingMail->update($data);

        return redirect()->route('outgoing-mail.index')->with('toast_success', 'Surat Keluar Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutgoingMail $outgoingMail)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('outgoing-mail.index');
        }
        File::delete('storage/' . $outgoingMail->file);
        $outgoingMail->delete();
        return redirect()->back()->with('toast_success', 'Surat Keluar Berhasil Dihapus');
    }
}

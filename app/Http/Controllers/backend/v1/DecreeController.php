<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Decree;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DecreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['decrees'] = Decree::orderBy('date', 'DESC')->orderBy('updated_at', 'DESC')->get();
        return view('backend.v1.pages.decree.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('decree.index');
        }
        $data['decree'] = Decree::orderBy('id', 'DESC')->first();
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.decree.create', $data);
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
            return redirect()->route('decree.index');
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
        $data['file'] = $request->file('file')->store('assets/decree', 'public');
        Decree::create($data);

        return redirect()->route('decree.index')->with('toast_success', 'Surat Keputusan Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decree  $decree
     * @return \Illuminate\Http\Response
     */
    public function show(Decree $decree)
    {
        Carbon::setLocale('id');
        $data['decree'] = $decree;
        return view('backend.v1.pages.decree.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decree  $decree
     * @return \Illuminate\Http\Response
     */
    public function edit(Decree $decree)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('decree.index');
        }
        $data['decree'] = $decree;
        $data['employees'] = Employee::all();
        return view('backend.v1.pages.decree.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decree  $decree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Decree $decree)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('decree.index');
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
        $decree->update($data);

        return redirect()->route('decree.index')->with('toast_success', 'Surat Keputusan Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decree  $decree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decree $decree)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('decree.index');
        }
        File::delete('storage/' . $decree->file);
        $decree->delete();
        return redirect()->back()->with('toast_success', 'Surat Keputusan Berhasil di Hapus');
    }
}

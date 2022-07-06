<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['archives'] = Archive::orderBy('updated_at', 'DESC')->get();
        return view('backend.v1.pages.archive.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('archive.index');
        }
        return view('backend.v1.pages.archive.create');
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
            return redirect()->route('archive.index');
        }
        $request->validate([
            'file' => 'required|max:10024|mimes:pdf',
            'name' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid();
        $data['file'] = $request->file('file')->store('assets/archive', 'public');
        Archive::create($data);

        return redirect()->route('archive.index')->with('toast_success', 'Arsip Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('archive.index');
        }
        $data['archive'] = $archive;
        return view('backend.v1.pages.archive.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('archive.index');
        }
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->all();
        if (!is_null($request->file)) {
            $request->validate([
                'file' => 'required|max:10024|mimes:pdf'
            ]);
            Storage::disk('public')->delete($request->oldFile);
            $data['file'] = $request->file('file')->store('assets/archive', 'public');
        }

        $archive->update($data);

        return redirect()->route('archive.index')->with('toast_success', 'Arsip Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('archive.index');
        }
        File::delete('storage/' . $archive->file);
        $archive->delete();
        return redirect()->back()->with('toast_success', 'Arsip Berhasil di Hapus');
    }
}

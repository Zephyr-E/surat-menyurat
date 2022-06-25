<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data["incoming_mails"] = IncomingMail::all();
        return view('backend.v1.pages.incoming-mail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.pages.incoming-mail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "number" => "required",
            "regarding" => "required",
            "date" => "required",
            "agency" => "required"
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $data["uuid"] = Str::uuid();
        IncomingMail::create($data);
        
        return redirect()->route("incoming-mail.index")->with("success", "Surat Masuk Berhasil di Buat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingMail $incomingMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingMail $incomingMail)
    {
        $data["incoming_mail"] = $incomingMail;
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
        $request->validate([
            "number" => "required",
            "regarding" => "required",
            "date" => "required",
            "agency" => "required"
        ]);

        $data = $request->all();
        $incomingMail->update($data);

        return redirect()->route("incoming-mail.index")->with("success", "Surat Masuk Berhasil di Perbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingMail $incomingMail)
    {
        $incomingMail->delete();
        return redirect()->back()->with("success", "Surat Masuk Berhasil di Hapus");
    }
}

<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function incoming_mail()
    {
        Carbon::setLocale('id');
        $data['incoming_mails'] = IncomingMail::all();
        return view('backend.v1.pages.report.incoming-mail', $data);
    }

    public function outgoing_mail()
    {
        $data['outgoing_mails'] = OutgoingMail::all();
        return view('backend.v1.pages.report.outgoing-mail', $data);
    }

    // <div class="form-group">
    //     <label for="number" class="col-4">Ditanda tangani pada Tanggal</label>
    //     <label for="number">:</label>
    //     <label for="number" class="col-1">{{ $employee->created_at->isoFormat('dddd, D MMMM Y') }}</label>
    // </div>
}

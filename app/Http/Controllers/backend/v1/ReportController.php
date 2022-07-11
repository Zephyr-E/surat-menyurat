<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Decree;
use App\Models\EmployeeReview;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function incoming_mail()
    {
        $data['incoming_mails'] = IncomingMail::all();
        return view('backend.v1.pages.report.incoming-mail', $data);
    }

    public function outgoing_mail()
    {
        $data['outgoing_mails'] = OutgoingMail::all();
        return view('backend.v1.pages.report.outgoing-mail', $data);
    }

    public function decree()
    {
        $data['decrees'] = Decree::all();
        return view('backend.v1.pages.report.decree', $data);
    }

    public function employee_review()
    {
        $data['employee_reviews'] = EmployeeReview::all();
        return view('backend.v1.pages.report.employee-review', $data);
    }
}

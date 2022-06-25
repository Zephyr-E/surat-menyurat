<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['incoming_mail'] = IncomingMail::count();
        $data['outgoing_mail'] = OutgoingMail::count();
        $data['archive'] = Archive::count();
        $data['user'] = User::count();
        return view('backend.v1.pages.dashboard.index', $data);
    }
}

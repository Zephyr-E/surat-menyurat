<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Employee;
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
        $data['employee'] = Employee::count();
        $data['user'] = User::count();
        return view('backend.v1.pages.dashboard.index', $data);
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data['user'] = User::find($id);
        return view('profile.show', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

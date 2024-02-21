<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function homePage()
    {
        return redirect()->route('auth.sign-in');
    }

    public function redirectToUserDashboard()
    {
        $user = Auth::user();
        $userPositions = $user->positions()->pluck('role')->toArray();
        if (in_array('super_admin', $userPositions)) {
            return redirect()->route('panel.sa.dashboard');
        } elseif (in_array('manager', $userPositions)) {
            return redirect()->route('panel.manager.dashboard');
        } elseif (in_array('parent', $userPositions)) {
            return redirect()->route('panel.parent.dashboard');
        } elseif (in_array('student', $userPositions)) {
            return redirect()->route('panel.student.dashboard');
        }
        return $this->noAccess();
    }

    public function noAccess()
    {
        return view('panel.general.no-access');
    }
}

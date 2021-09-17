<?php
use App\Models\Alumni;
use App\Models\calender;
use App\Models\Jadwal;
use App\Models\Lab;
use App\Models\Loker;
use App\Models\User;
use App\Models\hmtp;
use App\Models\Perpustakaan;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function hmtp()
    {
        $hmtp = hmtp::get();
        return view('index', compact('hmtp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

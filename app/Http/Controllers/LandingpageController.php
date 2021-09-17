<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\calender;
use App\Models\Jadwal;
use App\Models\Lab;
use App\Models\Loker;
use App\Models\User;
use App\Models\hmtp;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function hmtp()
    {
        $hmtp = hmtp::first();
        return view('welcome', compact('hmtp'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct () {
        $this->middleware(['auth']);
    }

    public function index() {
        // dd(Post::find(11)->created_at->toTimeString()); Shows only time
        // dd(User::find(15)->created_at->diffForHumans()); Shows time ago
        // dd(User::find(15)->created_at->isWeekend());     Is it weekend
        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $eventCount = Event::count();
        $categoryCount = Category::count();

        return view('admin.dashboard', compact('userCount', 'eventCount', 'categoryCount'));
    }
}

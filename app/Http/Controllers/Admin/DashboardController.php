<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::getUser();
        $restaurant = $user->restaurants()->where('user_id', $user->id)->first();
        return view('admin.dashboard', ['user' => Auth::getUser()], compact('restaurant'));
    }
}

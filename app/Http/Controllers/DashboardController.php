<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        return view('app.dashboard', [
            'user' => $user
        ]);
    }

    /**
     * Show the admin dashboard.
     */
    public function adminDashboard()
    {
        $user = Auth::user();
        $orders = Order::with(['user'])->latest()->get();
        return view('admin.dashboard', [
            'user' => $user,
            'orders' => $orders
        ]); 
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', Order::getStatusOptions())
        ]);

        $order->update([
            'status' => $validated['status']
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Status updated successfully');
    }
}
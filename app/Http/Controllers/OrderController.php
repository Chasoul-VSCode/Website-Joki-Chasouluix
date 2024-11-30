<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'package_type' => 'required|in:static,mobile,website',
            'pages_count' => 'required|integer|min:1',
            'project_description' => 'required|string',
            'technologies' => 'required|array',
            'technologies.*' => 'in:html,javascript,php,flutter,laravel',
            'deadline' => 'required|date|after:today',
            'additional_notes' => 'nullable|string',
        ]);

        // Calculate total price based on package type and pages count
        $pricePerPage = [
            'static' => 30000,
            'mobile' => 50000,
            'website' => 65000,
        ];

        // Calculate total price by multiplying price per page with number of pages
        $totalPrice = $pricePerPage[$validated['package_type']] * $validated['pages_count'];

        // Create the order with initial status 'Check'
        $order = Order::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'package_type' => $validated['package_type'],
            'pages_count' => $validated['pages_count'],
            'project_description' => $validated['project_description'],
            'technologies' => $validated['technologies'],
            'deadline' => $validated['deadline'],
            'additional_notes' => $validated['additional_notes'],
            'total_price' => $totalPrice,
            'status' => 'Check'
        ]);

        return redirect()->route('orders.success')->with([
            'success' => 'Pesanan berhasil dibuat!',
            'total_price' => $totalPrice
        ]);
    }

    public function success()
    {
        return view('pages.success');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:Check,Process,Complete,Cancel'
        ]);

        $order->update([
            'status' => $validated['status']
        ]);

        return response()->json([
            'message' => 'Status updated successfully'
        ]);
    }

    public function dashboard()
    {
        $orders = Order::all();

        return view('admin.dashboard', [
            'totalOrders' => $orders->count(),
            'pendingOrders' => $orders->where('status', 'Check')->count(),
            'inProgressOrders' => $orders->where('status', 'Proses')->count(),
            'completedOrders' => $orders->where('status', 'Selesai')->count(),
            'orders' => $orders,
        ]);
    }
}
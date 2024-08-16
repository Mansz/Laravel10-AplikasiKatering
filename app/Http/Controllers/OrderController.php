<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Menampilkan semua pesanan untuk merchant
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        // Menampilkan detail pesanan berdasarkan ID
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat pesanan baru
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
            'customer_email' => 'required|email',
        ]);

        // Membuat pesanan baru
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit pesanan
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
            'customer_email' => 'required|email',
        ]);

        // Mengupdate pesanan
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        // Menghapus pesanan
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

}

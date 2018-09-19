<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Computer;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::admins()->get();
        $computers = Computer::all();
        $services = Service::all();
        return view('orders.create', compact('order', 'admins', 'computers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create([
            'admin_id' => $request->admin,
            'computer_id' => $request->computer
        ]);
        foreach ($request->services as $key => $service) {
            $order->services()->attach($service, ['count' => $request->count[$key]]);
        }
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $admins = User::admins();
        $computers = Computer::all();
        $services = $order->services()->get();
        return view('orders.view', compact('order', 'services'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->services()->sync([]);
        $order->delete();
        return redirect(route('orders.index'));
    }
}

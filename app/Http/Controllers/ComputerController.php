<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function __construct()
    {
        view()->share(['type' => 'computers']);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $computers = Computer::paginate(10);
        return view('computers.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ComputerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {
        Computer::create($request->all());
        return redirect(route('computers.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Computer $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ComputerRequest $request
     * @param Computer $computer
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, Computer $computer)
    {
        $computer->update($request->all());
        return redirect(route('computers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Computer $computer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect(route('computers.index'));
    }
}

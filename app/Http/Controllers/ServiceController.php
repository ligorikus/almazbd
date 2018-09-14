<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
        view()->share(['type' => 'services']);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ComputerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->all());
        return redirect(route('services.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Computer $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ComputerRequest $request
     * @param Computer $computer
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->all());
        return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Computer $computer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(route('services.index'));
    }
}

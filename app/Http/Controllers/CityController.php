<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.city.index', ['cities' => City::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        City::create($request->all());
     
        return redirect()->route('cities.index')
                        ->with('success','Creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $city->update($request->all());
    
        return redirect()->route('cities.index')
                        ->with('success','Ciudad actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        
        return redirect()->route('cities.index')
                        ->with('success','Ciudad eliminado');
    }
}

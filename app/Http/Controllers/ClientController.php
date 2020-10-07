<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index', ['clients' => Client::simplePaginate(10), 'cities' => City::all()]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCity(City $city)
    {
        return view('admin.client.index', 
            ['clients' => Client::where('city_id', $city->id)->simplePaginate(10), 'cities' => City::all()])
            ->with('selected', $city->id);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create', ['cities' => City::all()]);
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
            'name' => 'required',
            'city_id' => 'required',
        ]);
    
        Client::create($request->all());
     
        return redirect()->route('clients.index')
                        ->with('success','Creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit', [
            'client' => $client,
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
        ]);
    
        $client->update($request->all());
    
        return redirect()->route('clients.index')
                        ->with('success','Client actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        
        return redirect()->route('clients.index')
                        ->with('success','Cliente eliminado');
    }
}

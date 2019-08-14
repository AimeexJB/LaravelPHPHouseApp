<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\House;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();

        return view('houses.index')->with(array(
            'houses' => $houses
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('houses.create');
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
            'name' => 'required|max:191',
            'salerent' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|numeric|min:0'
        ]);

        $house = new House();
        $house->name = $request->input('name');
        $house->salerent = $request->input('salerent');
        $house->description = $request->input('description');
        $house->price = $request->input('price');
        $house->save();

        $session = $request->session()->flash('message', 'House added successfully!');

        return redirect()->route('houses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house = House::findOrFail($id);

        return view('houses.show')->with(array(
            'house' => $house
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::findOrFail($id);

        return view('houses.edit')->with(array(
            'house' => $house
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'salerent' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|numeric|min:0'
        ]);

        $house->name = $request->input('name');
        $house->salerent = $request->input('salerent');
        $house->description = $request->input('description');
        $house->price = $request->input('price');

        $house->save();

        $session = $request->session()->flash('message', 'House updated successfully!');

        return redirect()->route('houses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = House::findOrFail($id);

        $house->delete();

        Session::flash('message', 'House deleted successfully!');

        return redirect()->route('houses.index');
    }
}

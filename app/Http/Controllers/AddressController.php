<?php

namespace App\Http\Controllers;

use App\Address;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Address::create([
            'street' => $request->address_street,
            'number' => $request->address_number,
            'complement' => $request->address_complement,
            'district' => $request->address_district,
            'city' => $request->address_city,
            'state' => $request->address_state,
            'country' => $request->address_country,
            'ref' => $request->address_ref,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input = Arr::except($input, '_token');

        Address::whereId($id)->update($input);

        return redirect()->route('users.index')
            ->with('success','Endereço editados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
    }
}

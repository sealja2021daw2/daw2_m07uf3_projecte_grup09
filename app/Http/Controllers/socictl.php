<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Soci;
Use DB;
use Validator;

class socictl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soci = Soci::all();
        return view('socicrudview.index', compact('soci'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socicrudview.crea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nouSoci = $request->validate([
            'nif' => 'unique:socis|required|max:9',
            'nom' => 'required|max:25',
            'cognoms' => 'required|max:50',
            'adreca' => 'required|max:50',
            'poblacio' => 'required|max:25',
            'comarca' => 'required|max:25',
            'telefon' => 'required|max:9',
            'mobil' => 'required|max:9',
            'email' => 'unique:socis|required|max:100',
            'd_alta' => 'required|date_format:Y-m-d',
            'q_mensual' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);


            $soci = Soci::create($nouSoci);
            DB::update('update socis set aport_anual =?*12 where nif = ?',[$request->input('q_mensual'),$request->input('nif')]);
            return redirect('/socis')->with('completed', 'Soci creat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soci = Soci::findOrFail($id);
        return view('socicrudview.actualitza', compact('soci'));
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

        $socitemp = DB::table('socis')->where('nif', '=', $id)->first();
        
        $uniquenif='unique:socis|required|max:9';
        $uniqueemail='unique:users|required|max:25';
        if($request->input('nif')==$id) $uniquenif='required|max:9';
        if($request->input('email')==$socitemp->email) $uniqueemail='required|max:25';

        $dades = $request->validate([
            'nif' => $uniquenif,
            'nom' => 'required|max:25',
            'cognoms' => 'required|max:50',
            'adreca' => 'required|max:50',
            'poblacio' => 'required|max:25',
            'comarca' => 'required|max:25',
            'telefon' => 'required|max:9',
            'mobil' => 'required|max:9',
            'email' => $uniqueemail,
            'd_alta' => 'required|date_format:Y-m-d',
            'q_mensual' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'donacio' => 'regex:/^\d+(\.\d{1,2})?$/'
            ]);
            Soci::wherenif($id)->update(collect($dades)->except('donacio')->toArray());
            DB::update('update socis set aport_anual =?*12+? , donacio=?+? where nif = ?',[$request->input('q_mensual'),$request->input('donacio'),$socitemp->donacio,$request->input('donacio'),$request->input('nif')]);
            return redirect('/socis')->with('completed', 'Soci actualitzat'); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soci = Soci::findOrFail($id);
        $soci->delete();
        return redirect('/socis')->with('completed', 'Soci esborrat');
    }

   
}

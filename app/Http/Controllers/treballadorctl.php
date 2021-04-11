<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Treballador;
Use DB;
use Validator;
use App\Models\Ong;

class treballadorctl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treballador = Treballador::all();
        return view('treballadorcrudview.index', compact('treballador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ong = Ong::all();
        return view('treballadorcrudview.crea',compact('ong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouTreballador = $request->validate([
            'nif' => 'unique:treballadors|required|max:9',
            'nom' => 'required|max:25',
            'cognoms' => 'required|max:50',
            'adreca' => 'required|max:50',
            'poblacio' => 'required|max:25',
            'comarca' => 'required|max:25',
            'telefon' => 'required|max:9',
            'mobil' => 'required|max:9',
            'email' => 'unique:treballadors|required|max:100',
            'd_ingres' => 'required|date_format:Y-m-d',
            'cif_ong'=> 'required|max:9|exists:ongs,cif',
            ]);


            $treballador = Treballador::create($nouTreballador);

            return redirect('/treballadors')->with('completed', 'Treballador creat!');
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
        $treballador = Treballador::findOrFail($id);
        $ong = Ong::all();
        return view('treballadorcrudview.actualitza', compact('treballador'), compact('ong'));
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
        $treballadortemp = DB::table('treballadors')->where('nif', '=', $id)->first();
        
        $uniquenif='unique:treballadors|required|max:9';
        $uniqueemail='unique:treballadors|required|max:100';
        if($request->input('nif')==$id) $uniquenif='required|max:9';
        if($request->input('email')==$treballadortemp->email) $uniqueemail='required|max:100';
        
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
            'd_ingres' => 'required|date_format:Y-m-d',
            'cif_ong'=> 'required|max:9|exists:ongs,cif',
            ]);
            
        Treballador::wherenif($id)->update($dades);
        return redirect('/treballadors')->with('completed', 'Treballador actualitzat'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treballador = Treballador::findOrFail($id);
        $treballador->delete();
        return redirect('/treballadors')->with('completed', 'Treballador esborrat');
    }
}

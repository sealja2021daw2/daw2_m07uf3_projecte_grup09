<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ong;
Use DB;
use Validator;


class ongctl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ong = Ong::all();
        return view('ongcrudview.index', compact('ong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ongcrudview.crea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('utilpublicgencat')=="true")
            $request['utilpublicgencat']=true;
        else $request['utilpublicgencat']=false;

        $nouOng = $request->validate([
            'cif' => 'unique:ongs|required|max:9',
            'nom' => 'required|max:25',
            'adreca' => 'required|max:50',
            'poblacio' => 'required|max:25',
            'comarca' => 'required|max:25',
            'tipus_ong' => 'required|max:25',
            'utilpublicgencat' => 'required|boolean',
            
            ]);

            $ong = Ong::create($nouOng);
            return redirect('/ongs')->with('completed', 'Ong creat!');
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
        $ong = Ong::findOrFail($id);
        return view('ongcrudview.actualitza', compact('ong'));
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
        if($request->input('utilpublicgencat')=="true")
            $request['utilpublicgencat']=true;
        else $request['utilpublicgencat']=false;


        $uniquecif='unique:ongs|required|max:9';
        if($request->input('cif')==$id) $uniquecif='required|max:9';
        
        $dades = $request->validate([
            'cif' => $uniquecif,
            'nom' => 'required|max:25',
            'adreca' => 'required|max:50',
            'poblacio' => 'required|max:25',
            'comarca' => 'required|max:25',
            'tipus_ong' => 'required|max:25',
            'utilpublicgencat' => 'required|boolean',
            
            ]);

            Ong::wherecif($id)->update($dades);
            return redirect('/ongs')->with('completed', 'Ong actualitzat'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ong = Ong::findOrFail($id);
        $ong->delete();
        return redirect('/ongs')->with('completed', 'Ong esborrat');
    }
}

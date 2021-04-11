<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formade;
use App\Models\Ong;
use App\Models\Soci;

Use DB;
use Validator;
class formadectl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formade = Formade::all();
        return view('formadecrudview.index', compact('formade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soci = Soci::all();
        $ong = Ong::all();
        return view('formadecrudview.crea', compact('soci'), compact('ong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $nouFormade = $request->validate([
            'cif_ong' => 'required|unique:formades,cif_ong,NULL,NULL,nif_soci,' . $request['nif_soci'],
            'nif_soci' => 'required|unique:formades,nif_soci,NULL,NULL,cif_ong,' . $request['cif_ong'],
            ]);

            $formade = Formade::create($nouFormade);
            return redirect('/formades')->with('completed', 'S ha unit el soci a la ong');
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
    public function edit($id,$id2)
    {
        $formade = Formade::where('cif_ong',$id)->where('nif_soci',$id2)->first();
        return view('formadecrudview.actualitza', compact('formade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id2)
    {
        $formade = Formade::where('cif_ong',$id)->where('nif_soci',$id2)->first();

        $existeong = DB::table('ongs')->where('cif', '=', $request->input('cif_ong'))->first();
        if($existeong){
            $existesoci = DB::table('socis')->where('nif', '=', $request->input('nif_soci'))->first();

            if($existesoci){
                $uniqueong='required|unique:formades,cif_ong,NULL,NULL,nif_soci,';
                $uniquesoci='required|unique:formades,nif_soci,NULL,NULL,cif_ong,';
                if($request->input('cif_ong')==$id) $uniqueong='required|max:25';
                if($request->input('nif_soci')==$id2) $uniquesoci='required|max:25';

                $dades = $request->validate([
                    'cif_ong' => $uniqueong,
                    'nif_soci' => $uniquesoci
                    
                    ]);
                    
                Formade::where('cif_ong','=',$id,'and','nif_soci','=',$id2)->update($dades);
                return redirect('/formades')->with('completed', 'User actualitzat'); 
            }else return view('formadecrudview.actualitza',compact('formade'),['errores'=>"No existeix aquet soci"]);
        } return view('formadecrudview.actualitza',compact('formade'),['errores'=>"No existeix aquesta ong"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id2)
    {
        Formade::where('cif_ong',$id)->where('nif_soci',$id2)->delete();
        return redirect('/formades')->with('completed', 'Soci deixa la ong');
    }
}

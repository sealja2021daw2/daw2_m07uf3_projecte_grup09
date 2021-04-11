<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Professional;
use App\Models\Voluntari;
use App\Models\Treballador;

Use DB;
use Validator;

class professionalctl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professional = Professional::all();
        return view('professionalcrudview.index', compact('professional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treballadorstemp = Treballador::all();
        $professionalstemp = Professional::all();
        $dif1=$treballadorstemp->diff($professionalstemp);
        $voluntaritemp = Voluntari::all();
        $treballador= $dif1->diff($voluntaritemp);
        return view('professionalcrudview.crea', compact('treballador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouProfessional = $request->validate([
            'nif' => 'unique:professionals|required|max:9',
            'carrec' => 'required|max:25',
            'q_paga_SSocial' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'irpf_descomp' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            
            ]);

            $professional = Professional::create($nouProfessional);

            return redirect('/professionals')->with('completed', 'Professional creat!');
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
        $professional = Professional::findOrFail($id);
        $treballadorstemp = Treballador::all();
        $professionalstemp = Professional::where('nif','!=',$id)->get();
        $dif1=$treballadorstemp->diff($professionalstemp);
        $voluntaritemp = Voluntari::all();
        $treballador= $dif1->diff($voluntaritemp);
        

        return view('professionalcrudview.actualitza', compact('professional'), compact('treballador'));
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
        $uniquenif='unique:professionals|required|max:9';
        if($request->input('nif')==$id) $uniquenif='required|max:9';
        
        $dades = $request->validate([
            'nif' => $uniquenif,
            'carrec' => 'required|max:25',
            'q_paga_SSocial' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'irpf_descomp' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            
            ]);

            Professional::wherenif($id)->update($dades);
            return redirect('/professionals')->with('completed', 'Professional actualitzat'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professional = Professional::findOrFail($id);
        $professional->delete();
        return redirect('/professionals')->with('completed', 'Professional esborrat');
    }
}

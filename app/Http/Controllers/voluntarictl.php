<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Models\Professional;
use App\Models\Voluntari;
use App\Models\Treballador;

Use DB;
use Validator;

class voluntarictl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntari = Voluntari::all();
        return view('voluntaricrudview.index', compact('voluntari'));
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
        return view('voluntaricrudview.crea', compact('treballador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouVoluntari = $request->validate([
            'nif' => 'unique:voluntaris|required|max:9',
            'edat' => 'required|numeric',
            'professio' => 'required|max:25',
            'h_dedicades' => 'required|numeric',
            ]);

            $voluntari = Voluntari::create($nouVoluntari);

            return redirect('/voluntaris')->with('completed', 'Voluntari creat!');
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
        $voluntari = Voluntari::findOrFail($id);
        $treballadorstemp = Treballador::all();
        $professionalstemp = Professional::all();
        $dif1=$treballadorstemp->diff($professionalstemp);
        $voluntaritemp = Voluntari::where('nif','!=',$id)->get();
        $treballador= $dif1->diff($voluntaritemp);
        

        return view('voluntaricrudview.actualitza', compact('voluntari'), compact('treballador'));
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
        $uniquenif='unique:voluntaris|required|max:9';
        if($request->input('nif')==$id) $uniquenif='required|max:9';
        
        $dades = $request->validate([
            'nif' => $uniquenif,
            'edat' => 'required|numeric',
            'professio' => 'required|max:25',
            'h_dedicades' => 'required|numeric',
        ]);
        
        Voluntari::wherenif($id)->update($dades);
        return redirect('/voluntaris')->with('completed', 'Voluntari actualitzat'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voluntari = Voluntari::findOrFail($id);
        $volutnari->delete();
        return redirect('/voluntaris')->with('completed', 'Voluntari esborrat');
    }
}

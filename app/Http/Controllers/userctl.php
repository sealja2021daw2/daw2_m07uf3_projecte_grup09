<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use DB;

class userctl extends Controller
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
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * LOGIN USER
     * @param  \Illuminate\Http\Request  $request
     */

    public function login(Request $request ){
        $data = $request->input();

        $user = DB::table('users')->where('nomusuari', '=', $data['inputUsername'])->first();

        if($user){
            if(Hash::check($data['inputPassword'],$user->contrasena)){ 
                $this->ultimoacesso($user->nomusuari);
                if($user->esadmin) return view('menuadm',['username' => $user->nomusuari]);
                else return view('menu',['username' => $user->nomusuari]);

            }else return view('welcome',['error'=>"La contrasenya no coincideix"]);
        }else return view('welcome',['error'=>"El usuari no existeix"]);
    }

    /** 
     * ultimo acceso
    */
    public function ultimoacesso($username){    
        DB::update('update users set h_entrada = now() where nomusuari = ?',[$username]);
    }

    /** 
     * ultimo salida
    */
    public function ultimasalida($username){    
        DB::update('update users set h_sortida = now() where nomusuari = ?',[$username]);
    }

    /**
     * CHANGE PASSWORD USER
     */
    public function changepassword(Request $request){
        $data = $request->input();

        $user = DB::table('users')->where('nomusuari', '=', $data['inputUsername'])->first();
        
        if(strlen($data['inputNewPassword'])<8) return view('changepassword',['error'=>"La contrasenya te una mida massa petita"]);
        else{
            if($user){
                if(Hash::check($data['inputPassword'],$user->contrasena)){ 
                    $newpassword=Hash::make($data['inputNewPassword']);
                    $this->ultimasalida($user->nomusuari);
                    DB::update('update users set contrasena = ? where nomusuari = ?',[$newpassword,$user->nomusuari]);
                    return view('welcome',['changepassword'=> "Contrasenya cambiada!!!"]);
                }else return view('changepassword',['error'=>"La contrasenya no coincideix"]);
            }else return view('changepassword',['error'=>"Aque usuari existeix??"]);
        }

    }

}

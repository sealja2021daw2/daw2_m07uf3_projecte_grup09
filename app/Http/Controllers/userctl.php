<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use DB;
use Validator;

class userctl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('usercrudview.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usercrudview.crea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('esadmin')=="true")
            $request['esadmin']=true;
        else $request['esadmin']=false;

        $nouUser = $request->validate([
            'nomusuari' => 'unique:users|required|max:25',
            'esadmin' => 'required|boolean',
            'contrasena' => 'required|min:8',
            'nom' => 'required|max:25',
            'cognoms' => 'required|max:25',
            'email' => 'unique:users|required|max:25',
            'mobil' => 'required|max:9',
            
            ]);

            $nouUser['contrasena']=Hash::make($request['contrasena']);
            $user = User::create($nouUser);
            return redirect('/users')->with('completed', 'User creat!');
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
        $user = User::findOrFail($id);
        return view('usercrudview.actualitza', compact('user'));
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
        if($request->input('esadmin')=="true")
            $request['esadmin']=true;
        else $request['esadmin']=false;
        
        $usertemp = DB::table('users')->where('nomusuari', '=', $id)->first();
        
        $uniqueusername='unique:users|required|max:25';
        $uniqueemail='unique:users|required|max:100';
        if($request->input('nomusuari')==$id) $uniqueusername='required|max:25';
        if($request->input('email')==$usertemp->email) $uniqueemail='required|max:100';

        $dades = $request->validate([
            'nomusuari' => $uniqueusername,
            'esadmin' => 'required|boolean',
            'contrasena' => 'required|min:8',
            'nom' => 'required|max:25',
            'cognoms' => 'required|max:25',
            'email' => $uniqueemail,
            'mobil' => 'required|max:9'
            
            ]);
            if( strpos($request->input('contrasena'),'2y$10$')==false) $dades['contrasena']=Hash::make($request['contrasena']);
            
        User::wherenomusuari($id)->update($dades);
        return redirect('/users')->with('completed', 'User actualitzat');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('completed', 'User esborrat');
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

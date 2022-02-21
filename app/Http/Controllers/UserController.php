<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',['users'=>$users]);
        // return view('admin.events',['events' =>$events]);
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

        // $request->validate([
        //     'name' => 'required',
        //     'img' => 'required',   
        // ]);

        $request->validate( [
            'name' => 'required|string',
            'sur_name' => 'required|string',
            'dni' => 'required|string',
            'zip_code'=>'required|string',
            'email' => 'required|string|unique',
            'password' => 'required',    
        ]);
       
        return User::create([
            'name' => $request['name'],
            'sur_name' => $request['sur_name'],
            'dni' => $request['dni'],
            'phone' => $request['phone'],
            'zip_code' => $request['zip_code'],
            'user_types' => $request['user_types'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        return view('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.detail',['user' =>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {


        $request->validate([
            'name' => 'required',
            'sur_name' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
        ]);

     
        $user -> name = $request['name'];
        $user -> sur_name = $request['sur_name'];
        $user -> zip_code = $request['zip_code'];
        $user -> phone = $request['phone'];
        
        // return view('user.edit',['user' =>$user]);
        // $user -> user_types = $request['user_types'];
      
        $user->save();

        return redirect()->back()->with('message', 'usuario actualizado');   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

     
        $user -> user_types = $request['user_types'];
      
        $user->save();

        return redirect()->back()->with('message', 'permisos de usuario actualizados');   
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
}

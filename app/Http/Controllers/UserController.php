<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      public function index()
    {
        $users = User::all();
        
        return view('home', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
               
        ]);

        return redirect("user");
    }

    /**
     * Display the specified resource.
     */
    public function show( )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("menu.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $User = User::find($id);
         $User->update($request->all());

        return redirect("menu")->with("status", "Berhasil update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $User = User::find($id);

         
        $User->delete();

        return redirect("menu")->with("status", "Berhasil update");


    }
}

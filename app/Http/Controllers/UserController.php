<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.vw_registrasi');
    }

    public function show()
    {
        //
        $data = User::paginate(5); 

        return view('users.vw_user', compact('data'));
    }

    public function user_search(Request $request)
    {

        $search = $request->search;
        $status = $request->status;

        $data = User::filter($search, $status);

        return view('users.vw_user', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

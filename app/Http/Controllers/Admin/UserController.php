<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        /* getAll is a local scope declared in User model */

        // No input in search - get all users
        if ( empty(request('q')) )
        {
            $users = User::getAll()->paginate(10);
        }
        else
        {
            // filter method in User Model - Query Scope
            $users = User::filter(request(['q']))->paginate(10);

            // No result from search
            if ( $users->isEmpty() )
            {
                $users = User::getAll()->paginate(10);

                session()->flash('bold_message', 'Ups!');
                session()->flash('sucess_message', 'No user found');

            }
            else
            {
                // Send to view how many results were found
                $count = count($users);

                $message = $count == 1 ?
                    "$count result found"
                    : "$count results found";

                session()->flash('bold_message', 'Users:');
                session()->flash('sucess_message', "$message");
            }
        }

        return view('admin.users.index', compact('users') );

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
    public function show($id): View
    {
        $user = User::with('roles')
                ->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')
                ->findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        if( $id !== auth()->user()->id){
            User::destroy($id);
        }

        return back()->with('sucess_message', 'User K.O.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subaccount;
use Session;
use Auth;
use Hash;
use App\Http\Requests;

class SubAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $users = User::where('acc_id', '=', Auth::user()->name)->get();

      if(empty(Auth::user()->acc_id))
      {
        return view('subaccounts/index')->with('Subacc',$users);
      }
      else
      {
        return view('error404');
      }
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
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'min:6|required|confirmed',
        'password_confirmation' => 'required|min:6'
        ]);


        $Subaccount                  = new User;
        $Subaccount->name            = Auth::user()->name.'_'.$request->input('name');
        $Subaccount->Department      = Auth::user()->Department;
        $Subaccount->acc_id          = Auth::user()->name;
        $Subaccount->email           = $request->input('email').'@'.Auth::user()->name.'.com';
        $Subaccount->password        = Hash::make($request->password); 
        $Subaccount->save(); 
        Session::flash('success', ' Account successfully created!');

        return redirect()->route('accounts.index');
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
        $user = User::find($id);
        $user->delete();
        Session::flash('success','The Account was successfully deleted.');
        return redirect()->route('accounts.index');
    }
}

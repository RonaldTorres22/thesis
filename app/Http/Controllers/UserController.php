<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\UpdateProfileRequest;
use Session;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {

        $this->middleware('auth');
    }  
    
    public function index()
    {
        // $users = User::get();

        $users = User::Where('role','!=',"admin")->paginate(5);

        return view('organizations.index')->with('Users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;

        return view('organizations.register')->with(compact('user'));
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
        'email' => 'required|email',
        'password' => 'min:6|required|confirmed',
        'password_confirmation' => 'required|min:6'
        ]);

        $user                  = new User;
        $user->name            = $request->input('name');
        $user->Department      = $request->input('department');
        $user->email           = $request->input('email');
        $user->role            = 'user';
        $user->password        = Hash::make($request->password); 
        $user->save(); 

        Session::flash('success', ' organization successfully created!');

        return redirect()->route('organization.index');
    }

    public function settings($id)
    {   
        $user = User::findOrFail($id);
        if(Auth::user()->id == $user->id)
        {
        return view('auth/settings')->with('user',$user);
        }
        else{
        return back();
        }
       
    }

     public function changepassword(Request $request, $id)
    {
       
            if (Hash::check($request->input('old_password'), Auth::user()->password))
            {

         $this->validate($request, [
                    'password' => 'required|confirmed',
            ]);

            $user = User::findOrFail($id);
            $input = $request->input();
            //Change Password if password value is set
            if ($input['password'] != "") {
               //dd(bcrypt($input['password']));
               $input['password'] = bcrypt($input['password']);
            }


            $user->fill($input)->save();

            $request->session()->flash('success', 'The new password was successfully saved!');
        return back();
           
            }

            else{
              $request->session()->flash('error', 'Current Password Incorrect');
               return back();
            }

   }

    public function update_avatar(UpdateProfileRequest $request){
       $profile = Auth::user();
             if( $request->hasFile('avatar'))
               { 
                   $request->file('avatar')->move(public_path('profpics'), $request->file('avatar')->getClientOriginalName());
                   $profile->avatar = $request->file('avatar')->getClientOriginalName();
                   $profile->save();
                   $request->session()->flash('success', 'The new Image was successfully saved!');
               }
       return back();
    }

     public function delete_avatar(Request $request){
       $profile = Auth::user();       
       $profile->avatar =  'default.jpg';
       $profile->save();
       $request->session()->flash('success', 'The new Image was successfully removed!');
       return back();
               
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
        Session::flash('success','The organization was successfully deleted.');
        return redirect()->route('organization.index');
    }
}

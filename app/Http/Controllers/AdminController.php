<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        //i put authentication for all admin pages except login, process_login
        $this->middleware('auth:admin', ['except' => ['login','process_login','create']]);
    }
    // this fetches the admin login page
    public function login(){
        return view('admin.login');
    }
    public function process_login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);


        $email = $request->input('email');

        $password = $request->input('password');


        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {

            return redirect()->intended('/admin/dashboard');
        } else {
            $data = [
                'error' => 'Email Address / Password Mismatch'
            ];
            return redirect('/admin/login')->with($data);
        };
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //
        return view('admin.dashboard');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
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
}

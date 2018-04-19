<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;

class UserController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
	$users = User::with('roles')->orderBy('id','ASC')->paginate(10);
	    return view('settings.users.userIndex',compact('users'))
    	    ->with('i',($request->input('page',1)-1)*10);
	    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
	$roles = Role::all()->pluck('name','id'); 
        return view ('settings.users.userCreate',compact('roles'));
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
           'email' => 'required|email|unique:users',
    	    'name' => 'required',
	    'password' => 'required|min:6|',
	    'password_repeat' => 'required|same:password',
        ]);
	$data = $request->all();
	$dataPassword = $data['password'];
	$data['password'] = bcrypt($dataPassword);
	$id = User::create($data,['except'=>['password_repeat']])->id;
    	DB::table('role_user')->insert([
	    'role_id'=>$data['role_id'],
	    'user_id'=>$id
	    ]);
	return redirect()->route('users.index')->with('succes','User successfuly created');
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
    public function edit(User $user)
    {
	$user = User::with('roles')->find($user->id);
	$roles = Role::all()->pluck('name','id'); 
//	dd($roles);
	return view('settings.users.userEdit', compact('user','roles'));
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
         $this->validate($request, [
            'email' => 'required|email',
    	    'name' => 'required',
//	    'password' => 'min:6',
	    'password_repeat' => 'same:password',
        ]);
	
    	$data = $request->all();
	$dataPassword = $data['password'];
	if($dataPassword!=null) {
	$data['password'] = bcrypt($dataPassword);
	User::find($id)->update($data);
	} else {
	User::find($id)->update($request->except('password'),$request->all());
	}
    	DB::table('role_user')->where('user_id', $id)->update(array('role_id' => $data['role_id']));
	return redirect()->route('users.index')->with('succes','User successfuly updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();
//	dd($user->id);
	DB::table('role_user')->where('user_id',$user->id)->delete();
	 return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}

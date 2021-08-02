<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Person;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::select('tb_users.id as user_id', 'tb_users.email', 'tb_users.created_at',
            'tb_users.person_id', 'p.first_name', 'p.last_name', 'p.cpf', 'p.birthday', 'p.phone', 'p.address_id as address_id')
            ->join('tb_people as p', 'tb_users.person_id', 'p.id')
            ->orderBy('user_id','DESC')
            ->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password|min:8',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
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
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::select('*')
            ->join('tb_people as p', 'tb_users.person_id', 'p.id')
            ->join('tb_address as a', 'p.address_id', 'a.id')
            ->where('tb_users.id', $id)->first();
        $roles = Role::all();
        $userRole = Role::select('*')
                ->where('id', $user->role_id)->first();

        return view('users.edit',compact('user','roles','userRole'));
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
            'password' => 'required|same:password_confirmation|min:8',
            'role' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $input = Arr::except($input, 'password_confirmation');
        }else{
            $input = Arr::except($input,array('password'));
        }

        $input = Arr::except($input, '_token');
        $input['role_id'] = $input['role'];
        $input = Arr::except($input, 'role');

        User::whereId($id)->update($input);
        DB::table('tb_model_has_roles')->where('model_id',$id)->delete();

        $user = User::whereId($id)->first();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','Usuário editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Usuário deletado com sucesso');
    }
}

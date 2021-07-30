<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Address;
use App\Person;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tb_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instances after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            return User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'address_id' => 0,
                'person_id' => 0,
                'role_id' => 0,
                'created_at' => now(),
                'modified_at' => now()
            ]);
    }

    protected function register(Request $request){
        //try{
            $validate = Validator::make($request->all(),[
                'email' =>'required',
                'password' =>'required'
            ]);

            if($validate){
                DB::beginTransaction();

                $address = Address::create(
                    [
                        'street' => $request->address_street,
                        'number' => $request->address_number,
                        'complement' => $request->address_complement,
                        'district' => $request->address_district,
                        'city' => $request->address_city,
                        'state' => $request->address_state,
                        'country' => $request->address_country,
                        'postalcode' => $request->address_postalcode,
                        'ref' => $request->address_ref
                    ]
                );

                $person = Person::create(
                    [
                        'first_name' => $request->person_first_name,
                        'last_name' => $request->person_last_name,
                        'cpf' => $request->person_cpf,
                        'birthday' => $request->person_birthday,
                        'phone' => $request->person_phone,
                    ]
                );

                $role = Role::create(
                    [
                        'role' => 'student'
                    ]
                );

                $user = $this->create(
                    [
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'address_id' => $address->id,
                        'person_id' => $person->id,
                        'role_id' => $role->id,
                        'created_at' => now(),
                        'modified_at' => now()
                    ]
                );

                $Address = Address::find($address->id);
                $Address->person_id = $person->id;
                $Address->save();

                $Person = Person::find($person->id);
                $Person->address_id = $address->id;
                $Person->user_id = $user->id;
                $Person->save();

                DB::commit();

                return response()->json(['status' => 1, 'msg'=>'Usuário criado com sucesso.']);
            }
        //}catch(\Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0,'msg'=>'Erro ao criar usuário.']);
        //}
    }
}

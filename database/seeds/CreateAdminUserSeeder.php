<?php

use Illuminate\Database\Seeder;
use App\Address;
use App\Person;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::beginTransaction();

            $address = Address::create(
                [
                    'street' => 'Rua dos Bobos',
                    'number' => '0',
                    'complement' => '',
                    'district' => 'Boqueirão',
                    'city' => 'Curitiba',
                    'state' => 'Paraná',
                    'country' => 'Brasil',
                    'postalcode' => '00000-000',
                    'ref' => ''
                ]
            );

            $person = Person::create(
                [
                    'first_name' => 'Site',
                    'last_name' => 'Admin',
                    'cpf' => '000.000.000-00',
                    'birthday' => '1993/11/29',
                    'phone' => '(41) 91234-5678',
                ]
            );

            $role = Role::create([
                'name' => 'admin',
                'guard_name' => 'web'
            ]);

            $user = User::create(
                [
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('admin123'),
                    'address_id' => $address->id,
                    'person_id' => $person->id,
                    'role_id' => $role->id
                ]
            );

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);

            $Address = Address::find($address->id);
            $Address->person_id = $person->id;
            $Address->save();

            $Person = Person::find($person->id);
            $Person->address_id = $address->id;
            $Person->user_id = $user->id;
            $Person->save();

            DB::commit();
        }catch(\Exception $ex){
            DB::rollBack();
        }
    }
}

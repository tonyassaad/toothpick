<?php

namespace Database\Seeders;

use App\Helper\GeneralHelper;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Exception;
use PhpParser\Node\Expr\Print_;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedUsers();
    }

    private function seedUsers()
    {

        try {

            $users = [
                [
                    'first_name' => 'Tony',
                    'last_name' => 'assaad',
                    'uuid' => GeneralHelper::generateUuid(),
                    'email' => 'toniassaad@gmail.com',
                    'password' => Hash::make('12345678'),
                    'is_verified' => 1,
                ],

                [
                    'first_name' => 'Mustafa',
                    'last_name' => 'adam',
                    'uuid' => GeneralHelper::generateUuid(),
                    'email' => 'mustafa.addam@toothpickapp.com',
                    'password' => Hash::make('12345678'),
                    'is_verified' => 1,
                ],
            ];

            $role = new Role();
            $adminRole = $role->forName('admin')->first();

            foreach ($users as $user) {
                $exUser = User::where('email', $user['email'])->first();
                if (null == $exUser) {
                    $user = User::firstOrNew(
                        [
                            'first_name' => $user['first_name'],
                            'last_name' => $user['last_name'],
                            'email' => $user['email'],
                            'uuid' => GeneralHelper::generateUuid(),
                            'password' => Hash::make('12345678'),
                            'is_verified' => 1,
                        ]

                    );
                    $user->save();
                    if (null != $user) {
                        $user->roles()->sync($adminRole->id);
                    }
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

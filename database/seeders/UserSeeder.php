<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super_admin' => [
                [
                    'username' => 'sa',
                    'password' => 'sa_admin'
                ]
            ],
            'student' => [
                [
                    'username' => 'std_' . rand(100000, 999999),
                    'f_name' => 'محمد',
                    'l_name' => 'رضایی',
                ],
                [
                    'username' => 'std_' . rand(100000, 999999),
                    'f_name' => 'رضا',
                    'l_name' => 'پور حسین',
                ],
            ],
            'manager' => [
                [
                    'username' => 'mngr_' . rand(100000, 999999),
                    'f_name' => 'مدیر',
                    'l_name' => '',
                ]
            ],
            'teacher' => [
                [
                    'username' => 'tchr_' . rand(100000, 999999),
                    'f_name' => 'معلم/مربی',
                    'l_name' => '1',
                ],
                [
                    'username' => 'tchr_' . rand(100000, 999999),
                    'f_name' => 'معلم/مربی',
                    'l_name' => '2',
                ]
            ],
            'sponsor' => [
                [
                    'username' => 'prnt_' . rand(100000, 999999),
                    'f_name' => 'سرپرست',
                    'l_name' => '1',
                ],
                [
                    'username' => 'tchr_' . rand(100000, 999999),
                    'f_name' => 'سرپرست',
                    'l_name' => '2',
                ]
            ]
        ];
        foreach ($roles as $role => $users) {
            foreach ($users as $user) {
                $userRecord = User::create($user);
                $userRecord = User::create($user);
                $userPosition = UserPosition::create([
                    'user_id' => $userRecord->id,
                    'role' => $role,
                    'from_datetime' => now(),
                    'to_datetime' => now()->addMonths(9),
                    'status' => 'active',
                    'permissions' => ['-1']
                ]);
            }
        }
    }
}

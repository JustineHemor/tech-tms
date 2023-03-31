<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Justine Hemor',
            'email' => 'hemor.justine@teleserv.com.ph',
            'employee_code' => '22101409881',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'role' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('manager', 'creator', 'assignee');

        User::create([
            'name' => 'John Doe',
            'email' => 'doe.john@teleserv.com.ph',
            'employee_code' => '22101409882',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'role' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('creator', 'assignee');

        User::create([
            'name' => 'Foo Bar',
            'email' => 'bar.foo@teleserv.com.ph',
            'employee_code' => '22101409883',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'role' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('assignee');

        User::create([
            'name' => 'Juan Cruz',
            'email' => 'cruz.juan@teleserv.com.ph',
            'employee_code' => '22101409884',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'role' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
    }
}

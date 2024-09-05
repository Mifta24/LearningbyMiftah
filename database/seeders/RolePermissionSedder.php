<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role untuk pengguna super admin
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);
        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);
        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $userOwner = User::create([
            'name' => 'Miftahudin Aldi',
            'occupation' => 'Collegt Student',
            'avatar' => 'images/default-avatar.png',
            'email' => 'miftafree3@gmail.com',
            'password' => bcrypt('12345678'),
           
        ]);

        // memberikan user ini owner role dengan spatie
        $userOwner->assignRole($ownerRole);
    }
}

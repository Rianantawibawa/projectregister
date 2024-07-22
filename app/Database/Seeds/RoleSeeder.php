<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'sekolah', 'description' => 'User Sekolah'],
            ['name' => 'guru', 'description' => 'User Guru'],
        ];

        foreach ($roles as $role) {
            $this->db->table('auth_groups')->insert($role);
        }
    }
}

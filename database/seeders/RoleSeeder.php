<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['admin','kader','bidan'];
        foreach ($role as $item) {
            Role::create([
                'name' => $item,
                'title' => ucwords($item)
            ]);
        }
    }
}

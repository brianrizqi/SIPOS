<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

//            $this->call(RoleSeeder::class);
//            $this->call(AdminSeeder::class);
            $this->call(KsprSeed::class);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        // \App\Models\User::factory(10)->create();
    }
}

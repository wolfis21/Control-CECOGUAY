<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeleteDatabaseSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('employees')->delete();
        DB::table('offices')->delete();
        DB::table('companies')->delete();
        DB::table('customers')->delete();
        DB::table('contracts')->delete();
        DB::table('type_services')->delete();
        DB::table('beneficiaries')->delete();
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $companyId = DB::table('companies')->insertGetId([
            'rif_companies' => rand(100000,250000),
            'name' => 'Cecoguay',
            'description' => 'none',
            'num_contact' => rand(10000000,25000000),
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
        
        $officeId = DB::table('offices')->insertGetId([
            'address' => 'Sede Principal',
            'num_contact' => rand(10000000,25000000),
            'companies_id' => $companyId,
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);

        $employeeId = DB::table('employees')->insertGetId([
            'cedula' => rand(10000000,25000000),
            'name' => 'admin',
            'subname' => 'general',
            'date_n' => fake()->dateTimeBetween('-30 days', '+30 days'),
            'address' => 'Venezuela',
            'phone' => rand(10000000,25000000),
            'offices_id' => $officeId,
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email'=> 'admin@cecoguay.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin12345'), // Cifrar la contraseña usando Bcrypt
            'position' => 'administrador',
            'employees_id' => $employeeId,
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);

    }

}

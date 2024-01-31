<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DaftarBeasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DaftarBeasiswa::factory()->create( [ 
            'nama_beasiswa' => 'akademik',
        ] );
        DaftarBeasiswa::factory()->create( [ 
            'nama_beasiswa' => 'non akademik',
        ] );
        
        $this->call( [ 
            MahasiswaSeeder::class,
        ] );
    }
}

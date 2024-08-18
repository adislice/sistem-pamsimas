<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pelanggan;
use App\Models\PencatatanMeteran;
use App\Models\Petugas;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $max_pel = 100;
        for ($i = 0; $i < $max_pel; $i++) {
            Pelanggan::create([
                'nama' => fake()->name,
                'no_pelanggan' => fake()->unique()->numerify('##########'),
                'no_telepon' => fake()->unique()->numerify('08##########'),
                'rt' => fake()->randomElement([1, 2]),
                'rw' => fake()->randomElement([1,2]),
                'is_aktif' => fake()->boolean,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            
            ]);
        }

        Petugas::create([
            'nama' => "Cecilia Amanda",
            'username' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        $startDate = Carbon::create(2024, 1, 1);
        $today = Carbon::now()->subDays(1);
        $angka_meteran = 0;
        while($startDate->lessThanOrEqualTo($today)) {
            $lastDay = $startDate->copy()->endOfMonth();
            print($angka_meteran . " ");

            $id_pel = 1;

            while($id_pel <= $max_pel) {
                if ($angka_meteran == 0) {
                    $anf = 0;
                } else {
                    $anf = $angka_meteran + rand(1, 2);
                }

                PencatatanMeteran::create([
                    'pelanggan_id' => $id_pel,
                    'petugas_id' => 1,
                    'bulan' => $lastDay->month,
                    'tahun' => $lastDay->year,
                    'angka_meteran' => $anf
                ]);

                $id_pel++;
            }

            $startDate->addMonth();
            $angka_meteran = $angka_meteran + 5;
        }
    }
}

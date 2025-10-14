<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Country, Department, City};

class BaseGeoSeeder extends Seeder
{
    public function run(): void
    {
        $country = Country::create([
            'name' => 'Colombia',
            'code' => 'CO',
            'abbrev' => 'COL',
            'status' => true,
        ]);

        $department = Department::create([
            'name' => 'Nariño',
            'code' => '52',
            'abbrev' => 'NAR',
            'status' => true,
            'id_country' => $country->id,
        ]);

        City::create([
            'name' => 'Pasto',
            'code' => '52001',
            'abbrev' => 'PAS',
            'status' => true,
            'id_department' => $department->id,
        ]);
    }
}

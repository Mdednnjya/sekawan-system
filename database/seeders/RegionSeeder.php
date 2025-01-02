<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            'region_name' => 'Head Office',
            'region_location' => 'Jakarta',
            'address' => 'Jl. Jakarta No. 1',
            'region_type' => 'head_office'
        ]);

        Region::create([
            'region_name' => 'Branch Office 1',
            'region_location' => 'Surabaya',
            'address' => 'Jl. Surabaya No. 1',
            'region_type' => 'branch'
        ]);
    }
}

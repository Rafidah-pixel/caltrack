<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BmiReference;

class BmiReferenceSeeder extends Seeder
{
    public function run(): void
    {
        BmiReference::truncate();

        $csv = fopen(database_path('data/bmi_reference.csv'), 'r');

        fgetcsv($csv);

        while (($row = fgetcsv($csv)) !== false) {

            BmiReference::create([

                'gender' => trim($row[0]),
                'age_month' => (int)$row[1],
                'minus3' => (float)$row[2],
                'minus2' => (float)$row[3],
                'minus1' => (float)$row[4],
                'median' => (float)$row[5],
                'plus1' => (float)$row[6],
                'plus2' => (float)$row[7],
                'plus3' => (float)$row[8],

            ]);
        }

        fclose($csv);
    }
}
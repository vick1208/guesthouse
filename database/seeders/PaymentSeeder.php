<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=[
            'Tunai',
            'Kartu Debit',
            'Kartu Kredit',
            'Gopay',
            'Dana',
            'Ovo',
            'ShopeePay'
        ];
        $codes=[
            'T',
            'KD',
            'KK',
            'G',
            'D',
            'O',
            'SP'
        ];

        for ($i=0; $i < count($codes); $i++){
            Payment::create([
                'name' => $names[$i],
                'code' => $codes[$i],
            ]);
        }

    }
}

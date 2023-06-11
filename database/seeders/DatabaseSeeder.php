<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\StreetPart;
use App\Models\User;
use App\Models\WeekStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory([
            'name' => 'Jonathan',
            'email' => 'jonathan@blijnder.nl',
            'password' => Hash::make('secret'),
        ])->create();

//        $streetPart = StreetPart::create([
//            'order' => 0,
//            'name' => 'Israelsdreef',
//        ]);
//
//        $house = House::create([
//            'street_part_id' => $streetPart->id,
//            'number' => '207',
//        ]);
//
//        $weekStatus = WeekStatus::create([
//            'house_id' => $house->id,
//            'week' => 1,
//            'status' => 2,
//        ]);

        $this->newStreetPart(0, 'Kareldoorman Straat', [1,2,3,4,5,6,7,8,9]);
        $this->newStreetPart(1, 'Israelsdreef', [207,209,211,213,215,217,219,221,223,225,227,229,231,233]);
        $this->newStreetPart(2, 'Kareldoorman Straat', [15,16,17,18,19,20,21,22,23,24,25,26,27,28]);
        $this->newStreetPart(3, 'Klaproosstraat', [10,11,12,13,14]);
    }

    private function newStreetPart($order, $name, $numbers) {
        $streetPart = StreetPart::create([
            'order' => $order,
            'name' => $name,
        ]);

        foreach ($numbers as $number) {
            $house = House::create([
                'street_part_id' => $streetPart->id,
                'number' => $number,
            ]);

            $weekStatus = WeekStatus::create([
                'house_id' => $house->id,
                'week' => 1,
                'status' => rand(0,3),
            ]);
        }
    }
}

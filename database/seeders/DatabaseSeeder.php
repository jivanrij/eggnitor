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

        User::factory([
            'name' => 'Theije van Rij',
            'email' => 'theijevanrij@gmail.com',
            'password' => Hash::make('HarleyIsLief2010'),
        ])->create();

        $this->newStreetPart(0, 'Graaf van Egmondstraat', [
            '5'
        ]);
        $this->newStreetPart(1, 'Croonenburgh', [
            '7',
            '5',
            '1',
            '4',
            '8',
            '10',
            '12',
            '14',
            '22',
            '36',
            '18',
            '34',
            '38',
            '52',
            '42',
            '56',
            '84',
            '76',
            '74',
            '68',
            '64',
            '29',
            '35',
            '43',
            '59',
            '53',
            '51',
            '49',
            '47',
            '45',
            '86',
            '88',
            '92',
            '94',
            '98',
            '100',
            '102',
            '132',
            '104',
            '122',
            '120',
            '118',
            '114',
            '112',
            '106',
            '63',
            '73',
            '91',
            '85',
            '81',
            '132',
            '134',
            '138',
            '140',
            '146',
            '152',
            '154',
        ]);
        $this->newStreetPart(2, 'Asterstraat', [
            '80',
            '74',
            '72',
            '68',
            '64',
            '62',
            '60',
        ]);
        $this->newStreetPart(3, 'Croonenburgh', [
            '164',
            '158',
        ]);
        $this->newStreetPart(4, 'Asterstraat', [
            '56',
            '54',
            '52',
            '50',
            '48',
            '40',
            '38',
            '30',
            '28',
            '34',
            '22',
            '20',
        ]);
        $this->newStreetPart(5, 'Begoniastraat', [
            '30',
            '12',
        ]);
        $this->newStreetPart(6, 'Lisstraat', [
            '14',
            '8',
            '4',
            '2',
        ]);
        $this->newStreetPart(5, 'Ribesstraat', [
            '10',
            '2',
            '8',
        ]);
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
                'status' => 0,
            ]);
        }
    }
}

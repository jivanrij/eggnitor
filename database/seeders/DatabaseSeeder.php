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
            '1',
            '5',
            '7',
            '4',
            '10',
            '12',
            '14',
            '22',
            '20',
            '34',
            '38',
            '52',
            '42',
            '84',
            '76',
            '74',
            '68',
            '64',
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
            '60',
            '62',
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
            '24',
            '22',
            '20',
            '3',
        ]);
        $this->newStreetPart(5, 'Begoniastraat', [
            '30',
            '12',
            '9',
        ]);
        $this->newStreetPart(6, 'Lisstraat', [
            '14',
            '8',
            '4',
            '2',
        ]);
        $this->newStreetPart(7, 'Ribesstraat', [
            '10 (over paar weken)',
            '2',
            '8',
        ]);
        $this->newStreetPart(8, 'Graaf van Egmondstraat', [
            '68',
            '66',
            '64',
            '60',
            '58',
            '56',
            '52',
            '50',
        ]);
        $this->newStreetPart(9, 'Begoniastraat', [
            '1',
            '3',
        ]);
        $this->newStreetPart(10, 'Margrietstraat', [
            '1',
            '5',
            '9',
        ]);
        $this->newStreetPart(11, 'Orchideestraat', [
            '3',
            '5',
            '13',
            '9',
            '11',
        ]);
        $this->newStreetPart(12, 'Esdoornstraat', [
            '1',
            '3',
            '5',
            '13',
            '22',
            '20',
            '18',
            '16',
            '14',
            '12',
            '10',
            '8',
            '2',
        ]);
        $this->newStreetPart(13, 'Jasmijnstraat', [
            '19',
            '15',
            '9',
            '5',
            '1',
        ]);
        $this->newStreetPart(14, 'Margrietstraat', [
            '21',
            '17',
        ]);
        $this->newStreetPart(15, 'Orchideestraat', [
            '2',
            '4',
            '10',
            '12',
            '14',
            '16',
            '18',
            '20',
        ]);
        $this->newStreetPart(16, 'Meestoof', [
            '26',
        ]);
        $this->newStreetPart(17, 'Mama\'s werk', [
            'Christel',
        ]);
        $this->newStreetPart(18, 'M Oosteromstraat', [
            '9',
        ]);
        $this->newStreetPart(19, 'Thuis', [
            'Taxichauffeur',
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

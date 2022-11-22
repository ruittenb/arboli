<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person1 = Person::factory()->create([
            'calling_name' => 'René',
            'christian_names' => 'René Michel',
            'middle_name' => '',
            'last_name' => 'Uittenbogaard',
            'sex' => 'male',
            'gender' => 'man',
            'place_birth' => 'Nijmegen',
            'date_birth' => '1971-02-24',
            'place_baptized' => 'Wageningen',
            'date_baptized' => '1971-05-30',
            'place_death' => '',
            'date_death' => '',
            'cause_death' => '',
            'place_buried' => '',
            'date_buried' => '',
            //'father_id' => 2,
            //'mother_id' => 3,
            'photo' => '0001_Rene_Uittenbogaard.jpg',
            'remark' => '',
        ]);
        $person2 = Person::factory()->create([
            'calling_name' => 'Herman',
            'christian_names' => 'Teunis Hermanus',
            'middle_name' => '',
            'last_name' => 'Uittenbogaard',
            'sex' => 'male',
            'gender' => 'man',
            'place_birth' => 'Wageningen',
            'date_birth' => '1942-08-24',
            'place_baptized' => 'Wageningen',
            'date_baptized' => '',
            'place_death' => '',
            'date_death' => '',
            'cause_death' => '',
            'place_buried' => '',
            'date_buried' => '',
            //'father_id' => 7,
            //'mother_id' => 6,
            'photo' => '0002_Herman_Uittenbogaard.jpg',
            'remark' => '',
        ]);
        $person3 = Person::factory()->create([
            'calling_name' => 'Willy',
            'christian_names' => 'Wilmina',
            'middle_name' => 'van der',
            'last_name' => 'Weijden',
            'sex' => 'female',
            'gender' => 'woman',
            'place_birth' => 'Amsterdam',
            'date_birth' => '1942-04-17',
            'place_baptized' => 'Amsterdam',
            'date_baptized' => '1942-05-24',
            'place_death' => '',
            'date_death' => '',
            'cause_death' => '',
            'place_buried' => '',
            'date_buried' => '',
            //'father_id' => 4,
            //'mother_id' => 5,
            'photo' => '0003_Willy_van_der_Weijden.jpg',
            'remark' => '',
        ]);
        // father/mother relations
        $person1->father()->associate($person2);
        $person1->mother()->associate($person3);
        $person1->save();
    }
}

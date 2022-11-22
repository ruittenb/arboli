<?php

namespace Database\Seeders;

use App\Models\Relation;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = Relation::factory()->create([
            //'id' => 12,
            //'partner1_id' => 2,
            //'partner2_id' => 3,
            'type' => 'married',
            'married_name1' => '',
            'married_name2' => '',
            'place_start' => 'Amsterdam',
            'date_start' => '1965-07-16',
            'date_end' => '',
            'remark' => '',
        ]);
        //

        $result1 = DB::table('persons')->where('christian_names', 'Teunis Hermanus')->get();
        $person1 = Person::hydrate($result1->all())[0];
        $result2 = DB::table('persons')->where('christian_names', 'Wilmina')->get();
        $person2 = Person::hydrate($result2->all())[0];

        $relation->partner1()->associate($person1);
        $relation->partner2()->associate($person2);
        $relation->save();
    }
}

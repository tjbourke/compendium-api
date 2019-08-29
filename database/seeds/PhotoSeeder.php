<?php

use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = [
            ['id' => 1, 'name' => 'Snowy Tree Owl', 'caption' => 'A truly majestic beast', 'photo_url' => 'http://capi.test/photos/owl.jpg', 'species' => 'Bird', 'sub_species' => 'Owl', 'photographed_on' => '2017-02-02', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Canadian Puffin', 'caption' => 'Definitely a puffin, you can tell by the way it is', 'photo_url' => 'http://capi.test/photos/puffin.jpg','species' => 'Bird', 'sub_species' => 'Puffin', 'photographed_on' => '2017-02-01', 'status' => 'Active'],
            ['id' => 3, 'name' => 'River Shroom', 'caption' => 'Fungus amungus', 'photo_url' => 'http://capi.test/photos/shroom.jpg', 'species' => 'Fungus', 'sub_species' => 'Mushroom', 'photographed_on' => '2019-08-03', 'status' => 'Active'],
        ];

        foreach ($records as $record) {
            if (! Photo::find($record['id'])) {
                $record['created_at'] = Carbon::now();
                Photo::insert($record);
            }
        }
    }
}

<?php

class CategorySeeder extends Seeder {

    public function run()
    {
	Category::truncate();

	Category::create(['code' => 'CAT01', 'name' => 'First Category']);
	Category::create(['code' => 'CAT02', 'name' => 'Second Category']);
	Category::create(['code' => 'CAT03', 'name' => 'Third Category']);
	Category::create(['code' => 'CAT04', 'name' => 'Fourth Category']);
	Category::create(['code' => 'CAT05', 'name' => 'Fiftht Category']);

    }

}

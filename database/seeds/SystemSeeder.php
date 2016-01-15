<?php 

use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
	public function run()
	{
		$config = [
			[
                'pid'=>0,
                'name'=>'生活',
                'slug'=>'',
                'sort'=>0
            ],
            [
                'pid'=>0,
                'name'=>'技术',
                'slug'=>'',
                'sort'=>0
            ]
		];
		DB::table('categories')->insert($config);
	}
}
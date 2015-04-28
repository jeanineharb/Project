<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\EmailCategory;

class EmailCategorySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		$cat = new EmailCategory;
		$cat->categoryName = 'Newsletter';
		$cat->categoryDesc = 'C\'est une newsletter';
		$cat->save();
	}

}

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
	
	public function resetSeed(){
		DB::table('email_categories')->delete();
		
		// Reset auto-increment.
		$statement = "ALTER TABLE email_categories AUTO_INCREMENT = 1;";
		DB::unprepared($statement);
	}
	
	public function run()
	{
		//Model::unguard();
		
		$this->resetSeed();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Newsletter';
		$cat->categoryDesc = 'Templates fit for sending newsletters and updates.';
		$cat->save();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Advertisement';
		$cat->categoryDesc = 'Templates used for sending ads and promotions.';
		$cat->save();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Electronic Bill';
		$cat->categoryDesc = 'Templates used for sending bills by email.';
		$cat->save();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Account Statement';
		$cat->categoryDesc = 'Templates used for emailing account, credit card and bank statements.';
		$cat->save();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Personal Message';
		$cat->categoryDesc = 'Templates suitable for all kinds of messages.';
		$cat->save();
		
		$cat = new EmailCategory;
		$cat->categoryName = 'Blank Template';
		$cat->categoryDesc = 'Customizable template from the ground-up.';
		$cat->save();
	}

}

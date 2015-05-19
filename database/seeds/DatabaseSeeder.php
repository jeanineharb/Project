<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use database\seeds\EmailCategorySeeder;
use database\seeds\TemplateSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		// $this->call('EmailCategorySeeder');
		// $this->command->info('email_categories table seeded!');
        
        $this->call('TemplateSeeder');
        $this->command->info('templates table seeded!');
        
	}

}
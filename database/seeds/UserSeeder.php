<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	
	public function resetSeed(){
		DB::table('users')->delete();
		
		// Reset auto-increment.
		$statement = "ALTER TABLE users AUTO_INCREMENT = 1;";
		DB::unprepared($statement);
	}
	
	public function run()
	{
		//Model::unguard();
		
		// $this->resetSeed();
		
		// $u = new User;
		// $u->name = 'admin';
		// $u->email = 'jneen8@hotmail.com';
		// $u->password = 'admin';
		// $u->save();

	}

}
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTemplate extends Model {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['user', 'template'];
	
	// define custom primary key
	protected $primaryKey = 'user, template';

}

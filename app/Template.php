<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['templateName', 'isFavorite', 'isPredefined', 'html'];
	
	// define custom primary key
	protected $primaryKey = 'templateId';

}

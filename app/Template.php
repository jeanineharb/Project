<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['category', 'templateName', 'isFavorite', 'isPredefined', 'html', 'css'];
	
	// define custom primary key
	protected $primaryKey = 'templateId';

}

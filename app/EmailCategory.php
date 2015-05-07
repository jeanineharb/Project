<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailCategory extends Model {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['categoryName', 'categoryDesc'];
	
	// define custom primary key
	protected $primaryKey = 'categoryId';

	public function templates(){
		return $this->hasMany('App\Template', 'category', 'categoryId');
	}
	
}

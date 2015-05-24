<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTemplate extends Model {

	protected $table = 'user_templates';

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['user', 'template'];
	
	// define custom primary key
	protected $primaryKey = 'user, template';

	public function templates(){
		return $this->hasMany('App\Template', 'templateId', 'template');
	}

}

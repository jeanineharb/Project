<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class UserTemplate extends Model {

	protected $table = 'user_templates';

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['user', 'template'];
	
	// define custom primary key
	protected $primaryKey = 'user, template';

	public function temps(){
		return $this->belongsTo('App\Template', 'template', 'templateId');
	}

}

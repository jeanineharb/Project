<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model {

	protected $table = 'batches';

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['user', 'template', 'subject'];
	
	// define custom primary key
	protected $primaryKey = 'batchId';

	public function mails(){
		return $this->hasMany('App\MailStatus', 'batch', 'batchId');
	}

}

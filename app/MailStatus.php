<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MailStatus extends Model {

	protected $table = 'mail_status';

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = ['batch', 'recipientEmail', 'isSent'];
	
	// define custom primary key
	protected $primaryKey = 'mailId';

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'devices';

	public function owner(){
		return $this->hasOne('App\User','owner_id');
	}
}

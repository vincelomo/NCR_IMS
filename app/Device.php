<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'devices';

	protected $fillable = ['owner_id'];

	public function owner(){
		return $this->hasOne('App\User','id','owner_id');
	}

	public function type(){
		return $this->hasOne('App\DeviceType','id','type');
	}

	public function typeName(){
		return $this->hasOne('App\DeviceType','id','type')->first()->name;
	}
}

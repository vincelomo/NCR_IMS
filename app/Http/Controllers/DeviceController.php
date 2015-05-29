<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Device;
use App\DeviceType;

class DeviceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/*
	public function getIndex()
	{
		//
		return Device::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getSearch(Request $request)
	{
		//
		$devices = Device::query();

		if( $request->query('owner') )
			$devices->where('owner_id',$request->query('owner'));
		if( $request->query('type') )
			$devices->whereType($request->query('type'));
		if( $request->query('borrowed'))
			$devices->where('is_borrowed',$request->query('borrowed'));
		if( $request->query('code'))
			$devices->where('code','like',$request->query('code').'%');

		$devices = $devices->paginate(2);

		$devices->appends($request->query());

		return view('dashboard',compact('devices'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		//
		$device = Device::find($id);
		return view('device.show')->with('device',$device);
	}

	public function getNew(){
		return view('device.new')->with('types',DeviceType::all());
	}
}

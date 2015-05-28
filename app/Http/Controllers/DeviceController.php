<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Device;

class DeviceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		$q = Device::query();

		if( $request->query('owner') )
			$q->where('owner_id',$request->query('owner'));
		if( $request->query('type') )
			$q->whereType($request->query('type'));
		if( $request->query('borrowed') == 0 )
			$q->where('is_borrowed',false);
		if( $request->query('code'))
			$q->where('code','like',$request->query('code').'%');

		return $q->get();
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

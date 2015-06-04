<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
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

		$ownerList = User::query();
		if(Auth::check())
			$ownerList->where('id','!=',Auth::id());
		$ownerList = $ownerList->orderBy('name')->get();

		$types = DeviceType::orderBy('name')->get();

		$urlparams = array_except($request->query(),'page');

		return view('dashboard')->with([
			'devices'	=>$devices, 
			'ownerList' => $ownerList,
			'types' 	=> $types,
			'urlparams' => $urlparams
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		$device = Device::find($id);
		if( $device == null )
			abort(404);
		return view('device.show')->with('device',$device);
	}

	public function getNew(){
		return view('device.new')->with('types',DeviceType::all()->sortBy('name'));
	}

	public function postNew(Request $request)
	{
		$this->validate($request,
			[
				'device-code' 	=> 'required|unique:devices,code',
				'description' 	=> 'required',
				'type' 			=> 'required',
				'specify' 		=> 'required_if:type,other'
			]
		);

		$device = new Device;
		$device->owner_id = Auth::user()->id;
		$device->borrower_id = NULL;
		$device->is_borrowed = false;
		if( is_numeric($request->input('type')) ){
			$device->type = $request->input('type');
		} else if( ($request->input('type') == 'other' && $request->has('specify')) || is_string($request->input('type')) ){
			$theType = ( $request->has('specify') ) ? $request->input('specify') : $request->input('type');
			$existing = DeviceType::where('name',$theType)->first();
			if($existing == null){
				$newType = new DeviceType;
				$newType->name = $theType;
				$newType->save();
				$device->type = $newType->id;
			} else {
				$device->type = $existing->id;
			}
		}
		$device->code = $request->input('device-code');
		$device->description = $request->input('description');
		$device->save();

		return redirect('/device/show/'.$device->id);
	}

	public function getEdit($id)
	{
		$device = Device::find($id);
		if( $device == null )
			abort(404);
		return view('device.edit')->with(['device'=>$device, 'types'=> DeviceType::all()->sortBy('name')]);
	}

	public function postEdit(Request $request,$id)
	{
		$this->validate($request,
			[
				'device-code' 	=> 'required|unique:devices,code,'.$id,
				'description' 	=> 'required',
				'type' 			=> 'required',
				'specify' 		=> 'required_if:type,other'
			]
		);
		$device = Device::find($id);
		if( $device == null)
			abort(404);

		$device->code = $request->input('device-code');
		$device->description = $request->input('description');
		if( is_numeric($request->input('type')) ){
			$device->type = $request->input('type');
		} else if ($request->input('type') == 'other' && $request->has('specify')) {
			$theType = $request->input('specify');
			$existing = DeviceType::where('name','=',$theType)->first();
			if($existing == null){
				$newType = new DeviceType;
				$newType->name = $theType;
				$newType->save();
				$device->type = $newType->id;
			} else {
				$device->type = $existing->id;
			}
		}
		$device->save();

		return redirect('/device/show/'.$id);
	}
}

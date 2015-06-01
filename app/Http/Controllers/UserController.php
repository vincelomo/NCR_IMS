<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use Hash;

class UserController extends Controller {
	public function getEdit($id) {
		$user = User::find($id);
		if($user == null)
			abort(404);
		return view('user.edit',compact('user'));
	}

	public function postEdit(Request $request, $id) {
		$this->validate($request,
			[
				'email' => 'unique:users,email,'.$id,
				'password' => 'same:password_confirmation'
			]
		);

		$user = User::find($id);
		if($user == null)
			abort(404);

		if( $request->has('name') )
			$user->name = $request->input('name');
		if( $request->has('email') )
			$user->email = $request->input('email');
		if( $request->has('password') )
			$user->password = bcrypt($request->input('password'));
		$user->save();

		return redirect('/device/search');
	}
}
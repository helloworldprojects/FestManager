<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
				'name' => 'required|max:255',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:5',
				'phone' => 'required|max:10',
				'college' => 'required'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
			return User::create([
					'name' => $data['name'],
					'email' => $data['email'],
					'password' => bcrypt($data['password']),
					'phone' => $data['phone'],
					'college' => $data['college'],
					'type'=>User::USER_REGULAR
			]);
	}

	public function redirectUrl($user){

		if($user->type==User::USER_ADMIN){
			return '/admin/dashboard';
		}else if($user->type==User::USER_DEPARTMENT){
			return '/department/dashboard';
		}else if($user->type==User::USER_REGULAR){
			return '/dashboard';
		}else{
			//user shouldn't have this type in the first place.!!!
			return '/notfound';
		}
	}
	/*public function isAdmin($user){
		if($user->email=="admin@festmanager.org"){
			return true;
		}
		return false;
	}*/
}

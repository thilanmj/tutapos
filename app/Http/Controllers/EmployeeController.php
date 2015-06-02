<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EmployeeStoreRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$employees = User::all();
			return view('employee.index')->with('employee', $employees);
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check())
		{
			return view('employee.create');
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EmployeeStoreRequest $request)
	{
		if (Auth::check())
		{
			
	            // store
	            $users = new User;
	            $users->name = Input::get('name');
	            $users->email = Input::get('email');
	            $users->password = Hash::make(Input::get('password'));
	            $users->save();
	            
	            Session::flash('message', 'You have successfully added employee');
	            return Redirect::to('employees');
	        
	    }
    	else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

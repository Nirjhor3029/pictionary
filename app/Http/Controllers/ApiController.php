<?php

namespace App\Http\Controllers;

use App\AppUser;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{


    public function signUp(Request $request){

        $userId = null;
        $isValid = null;
        $reasonForNotValid = null;

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:app_users',
            'name' => 'required|string|max:50',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            //return redirect()->back()->withInput();

            $isValid = false;
            $reasonForNotValid = $validator->messages()->first();

        }else{

            $appUser = new AppUser();

            $appUser->name = $request->name;
            $appUser->email = $request->email;
            $appUser->password = Hash::make($request->password);
            $appUser->image = $request->image;
            $appUser->country = $request->country;
            $appUser->gender = $request->gender;

            /*Convert string to date*/
            $date_variable = Carbon::createFromFormat('d-m-Y', $request->birthDate)->format('Y-m-d');
            $appUser->date_of_birth = $date_variable;

            /*Convert string to date*/
            $date_variable = Carbon::createFromFormat('d-m-Y', $request->signedDate)->format('Y-m-d');
            $appUser->signup_date = $date_variable;

            $appUser->is_subscribed = $request->IsSubscribed;
            $appUser->access_token = $request->accessToken;
            $appUser->save();

            $userId = $appUser->id;
            $isValid = true;
            //return $request;

        }

        return $msg = [
            'userId' => $userId,
            'isValid' => $isValid,
            'reasonForNotValid' => $reasonForNotValid,
        ];




    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

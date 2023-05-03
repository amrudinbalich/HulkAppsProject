<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// INCLUDE User Model

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

        // create new user 

        public static function createUser(Request $request) {
            // create validator for inputs
            // unique is used in order to stop making duplicate users
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:25|unique:users,username',
                'email' => 'required|email|unique:users,email|max:25',
                'password' => 'required|min:5',
            ]);
            // place to throw an error from validator
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            
            // validation process passed - now store request values inside variables
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            // using try catch for error handling
    
            try {
            // make new user 
            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make($password); // hashing password for security reasons
            $user->save();
            // if everything goes well return success response text
            return response()->json([
                'message' => "Success ! New user is created"
            ],200);
            } catch (QueryException $e) {
                // return an err message
                return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $e->getMessage()
                ],500); // 500 is my custom error
            }
    
    
        }

        // show all users from data set
        // func uses Eloquent ORM and gets all users from a table
        // simple function designed for slug api/users/getAll - path that is designed to get all users form a table

        public static function getAllUsers() {
            $getAll = User::all();
            return response()->json($getAll);
        }

        // get specific user
        // name variable is used to catch the value from the url input right after http://localhost:8000/api/user/getUser/

        public static function getUser($name) {
            // if name param is empty script is gonna throw an error
            if(empty($name)) {
                return response()->json(['error' => 'You need to specify the user that you are trying to get']);
            }     
            // check for user
            $user = DB::table('users')->where('username', '=', $name)->get();
            // if no user is found throw an error
            if($user->isEmpty()) {
                return response()->json([
                    'err' => 'That user does not exist in our db'
                ],302); // 302 is custom error
            }
            // else return user
            return response()->json($user);
        }


         // ---- UPDATE USER ---- //

        /*-----------------------------  Explanation -----------------------------------------------*/
        // ---- Sometimes user only wants to update ceartin parts of his profile . Not the whole profile.
        // ---- So for that approach I decided to use PATCH HTTP Request
        // ---- Inside function via request->all() method I am fetching all the inputs that user had sent me
        // ---- But . Considering that you will test my app in postman I decided to add some nice feature :)
        // ---- Down below I am gonna "filter" the inputs . So if you decide do send some blank(null) information in the 
        // ---- Postman's body request only inputs that are filled are gonna stay in the array . 
        // ---- Those with type null will be rejected
        // ---- If you have time try that feature :) 
        /*-----------------------------  Explanation -----------------------------------------------*/

        public static function updateUser (Request $request,$name) {
            $inputs = array_filter($request->all(), function ($value) {
                return !is_null($value);
            });
            // find the specified user 
            $user = User::where('username', '=', $name)->first();
            if(empty($user)) {
                return response()->json(['error' => 'User not found!'],422);
            }
            // Before input check did user wanted to change it's password . If he wants . Then crypt it.
            if (isset($inputs['password'])) {
                $inputs['password'] = bcrypt($inputs['password']);
            }
            // if user wants to update username check is username already taken 
            // in case it is , then provide user with the error code and 422 error status code
            if (isset($input['username'])) {
                $try = User::where('username',$input['username'])->first();
                if(!empty($try)) {
                    return response()->json(['error' => "That username is already taken !"],422);
                }
            }
            // if user is found update it with input credentials
            $user->update($inputs);
            return response()->json(['success' => 'User has been successfully updated!'],200);
        }

        
        // DELETE USER

        public static function deleteUser($name) {
            $user = User::where('username' , '=',$name)->delete();
            return response()->json(['success' => 'User successfully deleted.'],200);
        }


    

}
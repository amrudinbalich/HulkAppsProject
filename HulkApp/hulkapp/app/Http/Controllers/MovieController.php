<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // get all movies
    public function getAllMovies() {
        $movies = Movies::all();
        return response()->json($movies);
    }

    // make movie 

    public function registerMovie(Request $request) {
        // declaring validator 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:movies',
            'genre' => 'required|string',
            'created_in' => 'required|string',
        ]);
        // handling the validator error to the output 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        // assigning request inputs to the local variables for the ease of use
        $inputs = $request->all();
        // inserting values in table using Eloquent Model
        $insert = Movies::create($inputs);
        return response()->json([
            'success' => "Movie " . $inputs['name'] .  " is inserted in our base"
        ],200);
    }

    // get all movies

    public function getAll() {
        return response()->json(
                 Movies::all()
        );
    }

    // get specific movie

    public function getMovie($id) {
        $movie = Movies::where("id","=",$id)->first();
        return response()->json(
            [
                "movie" => $movie
            ]
            );
    }


    // follow a movie 
    
    public function followMovie(Request $request,$id) {
        // require username for further action
        $required = Validator::make($request->all(),[
            'username' => 'required',
        ]);
        if ($required->fails()) {
            return response()->json($required->errors(), 422);
        }
        // increment follow rate by one
        $follow = Movies::where('id', $id)->update(['followers' => DB::raw('followers + 1')]);
        // increment users following rate who is followed a movie
        $user = User::where('username','=',$request->input('username'))->update(['followed_movies' => DB::raw('followed_movies + 1')]);
        // throw an error if movie is not found
        if(!$follow) {
            return response()->json(
                [
                    'error' => "Movie is not found"
                ],422 // authorized / not found
            );
        }
        return response()->json([
            'success' => "You had succefully followed a movie"
        ],200); // success code
    }

    // modify existing movie

    public function updateMovie(Request $request,$id) {
        // collect updates
        // remove nulls from updates
        $updates = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });
        $update = Movies::where('id',"=",$id)->update($updates);
        return response()->json([
            'success' => 'Movie Updated!'
        ],200);
    
    }

    // DELETE MOVIE

    public static function deleteMovie($id) {
        $movie = Movies::where('id' , $id)->delete();
        return response()->json(['success' => 'Movie successfully deleted.'],200);
    }

}   

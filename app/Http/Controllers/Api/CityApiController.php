<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CityApiController extends Controller
{
    public function index(){
        //list cities with
    }

    public function store(Request $request){
        //Add a New City
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:cities',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);


            if ($validator->fails()) {
                return return_types('unfulfilled requirements', 422, $validator->errors());
            }

            return return_types('created', 201);

        } catch (Throwable $e) {

            return clean_throwable($e);
        }
    }
}

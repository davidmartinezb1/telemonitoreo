<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\Ph;
use App\Models\Salinity;
use App\Models\Temperature;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Input;



class MeasurementController extends Controller
{
    public function register(Request $request){


        $response = array();
        $ph = Ph::insertPh($request);
        $salinity = Salinity::insertSalinity($request);
        $temperature = Temperature::insertTemperature($request);
		
        if ($ph && $salinity && $temperature) {
            array_push($response,$ph);
            array_push($response,$salinity);
            array_push($response,$temperature);
            return response()->json($response,200);
        }else {
            print_r($ph);
        }
	}
}
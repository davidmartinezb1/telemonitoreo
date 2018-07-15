<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

class Temperature extends Model
{
    protected $table 		= 'temperatures';
    protected $primaryKey 	= 'id';
    public $timestamps = false;

    public static function insertTemperature($measurement){
        try {
            $rs = new self;
            $rs->measurement = $measurement['temperature'];
            $rs->station_id = $measurement['station'];
            if($rs->save) {
                DB::commit();
                return $rs;
            }
        }catch(Exception $e){
            DB::rollBack();
        }
        return null;
    }
}

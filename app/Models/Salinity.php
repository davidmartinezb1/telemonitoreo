<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

class Salinity extends Model
{
    protected $table 		= 'salinities';
    protected $primaryKey 	= 'id';
    public $timestamps = false;

    public static function insertSalinity($measurement){
        try {
            $rs = new self;
            $rs->measurement = $measurement['salinity'];
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

class Ph extends Model
{
    protected $table 		= 'phs';
    protected $primaryKey 	= 'id';
    public $timestamps = false;

    public static function insertPh($measurement){
        
        try {
            $rs = new self;
            $rs->measurement = $measurement['ph'];
            $rs->station_id = $measurement['station'];
            if($rs->save) {
                DB::commit();
                return $rs;
            }else {
                print "eroor";
            }
        }catch(Exception $e){
            print "error php";
            DB::rollBack();
        }
        return null;
    }
}

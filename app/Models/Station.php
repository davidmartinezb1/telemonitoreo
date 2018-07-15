<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

class Station extends Model
{
    protected $table 		= 'stations';
    protected $primaryKey 	= 'id';
    public $timestamps = false;
}

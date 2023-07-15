<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table      ='countries';
    protected $primaaryKey = 'id' ;
    protected $fillable    = [ 'name' , 'iso' , 'img_url' , 'user_id' , 'created_at',  'updated_at'];
    public    $timestamps  = true ;
}

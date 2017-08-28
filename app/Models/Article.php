<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['name','abstract','category','content','logo','option','create_time','author'];   //允许批量赋值的字段
    protected $guarded=[];
}

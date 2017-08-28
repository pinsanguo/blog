<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table='nav';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['name','parent_id','create_time','sort'];
    protected $guarded=[];

    public function tree(){
        $data = $this->orderBy('sort','asc')->get();
        return $this->getTree($data);
    }

    public function getTree($data, $parent_id=0, $level=0)
    {
        static $_ret = array();
        foreach ($data as $k => $v)
        {
            if($v['parent_id'] == $parent_id)
            {
                $v['level'] = $level;  // 用来标记这个分类是第几级的
                $_ret[] = $v;
                // 找子分类
                $this->getTree($data, $v['id'], $level+1);
            }
        }
        return $_ret;
    }
}

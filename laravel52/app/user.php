<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午11:49
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    //客户表模型
    protected $table='user';
    protected $primaryKey='id';
    public $timestamps = true;
    public function getDateFormat(){
        return time();
    }
}

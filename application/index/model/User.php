<?php
namespace app\index\model;

use think\Model;

class User extends Model
{
    // 开启自动写入时间戳
    
    // 定义自动完成的属性
    protected $insert = ['status' => 1];

    // 定义关联方法
    public function profile()
    {
        // 用户HAS ONE档案关联
        return $this->hasOne('Profile');
    }
}
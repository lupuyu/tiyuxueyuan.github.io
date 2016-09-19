<?php
namespace app\index\model;

use think\Model;

class StuEx extends Model
{
    // 设置数据表（不含前缀）
    protected $name = 'student_extend';

    // 定义类型转换
    protected $type = [
        'birth'    => 'timestamp:Y/m/d',
        'update_time'    => 'timestamp:Y/m/d',

    ];

    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    // email查询
    protected function scopeEmail($query)
    {
        $query->where('email', 'thinkphp@qq.com');
    }
}
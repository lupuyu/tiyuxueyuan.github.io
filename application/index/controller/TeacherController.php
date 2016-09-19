<?php
namespace app\index\controller;

use app\index\model\Teacher;

class TeacherController
{
    // 获取教师数据列表
    public function index()
    {
        $list = Teacher::all();
        foreach ($list as $Teacher) {
            echo $Teacher->name . '<br/>';
            echo $Teacher->email . '<br/>';
            echo '----------------------------------<br/>';
        }
    }
    // 新增教师数据
    public function add()
    {
    $Teacher = new Teacher;
    if ($Teacher->allowField(true)->validate(true)->save(input('post.'))) {
        return '教师[ ' . $Teacher->name . ':' . $Teacher->id . ' ]新增成功';
    } else {
        return $Teacher->getError();
    }
    }
    // 读取教师数据
    public function read($id='')
    {
        $teacher = teacher::get($id);
        echo $teacher->name . '<br/>';
        echo $teacher->email . '<br/>';
    }
    // 更新教师数据
    
    public function update($id)
    {
        $teacher           = teacher::get($id);
        $teacher->name = '刘晨';
        $teacher->email    = 'liu21st@gmail.com';
        if (false !== $teacher->save()) {
            return '更新教师成功';
        } else {
            return $teacher->getError();
        }
    }

    // 删除教师数据
    public function delete($id)
    {
        $teacher = teacher::get($id);
        if ($teacher) {
            $teacher->delete();
            return '删除教师成功';
        } else {
            return '删除的教师不存在';
        }
    }

    // 创建用户数据页面
    public function create()
    {
        return view();
    }
}
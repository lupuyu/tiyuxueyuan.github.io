<?php
namespace app\index\controller;
use app\index\model\Kechengbiao;
use think\Controller;
/**
 * 课程管理
 */
class KechengbiaoController 
{
    public function index()
    {
        // 这里自行添加代码，进行练习。
    }

    // 创建用户数据页面
    public function edit()
    {
        return view();
    }

    public function add()
    {
        $kechengbiao = new Kechengbiao;
        if ($kechengbiao->allowField(true)->save(input('post.'))) {
            return '课程表新增成功';
        } else {
            return $kechengbiao->getError();
        }
    }

    public function save()
    {
        $Course = new Course();
        $Course->name = input('post.name');
        if (false === $Course->save())
        {
            return $this->error('保存错误：' . $Course->getError());
        } else {
            return $this->success('操作成功', url('index'));
        }
    }
}
<?php
namespace app\index\controller;
use app\index\model\Kechengbiao;
use app\index\model\Kclass;

use think\Controller;
/**
 * 课程管理
 */
class KechengbiaoController extends Controller
{
    public function index()
    {
        $list = kechengbiao::all();
        $this->assign('list', $list);
        return $this->fetch();
    }

    // 创建用户数据页面
    public function edit()
    {
        $id = input('get.id/d');

        // 判断是否存在当前记录
        if (false === $kechengbiao = kechengbiao::get($id))
        {
            return $this->error('未找到ID为' . $id . '的记录');
        }

        // 取出班级列表
        $klasses = Kclass::all();
        $this->assign('klasses', $klasses);

        $this->assign('kechengbiao', $kechengbiao);
        return $this->fetch();
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
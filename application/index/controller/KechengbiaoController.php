<?php
namespace app\index\controller;
use app\index\model\Kechengbiao;

use think\Controller;
/**
 * 课程管理
 */
class KechengbiaoController extends Controller
{
    public function index()
    {
        $kechengbiao = Kechengbiao::paginate();
        $this->assign('kechengbiao', $kechengbiao);
        return $this->fetch();
    }

    // 创建用户数据页面
    public function edit($id)
    {

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

        public function update($id)
    {

        // 获取传入的班级信息
        $kechengbiao = kechengbiao::get($id);
        if (false === $kechengbiao)
        {
            return $this->error('系统未找到ID为' . $id . '的记录');
        }

        // 数据更新
        $kechengbiao->kclass_id = input('post.kclass_id');
        $kechengbiao->course_id = input('post.course_id');
        $kechengbiao->student_id = input('post.student_id');
        $kechengbiao->teacher_id = input('post.teacher_id');
        $kechengbiao->class = input('post.class');
        $kechengbiao->start_time = input('post.start_time');
        $kechengbiao->end_time = input('post.end_time');

        if (false === $kechengbiao->validate(true)->save())
        {
            return $this->error('更新错误：' . $kechengbiao->getError());
        } else {
            return $this->success('操作成功', url('index'));
        }
    }
}
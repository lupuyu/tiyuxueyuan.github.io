<?php
namespace app\index\controller;

use app\index\model\Kclass;

use think\Controller;

class KclassController extends Controller
{
    public function index()
    {
        $klasses = Kclass::paginate();
        $this->assign('klasses', $klasses);
        return $this->fetch();
    }
}
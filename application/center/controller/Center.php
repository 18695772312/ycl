<?php
namespace app\center\controller;
use think\Controller;
class Center extends Controller
{
    public function index()
    {
        return $this->fetch('center');
    }
}
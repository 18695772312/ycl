<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
  public function index()
  {
    $keyword = input('get.keyword', '');
    $lastTime = input('get.lastTime', '');
    $startTime = input('get.startTime', '');
    if($keyword){
      $res =db('user')->where('username', 'like', "%{$keyword}%")->paginate(4);
    } else if($lastTime && $lastTime){
      $res =db('user') -> where('create_time','between time',["{$startTime}","{$lastTime}"])->paginate(4);
    }else{
      $res = db('user')->paginate(4);
    }
    return $this->fetch('index', ["list" => $res]);
  }
  public function add()
  {
    $data = [
      'account' => $_POST['acc'],
      'username' => $_POST['username'],
      'pwd' => $_POST['pwd']
    ];
    $res = db('user')->insert($data);
    if ($res) {
      echo json_encode(['msg' => '添加成功', 'status' => 1]);
    } else {
      echo json_encode(['msg' => '添加失败', 'status' => 0]);
    }
  }
  public function edit()
  {
    $data = [
      'account' => $_POST['acc'],
      'username' => $_POST['username'],
      'pwd' => $_POST['pwd']
    ];
    $res = db('user')->where('id', $_POST['id'])->update($data);
    if ($res) {
      echo json_encode(['msg' => '修改成功', 'status' => 1]);
    } else {
      echo json_encode(['msg' => '修改失败', 'status' => 0]);
    }
  }
  public function del()
  {
    $res = db('user')->where('id', $_POST['id'])->delete();
    if ($res) {
      echo json_encode(['msg' => '删除成功', 'status' => 1]);
    } else {
      echo json_encode(['msg' => '删除失败', 'status' => 0]);
    }
  }
  public function search()
  {
    $keyword = input('post.keyword', '');
    $res =db('user')->where('username', 'like', "%{$keyword}%")->paginate(4);
    if ($res) {
      echo json_encode(['data'=> $res,'status' => 1]);
    } else {
      echo json_encode(['data'=> [],'msg' => '没有查到相关数据', 'status' => 0]);
    }
  }
}

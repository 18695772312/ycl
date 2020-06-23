<?php
namespace app\login\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller
{
    public function index()
    {
      return $this->fetch('login');
    }
    public function login(){
      $acc = input('post.acc','');
      $psw = input('post.psw','');
      $code = input('post.code','');
      $errorCode = config('ErrorCode');
      $returnJson = [
        'error_code' => 10001,
        'msg' => $errorCode[10001],
        'status' => 0
      ];
      if(!captcha_check($code)){
        echo json_encode($returnJson);
      }else{
        $where = [
          'account' => $acc,
          'psw' => $psw
        ];
        $res = db('user')->where($where)->find();
        if($res){
          Session::set('user',$res);
          $returnJson = [
            'error_code' => 10000,
            'msg' => $errorCode[10000],
            'status' => 1
          ];
          echo json_encode($returnJson);
        }else{
          $returnJson = [
            'error_code' => 10002,
            'msg' => $errorCode[10002],
            'status' => 0
          ];
          echo json_encode($returnJson);
        }
      }
    }
}

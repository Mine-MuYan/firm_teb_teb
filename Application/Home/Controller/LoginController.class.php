<?php
/**
 * 我的任务模块
 * 1.分享店铺 2.分享会员 3.任务完成奖励列表
 * Created by PhpStorm.
 * User: zhouhua
 * Date: 2016/12/20
 * Time: 16:01
 */
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
    
    protected function agentMsg($message, $jumpUrl = '', $time = 3000){
        $str = '<script>';
        $str .= 'parent.boxMsg("' . $message . '","' . $jumpUrl . '","' . $time . '");';
        $str .= '</script>';
        die($str);
    }

    public function login()
    {
        $this->display();
    }
    /*登录信息验证*/
    public function index(){
        if(IS_POST){
            session_start();
            $userName = $_POST['username'];//登录用户名
            $password = md5($_POST['password']);//登录密码
            $user = D('User');
            //获取用户信息
            if (empty($userName)){
                $this->agentMsg("请输入用户名！");
            }else{
                if (empty($password)){
                    $this->agentMsg("请输入密码！");
                }else{
                    $userMassage = $user->loginMessage($userName);
                    if (empty($userMassage)){
                        $this->agentMsg("用户名不存在！");
                    }else{
                        if ($password == $userMassage['pwd']){
                            session('uid',$userMassage['id']);
                            $this->agentMsg("登录成功",U("home/index/index"),1000);
                        }else{
                            $this->agentMsg("用户名或密码错误！");
                        }
                    }
                }
            }
            
//            $code = $_POST['passcode'];//登录验证码
//            $Verify = new \Think\Verify();
//            if ($Verify->check($code)){
//                if($user->checkLogin($name,$user_name)){
//                    $user_message=$user->getMessage(array('user_name'=>$name));
//                    if ($upwd == $user_message['pwd']){
//                        $time['last_login_time'] = time();
//                        $user->updateMessage($time,array('user_name'=>$name));
//                        session('uid',$user_message['id']);//用户id
//                        session('rank_id',$user_message['rank_id']);
//                        session('login_type','user');
//                        session('login_key',true);//登录成功标志
////                        $this->redirect('home/Index/index');
//                        //判断是否将个人信息完善
//                        if(empty($user_message['real_name']) || empty($user_message['cardid']) || empty($user_message['contact_name']) || empty($user_message['contact_mobile'])){
//                                $this->error('请完善个人信息，否则系统无法正常使用！',U('home/index/edit'));
//                            }else {
//                                $this->redirect('home/Index/index');
//                            }
//                    }else{
//                        $this->error('用户名或密码错误');
//                    }
//                }else{
//                    $this->error('请输入正确的用户名或密码');
//                }
//            }else{
//                $this->error('验证码输入错误');
//            }
        }
        $this->display("login");
    }

    /*登出管理*/
    public function login_out(){

            session_start();
            session('uid',null);
            $this->redirect("home/login/login");
        }
}
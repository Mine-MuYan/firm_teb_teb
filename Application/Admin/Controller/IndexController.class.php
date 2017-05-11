<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/11 0011
 * Time: 14:45
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
 class IndexController extends Controller{
     public function index(){
         session_start();
//         $admin = D("daili_admin")->where('admin_id=' . session('admin_id'))->find();
//         $role_maps = D('daili_role_maps')->where("role_id=" . $admin['role_id'])->select();
//         $menu_id = array();
//         foreach ($role_maps as $map) {
//             $menu_id[] = $map['menu_id'];
//         }
//         $where['menu_id'] = array('in', $menu_id);
         $menu = D("daili_admin_nav")->where(array('is_show' => 1))->select();
         $this->assign('menuList', $menu);//$menu分配menuList
         $this->display();
     }
     public function main(){

         $this->display();
     }
 }

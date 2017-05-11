<?php
/**
 * 加盟商
 * Created by PhpStorm.
 * User: zhouhua
 * Date: 2017/2/24
 * Time: 19:11
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Admin\Controller\CommondController;

class JoiningController extends CommondController{

    /**加盟商管理**/
    public function details(){
        $user = D('User');
//        $id_result = D('user')->where(array('is_service'=>0))->field('id,real_name')->select();
//        foreach($id_result as $key=>$val){
//            $user->lowerIds = array();
//            $user->getAllNextIds($val['id']);
//            $ids = $user->lowerIds;
//            $achievement = $user->allAchievement($ids);
//            echo $val['real_name'];
//            print_r($ids);
//
//            if($achievement > 300000){
//                $achievement_result[$key]['real_name'] = $val['real_name'];
//                $achievement_result[$key]['achievement'] = $achievement;
//            }
//        }
//        print_r($achievement_result);exit;
        if(IS_POST){
            /*余额充值*/
            if($_POST['operate'] == 'recharge') {
                $user_message = $user->getMessage(array('id' => $_POST['id']));
                if ($user_message) {
                    $user_money = $user_message['money'] + $_POST['money'];
                    $update_money = $user->updateMessage(array('id' => $_POST['id']), array('money' => $user_money));
                    if ($update_money) {
                        D('CashFlow')->addFlow(1,$_POST['id'],6,$_POST['money'],$_POST["remarks"].'余额充值',0);
                        $data['code'] = 1;
                        $this->ajaxReturn($data, 'JSON');
                    }
                }
            }
            /*注册币充值*/
            if($_POST['operate'] == 'coin-recharge'){
                $user_message = $user->getMessage(array('id' => $_POST['id']));
                if ($user_message) {
                    $user_coin = $user_message['register_coin'] + $_POST['money'];
                    $update_money = $user->updateMessage(array('id' => $_POST['id']), array('register_coin' => $user_coin));
                    if ($update_money) {
                        D('CashFlow')->addFlow($_POST['id'],1,6,$_POST['money'],$_POST["remarks"].'注册币充值',0);
                        $data['code'] = 1;
                        $this->ajaxReturn($data, 'JSON');
                    }
                }
            }
            /*编辑原有信息查询*/
            if($_POST['type'] == 'msg'){
                $user_info = $user->getMessage(array('id' => $_POST['id']));
                $this->ajaxReturn($user_info,'JSON');
            }
            /*编辑*/
            if($_POST['operate'] == 'edit'){
                $update_map['user_name'] = $_POST['user_name'];
                if(!empty($_POST['pwd'])){
                    $update_map['pwd'] = md5($_POST['pwd']);
                }
                $update_map['real_name'] = $_POST['real_name'];
                $update_map['card_id'] = $_POST['card_id'];
                $update_map['rank_id'] = $_POST['rank'];
                $update_map['tel'] = $_POST['tel'];
                $update_map['status'] = $_POST['status'];
                $update_map['dividend'] = $_POST['dividend'];
                $update_map['province_id'] = $_POST['province'];
                $update_map['city_id'] = $_POST['city'];
                $update_map['area_id'] = $_POST['area'];
                $update_map['address'] = $_POST['address'];
                $update_map['achievement'] = $_POST['achievement'];
                $update_map['points'] = $_POST['points'];
                $update_message = $user->updateMessage(array('id'=>$_POST['id']),$update_map);
                if($update_message){
                    echo "<script>alert('数据更新成功');</script>";
                }else{
                    echo "<script>alert('数据更新失败')</script>";
                }
            }
            /*删除*/
            if($_POST['operate'] == 'del'){
                $result = $user->del(array('id'=>$_POST['id']));
                if($result){
                    echo "<script>alert('数据删除成功'})</script>";
                }
            }
            //添加
            if($_POST['operate'] == 'add'){
                $add_data['user_name'] = $_POST['user_name'];
                $add_data['pwd'] = MD5('teb123456');
                $add_data['real_name'] = $_POST['real_name'];
                $add_data['card_id'] = $_POST['card_id'];
                $add_data['rank_id'] = $_POST['rank'];
                $add_data['tel'] = $_POST['tel'];
                $add_data['status'] = $_POST['status'];
                $add_data['referee_id'] = $_POST['referee_id'];
                $add_data['service_number'] = $_POST['service_number'];
                $add_data['create_time'] = time();
                $add_data['join_fee'] = $_POST['join_fee'];
                $add_data['address'] = $_POST['address'];
                /*分红点，暂时修改请勿删除！*/
//                if($_POST['rank'] == 1){
//                    $add_data['dividend'] = 10;
//                }elseif($_POST['rank'] == 2){
//                    $add_data['dividend'] = 5;
//                }elseif($_POST['rank'] == 3){
//                    $add_data['dividend'] = 1;
//                }
                $add_data['dividend'] = $_POST['dividend'];
                $add_data['province_id'] = $_POST['province'];
                $add_data['city_id'] = $_POST['city'];
                $add_data['area_id'] = $_POST['area'];
                $add_message = $user->add($add_data);
                if($add_message){
                    echo "<script>alert('数据添加成功')</script>";
                }
            }
            if($_POST['operate'] == "test"){
                $result_rand = NoRand(0,30000,20);
                foreach($result_rand as $key=>$value){
                    $id = $key + 17;  
                    if($id <= 36){
                        $result = D('user')->where(array('id'=>$id))->setInc('income',$value);
			            if($result){
				            $data_mes[] = $id;
			            }
                    }
                }
		        if(count($data_mes) == 20){
			        $data['code'] = 1;
		        }else{
			        $data['code'] = 2;
		        }
                $this->ajaxReturn($data,"JSON");
            }
        }
        $map['id'] = array("not between","17,36");
        $p = getpage($user,$map,20);
        //首先查询出所有的加盟商
        $agent_message = $user->getInfo($map);
        //获取推荐人数
        foreach($agent_message as $value){
            $user_ids[] = $value['id'];
        }
        $num = $user->getNum($user_ids);
        if($num){
            foreach($agent_message as $key=>$val){
                $agent_message[$key]['referee_num'] = 0;
                foreach($num as $item){
                    if($item['id'] == $val['id']){
                        $agent_message[$key]['referee_num'] += 1;
                    }
                }
            }
        }else{
            foreach($agent_message as $key=>$val) {
                $agent_message[$key]['referee_num'] = 0;
            }
        }
        $address = D("Address");
        $provinces = $address->getProvince();
        $this->assign('list',$agent_message);
        $this->assign('province',$provinces);
        $this->page = $p->show();
        $this->display();
    }

    /**获取城市**/
    public function getCity()
    {
        $address = D("Address");
        $provinceId = $_POST['provinceId'];
        $city = $address->getCity($provinceId);
        $this->ajaxReturn($city);
    }

    /**获取区县**/
    public function getArea()
    {
        $address = D("Address");
        $cityId = $_POST['cityId'];
        $area = $address->getArea($cityId);
        $this->ajaxReturn($area);
    }

    /**纠纷加盟商列表**/
    public function botherList(){
        $user = D('User');
        if(IS_POST){
            //恢复状态
            $update_status = $user->updateMessage(array('id'=>$_POST['id']),array('status'=>$_POST['status']));
            if($update_status){
                $data['code'] = 1;
                $this->ajaxReturn($data,'JSON');
            }
        }
        $map['status'] = 2;
        $p = getpage($user,$map,20);
        $list = $user->getMessages($map);
        //获取推荐人数
        foreach($list as $value){
            $user_ids[] = $value['id'];
        }
        if(empty($user_ids)){
            $num = false;
        }else{
            $num = $user->getNum($user_ids);
        }
        if($num){
            foreach($list as $key=>$val){
                $list[$key]['referee_num'] = 0;
                foreach($num as $item){
                    if($item['id'] == $val['id']){
                        $list[$key]['referee_num'] += 1;
                    }
                }
            }
        }else{
            foreach($list as $key=>$val) {
                $list[$key]['referee_num'] = 0;
            }
        }
        $this->assign('list',$list);
        $this->page = $p->show();
        $this->display();
    }

    /**加盟商升级**/
//    public function upGrade(){
//        $user = D('User');
//        if(IS_POST){
//            //首先查询提交的信息是否正确
//            $refer['user_name'] = $_POST['user_name'];
//            $refer['old_class'] = $_POST['old_class'];
//            $refer['new_class'] = $_POST['new_class'];
//            $refer['money'] = $_POST['money'];
//            $check = $user->checkMessage(array('user_name'=>$_POST['user_name']));
//            if($check){
//                if($check['rank_id'] != $_POST['old_class']){
//                    echo "<script>alert('请填写正确的加盟商等级!');</script>";
//                    $this->assign('refer',$refer);
//                }else{
//                    //更新该加盟商信息
//                    $data['rank_id'] = $_POST['new_class'];
//                    $update_message = $user->updateMessage(array('user_name'=>$_POST['user_name']),$data);
//                    $user->where(array('user_name'=>$_POST['user_name']))->setInc('join_fee',$_POST['money']);
//                }
//            }else{
//                echo "<script>alert('请填写正确的加盟商信息!');</script>";
//                $this->assign('refer',$refer);
//
//            }
//        }
//        $this->display();
//    }

    /**兑换中心详情**/
    public function exchangeDetails(){
        $exchange = D('ApplyExchange');
        $userObj = D("User");
        $users = $userObj->select();
        $map['status'] = 2;
        $p = getpage($exchange,$map,20);
        $list = $exchange->getMessages($map);
        foreach ($list as $k=>$item) {
            $list[$k]['share_num'] = 0;
            foreach ($users as $user) {
                if ($item['apply_id'] == $user['id']){
                    $list[$k]['real_name'] = $user['real_name'];
                }
                if ($user['service_number'] == $item['id']){
                    $list[$k]['share_num'] += 1;
                }
            }
        }
        $this->assign('list',$list);
        $this->page = $p->show();
        $this->display();
    }

    /**兑换中心审批**/
    public function exchangeCheck(){
        $exchange = D('ApplyExchange');
        if(IS_POST){
            if($_POST['type'] == 1){
                $users = D('User');
                //首先获取所有的下级被推荐人的id(除去已申请服务中心)
                $refer[] = $_POST['user_id'];
                $users->getRecommendId($refer,array());
                $refereed_ids = $users->allRecommendId;
                //更新其他人数据，添加所属服务中心标志
                if(!empty($refereed_ids)) {
                    $condition['id'] = array('in', $refereed_ids);
                    $data = array('service_number' => $_POST['id']);
                    $update_others = $users->updateMessage($condition, $data);
                    if(!$update_others){
                        $data['code'] =3;//下级人员所属的兑换中心标识更新失败
                    }
                }
                //更新个人的信息(包括用户信息及服务中心信息)
                $update_service_message = $exchange->updateMessage(array('id'=>$_POST['id']),array('status'=>2,'auditor'=>$_SESSION['admin_id'],'handle_time'=>time()));
                $map['id'] = $_POST['user_id'];
                $update_info = array(
                    'is_service' => 1,
                    'service_number' => $_POST['id'],
                );
                $update_user_message = $users->updateMessage($map, $update_info);
                if($update_user_message && $update_service_message){
                    /*存在上下级关系的情况*/
                    //更新服务中心之间的的直属关系，首先查询出直属下级
                    $users->getUnderService($refer, array());
                    $service_ids = $users->lowerService;
                    if(!empty($service_ids)) {
                        //更新所属上级服务中心字段值
                        $conditions['id'] = array('in', $service_ids);
                        $update_data = array('superior_number' => $_POST['id']);
                        $update_other_service = $exchange->updateMessage($conditions, $update_data);
                        if ($update_other_service) {
                            $data['code'] = 1;
                        }else{
                            $data['code'] = 2;//下级兑换中心直属中心更新失败
                        }
                    }else{
                        $data['code'] = 1;
                    }
                }else{
                    $this->error('网络故障，审核更新失败，请联系技术人员',U('admin/joining/exchange'));
                }
                $this->ajaxReturn($data,'JSON');
            }
            if($_POST['submit'] == 'submit'){
                //更新状态
                $update_status = $exchange->updateMessage(array('id'=>$_POST['id']),array('status'=>3));
                if($update_status){
                    //将数据存进数据
                    $data['rec_id'] = $_POST['user_id'];
                    $data['title'] = $_POST['title'];
                    $data['content'] = $_POST['content'];
                    $data['type'] = 1;
                    $data['admin'] = $_SESSION['admin_id'];
                    $notice = M('daili_notice')->add($data);
                    if($notice){
                        $this->success("驳回邮件已发送！",U('admin/joining/exchangeCheck'));
                    }else{
                        $this->error('邮件发送失败！',U('admin/joining/exchangeCheck'));
                    }
                }else{
                    $this->display();
                    $this->error('审核失败！',U('admin/joining/exchangeCheck'));
                }
            }
        }
        $map['status'] = 1;
        $p = getpage($exchange,$map,20);
        $list = $exchange->getMessages($map);
        $this->assign('list',$list);
        $this->page = $p->show();
        $this->display();
    }

    /**查询推荐人信息**/
    public function getReferee(){
        if(IS_POST){
            $user = D('user');
            $user_message = $user->getMessage(array('tel'=>$_POST['mobile']));
            if(!empty($user_message)){
                $data['real_name'] = $user_message['real_name'];
                $data['referee_id'] = $user_message['id'];
                $data['service_number'] = $user_message['service_number'];
                $data['code'] = 1;
            }else{
                $data['code'] = 2;
            }
            $this->ajaxReturn($data,'JSON');
        }
    }

    /**业绩查询  -  用户**/
    /*
    public function forSeak(){
        $time1 = I('dt1');
        $time2 = I('dt2');
        $start = strtotime(I('dt1'));
        $end = strtotime(I('dt2'));
        if($start == null || $end == null){
            $start = '';
            $end = '';
        }else{
            $start = strtotime(I('dt1'));
            $end = strtotime(I('dt2'));
        }
        $this->assign('start',$start);
        $this->assign('end',$end);
        $db_user = M('daili_user');
        $where_user['is_service'] = 0;
        //$where_user['id'] = array('in','1,2,3,4');
        if($time1 != null || $time2 != null) {
            $where_user['create_time'] = array(array('gt', $start), array('lt', $end));
            if($start < $end){
                $count      = $db_user -> where($where_user) -> count();
                $Page       = new \Think\Page($count,20);
                foreach($_POST as $key=>$val) {
                    $Page -> parameter[$key]   =   urlencode($val);
                }
                $show      = $Page->show();
                $data_user = $db_user -> order('id') -> limit($Page->firstRow.','.$Page->listRows) -> where($where_user) -> select();
            }else{
                $this->error('起始日期 要不大于 终止日期哦。');
            }
        }else{
            $count      = $db_user -> where($where_user)  -> count();
            $Page       = new \Think\Page($count,20);
            foreach($_POST as $key=>$val) {
                $Page -> parameter[$key]   =   urlencode($val);
            }
            $show      = $Page->show();
            $data_user = $db_user -> order('id') -> limit($Page->firstRow.','.$Page->listRows) -> where($where_user) -> select();
        }
        $this->assign('_page',$show);
        $this->assign('user',$data_user);
        $this->display();
    }
    */

    public function forSeak(){
        $db_user = M('daili_user');
        $where_user['is_service'] = 0 ;
        $res_user = $db_user -> where($where_user) ->select();
        //TODO 获取用户的总join_fee字段
        foreach($res_user as $k => $v){
            $where_user1['referee_id'] = $res_user[$k]['id'];
            $res_user1 = $db_user -> where($where_user1) ->find();
            foreach($res_user1 as $kk => $vv){
                $where_user2['referee_id'] = $res_user1[$kk]['id'];
                $res_user2 = $db_user -> where($where_user2) ->find();
                foreach($res_user2 as $kkk => $vvv){
                    $where_user3['referee_id'] = $res_user2[$kkk]['id'];
                    $res_user3 = $db_user -> where($where_user3) ->find();
                    foreach($res_user3 as $kkkk => $vvvv){
                        $where_user4['referee_id'] = $res_user2[$kkkk]['id'];
                        $res_user = $db_user -> where($where_user4) ->find();
                    }
                }
            }



        }



        $this->assign('user',$res_user);
        $this->display();
    }





















    /**业绩查询  -  中心**/
    public function forSeakCenter(){
        $time1 = I('dt1');
        $time2 = I('dt2');
        $start = strtotime(I('dt1'));
        $end = strtotime(I('dt2'));
        if($start == null || $end == null){
            $start = '';
            $end = '';
        }else{
            $start = strtotime(I('dt1'));
            $end = strtotime(I('dt2'));
        }
        $this->assign('start',$start);
        $this->assign('end',$end);
        $db_user = M('daili_user');
        $db_exchange = M('daili_exchange');
        $where_user['is_service'] = 1;
        $where_user['id'] = array('gt',4);
        if($time1 != null || $time2 != null) {
            $where_user['create_time'] = array(array('gt', $start), array('lt', $end));
            if($start < $end) {
                $count = $db_user->where($where_user)->count();
                $Page = new \Think\Page($count, 15);
                foreach ($_POST as $key => $val) {
                    $Page->parameter[$key] = urlencode($val);
                }
                $show = $Page->show();
                $date_user = $db_user->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->where($where_user)->select();
                foreach ($date_user as $k => $v) {
                    $where_exchange['apply_id'] = $date_user[$k]['id'];
                    $where_exchange['status'] = 2;
                    $res_exchange = $db_exchange->where($where_exchange)->find();
                    $where_users['id'] = $date_user[$k]['referee_id'];
                    $res_user = $db_user->where($where_users)->find();
                    $date_user[$k]['username'] = $res_user['real_name'];  // 获取推荐人的用户名
                    $date_user[$k]['handle'] = $res_exchange['handle_time'];  //处理时间
                    $where_user_sum['referee_id'] = $date_user[$k]['id'];
                    $date_user_sum['join_fee'] = $db_user ->where($where_user_sum)->sum('join_fee');
                    $date_user[$k]['user_sum'] = $date_user_sum['join_fee'];
                }
            }else{
                $this->error('起始日期 要不大于 终止日期哦。');
            }
        }else {
            $count = $db_user->where($where_user)->count();
            $Page = new \Think\Page($count, 15);
            foreach ($_POST as $key => $val) {
                $Page->parameter[$key] = urlencode($val);
            }
            $show = $Page->show();
            $date_user = $db_user->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->where($where_user)->select();
            foreach ($date_user as $k => $v) {
                $where_exchange['apply_id'] = $date_user[$k]['id'];
                $where_exchange['status'] = 2;
                $res_exchange = $db_exchange->where($where_exchange)->find();
                $where_user['id'] = $date_user[$k]['referee_id'];
                $res_user = $db_user->where($where_user)->find();
                $date_user[$k]['username'] = $res_user['real_name'];  // 获取推荐人的用户名
                $date_user[$k]['handle'] = $res_exchange['handle_time'];  //处理时间
                $where_user_sum['service_number'] = $date_user[$k]['id'];
                $date_user_sum['join_fee'] = $db_user ->where($where_user_sum)->sum('join_fee');
                $date_user[$k]['user_sum'] = $date_user_sum['join_fee'];
            }
        }
        $this->assign('_page',$show);
        $this->assign('user',$date_user);
        $this->display();
    }

    /** 伞下业绩  - 详情 **/
    public function forSeakDetail(){
        $db_user = M('daili_user');
        $where_user['service_number'] = I('id');
        $count = $db_user->where($where_user)->count();
        $Page = new \Think\Page($count, 5);
        foreach ($_POST as $key => $val) {
            $Page->parameter[$key] = urlencode($val);
        }
        $show = $Page->show();
        $res_user = $db_user->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->where($where_user)->select();
        foreach ($res_user as $k => $v) {
            $where_nuser['id'] = $res_user[$k]['service_number'];
            $res_nuser = $db_user->where($where_nuser)->find();
            $res_user[$k]['username'] = $res_nuser['real_name'];
        }
        $this->assign('res_user', $res_user);
        $this->assign('_page', $show);
        $this->display();
    }




}
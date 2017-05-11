<?php
/**
 * 用户表模板
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/14
 * Time: 10:01
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    protected $pk = "id";
    protected $tableName = "daili_user";
    public $allRecommendId; //所有的推荐人ID
    public  $lowerService;
    public  $lowerIds;


    public function getUsers()
    {
        $userObj = $this ->select();
        return $userObj;
    }

    public function payDividend($dividendValue)
    {
        $userObj = $this->select();
        foreach ($userObj as $item) {
            $datas = null;
            if($item['dividend'] != 0){
                if ($this->where("id =" . $item['id'])->setInc("money",$item['dividend'] * $dividendValue)&&$this->where("id =" . $item['id'])->setInc("income",$item['dividend'] * $dividendValue)){
                    $datas['pay_id'] = 1;
                    $datas['rec_id'] = $item['id'];
                    $datas['type'] = 3;
                    $datas['money'] = $item['dividend'] * $dividendValue;
                    $datas['remarks'] = "公司项目分红";
                    $datas['create_time'] = time();
                    addFlow($datas);
                    $data = 1;
                }else{
                    $error[] = $item['tel'];
                }
            }
        }
        if (empty($error)){
            return $data;
        }else{
            return $error;
        }
    }

    public function getUserNum($rank_id)
    {
        if (empty($rank_id)){
            $userNum = $this->count();
        }else{
            $userNum = $this->where("rank_id =" . $rank_id)->count();
        }
        return $userNum;
    }
    public function getAllDividend($rank_id)
    {
        if (empty($rank_id)){
            $userObj = $this->field('Dividend')->select();
        }else{
            $userObj = $this->where("rank_id =" . $rank_id)->field('Dividend')->select();
        }
        $Dividend = 0;
        foreach ($userObj as $item) {
            $Dividend += array_sum($item);
        }
        return $Dividend;
    }
    /**
     * 获取所有的信息
     * @return bool|mixed
     */
    public function getInfo($map){
        $result = $this->where($map)->select();
        if(!empty($result)){
            foreach($result as $value) {
                $province_ids[] = $value['province_id'];
                $city_ids[] = $value['city_id'];
                $area_ids[] = $value['area_id'];
                $rank_ids[] = $value['rank_id'];
            }
            $province = getDetails($province_ids);
            $city = getDetails($city_ids);
            $area = getDetails($area_ids);
            $rank = M('daili_rank')->field('id,rank,rank_name')->select();
            foreach($result as $key=>$val){
                foreach($province as $item1){
                    if($item1['code'] == $val['province_id']){
                        $result[$key]['province'] = $item1['name'];
                    }
                }
                foreach($city as $item2){
                    if($item2['code'] == $val['city_id']){
                        $result[$key]['city'] = $item2['name'];
                    }
                }
                foreach($area as $item3){
                    if($item3['code'] == $val['area_id']){
                        $result[$key]['area'] = $item3['name'];
                    }
                }
                foreach($rank as $item4){
                    if($item4['rank'] == $val['rank_id']){
                        $result[$key]['rank'] = $item4['rank_name'];
                    }
                }
            }
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 根据条件获取相应的信息（多条数据）
     * @param $condition
     * @return bool|mixed
     */
    public function getMessages($condition){
        $result = $this->where($condition)->select();
        if(!empty($result)){
            foreach($result as $value) {
                $province_ids[] = $value['province_id'];
                $city_ids[] = $value['city_id'];
                $area_ids[] = $value['area_id'];
                $rank_ids[] = $value['rank_id'];
            }
            $province = getDetails($province_ids);
            $city = getDetails($city_ids);
            $area = getDetails($area_ids);
            $rank = M('daili_rank')->field('id,rank_name')->select();
            foreach($result as $key=>$val){
                foreach($province as $item1){
                    if($item1['code'] == $val['province_id']){
                        $result[$key]['province'] = $item1['name'];
                    }
                }
                foreach($city as $item2){
                    if($item2['code'] == $val['city_id']){
                        $result[$key]['city'] = $item2['name'];
                    }
                }
                foreach($area as $item3){
                    if($item3['code'] == $val['area_id']){
                        $result[$key]['area'] = $item3['name'];
                    }
                }
                foreach($rank as $item4){
                    if($item4['id'] == $val['rank_id']){
                        $result[$key]['rank'] = $item4['rank_name'];
                    }
                }
            }

            return $result;
        }else{
            return false;
        }
    }

    /**
     * 根据条件获取相应的信息（单条数据）
     * @param $condition
     * @return bool|mixed
     */
    public function getMessage($condition){
        $result = $this->where($condition)->find();
        $result['rank'] = D('rank')->where(array('rank'=>$result['rank_id']))->getField('rank_name');
        $result['province'] = D('address')->getNameById($result['province_id']);
        $result['city'] = D('address')->getNameById($result['city_id']);
        $result['area'] = D('address')->getNameById($result['area_id']);
        if(!empty($result)){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 获取直推人数
     * @param $ids
     * @return array|bool
     */
    public function getNum($ids){
        if (empty($ids)){
            return false;
        }else{
            $map['referee_id'] = array('in',$ids);
            $result = $this->where($map)->select();
            if(!empty($result)){
                foreach($result as $key=>$val){
                    if(in_array($val['referee_id'],$ids)){
                        $result_num[$key]['id'] = $val['referee_id'];
                    }

                }
                return $result_num;
            }else{
                return false;
            }
        }
    }

    /**
     * 更新数据
     * @param $condition
     * @param $data
     * @return bool
     */
    public function updateMessage($condition,$data){
        $result = $this->where($condition)->save($data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 检测信息
     * @param $condition
     * @return bool|mixed
     */
    public function checkMessage($condition){
        $result = $this->where($condition)->find();
        if(!empty($result)){
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 删除数据
     * @param $condition
     * @return bool
     */
    public function del($condition){
        $result = $this->where($condition)->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 收入
     * @return bool|mixed
     */
    public function revenue(){
        $result = $this->select();
        $rank_message = M('daili_rank')->field('rank,rank_name,need_money')->select();
        if(!empty($result)){
            foreach($result as $key=>$value){
                foreach($rank_message as $val){
                    if($val['rank'] == $value['rank_id']){
                        $result[$key]['money'] = $val['need_money'];
                        $result[$key]['rank_name'] = $val['rank_name'];
                    }
                }

            }
            return $result;
        }else{
            return $result = 'false';
        }
    }

    /**
     * 获取一个兑换中心下所有的加盟商ID（已成立兑换中心包括旗下的所有人排除）
     * @param $recommend_ids 推荐人ID
     * @param $result_ids 加盟商ID结果集
     */
    public function getRecommendId($recommend_ids,$result_ids){
        $map['referee_id'] = array('in',$recommend_ids);
        $result = $this->field('id,is_service')->where($map)->select();//获取相应的推荐人的信息
        if(!empty($result)){
            foreach($result as $value){
                if($value['is_service'] == 0){//未成立兑换中心
                    $referee_ids[] = $value['id'];
                }
            }
            if(!empty($referee_ids)) {
                $result_ids = array_merge($result_ids, $referee_ids);//将两个数组拼接成一个新的数组
                $this->getRecommendId($referee_ids, $result_ids);
            }else{
                $this->allRecommendId = $result_ids;
            }
        }else{
            $this->allRecommendId = $result_ids;
        }
    }

    /**
     * 获取该服务中心的直属下级服务中心
     * @param $recommend_ids 推荐人ID
     * @param array $under_service_ids
     * @return array|bool
     */
    public function getUnderService($recommend_ids,$under_service_ids=array()){
        $condition['referee_id'] = array('in',$recommend_ids);
        $result = $this->where($condition)->select();
        if(!empty($result)){
            foreach($result as $value){
                if($value['is_service'] == 1){
                    $service_ids[] = $value['service_number'];
                }
                if($value['is_service'] == 0){
                    $referee_ids[] = $value['id'];
                }
            }
            $under_service_ids = array_merge($under_service_ids,$service_ids);
            if(!empty($referee_ids)){
                $this->getUnderService($referee_ids,$under_service_ids);
            }else{
                $this->lowerService = $under_service_ids;
            }
        }else{
            $this->lowerService = $under_service_ids;
        }

    }

    /**
     * 分红点拨付信息（手动拨付）
     * @param $condition
     * @return mixed
     */
    public function getPayMessage($condition){
        $result = $this->where($condition)->field('id,rank_id,dividend')->select();
        if(!empty($result)){
            $pay_message = array();
            $pay_message['first_class'] = 0;
            $pay_message['second_class'] = 0;
            $pay_message['three_class'] = 0;
            foreach($result as $value){
                if($value['dividend'] != 0){
                    $ids[] = $value['id'];
                    $pay_message['dividend'] += $value['dividend'];
                    if($value['rank_id'] == 1){
                        $pay_message['first_class'] += 1;
                    }elseif($value['rank_id'] == 2){
                        $pay_message['second_class'] += 1;
                    }elseif($value['rank_id'] == 3){
                        $pay_message['three_class'] += 1;
                    }
                }
            }
            $pay_message['id'] = $ids;
            return $pay_message;
        }else{
            return false;
        }
    }

    /**
     * 项目分红
     * @param $condition
     * @param $value
     * @return mixed
     */
    public function updatePay($condition,$value){
        $result = $this->where($condition)->field('id,real_name,money,income,fixed_recharge,dividend')->select();
        if(!empty($result)){
            foreach($result as $val) {
                $pay_val = $value * $val['dividend'];
                $game_val = $pay_val * 5 / 100;
                $new_money = $val['money'] + $pay_val - $game_val;
                $new_income = $val['income'] + $pay_val - $game_val;
                $new_game = $val['fixed_recharge'] + $game_val;
                $data = array(
                    'pay_id' => 1,
                    'rec_id' => $val['id'],
                    'type' => 3,
                    'money' => $pay_val,
                    'remarks' => '项目补贴',
                    'create_time' => time(),
                    'fee' => 0,
                );
                $cash_flow = addFlow($data);
                if ($cash_flow) {
                    $updateMessage = $this->where(array('id' => $val['id']))->save(array('money' => $new_money, 'income' => $new_income, 'fixed_recharge' => $new_game));
                    if($updateMessage){

                    }else{
                        $error[] = $val['real_name'];
                    }
                }
            }
            if(!empty($error)){
                return $error;
            }else{
                return $re = "success";
            }
        }
    }


    /**
     * 获取总的业绩
     * @param $ids
     * @return int|number
     */
    public function allAchievement($ids){
        $achievement = 0;
        if(!empty($ids)){
            $map['referee_id'] = array('in',$ids);
            $result = $this->field('join_fee')->where($map)->select();
            if(!empty($result)){
                foreach($result as $val){
                    $join_fee[] = $val['join_fee'];
                }
                $achievement = array_sum($join_fee);
            }
        }
        return $achievement;
    }

    /**
     * 获取所有下级人员的ids
     * @param $id
     */
    public function getAllNextIds($id){
        $this->lowerIds[] = $id;
        $result_ids = $this->field('id')->where(array('referee_id'=>$id))->select();
        if(!empty($result_ids)){
            foreach($result_ids as $value){
                $this->getAllNextIds($value['id']);
            }
        }
    }

/*
    public function getAllIds($id){
        $this->lowerIds[] = $id;
        $where['referee_id'] = array('in',$id);
        $result_ids = $this->where($where)->select();
        if(!empty($result_ids)){
            foreach($result_ids as $value){
                $this->getAllIds($value['id']);
            }
        }
    }
*/

}

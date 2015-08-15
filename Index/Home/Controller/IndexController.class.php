<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    public function index(){
    	$this->display();
	}

    public function loginHandle(){
        $name = I('name');
        if($name == null){
            $this->error('请输入姓名');
        }
        if($data = M('people')->where(array('name' => $name))->find())
        {
            $user_id  = $data['id'];
            $name     = $data['name'];
            $date     = date("Y-m-d",time()); 
            $where    = array('people_id' => $user_id);
            $flag     = 0;
            if($data  = M('time')->where($where)->select()){
                for($i=0;$i<count($data);$i++){
                    if(date("Y-m-d",$data[$i]['startTime']) == $date){
                        $d = array(
                            'id'        => $data[$i]['id'],
                            'endTime'   => time()
                        );
                        M('time')->save($d);
                        $flag = 1;
                    }
                }
            }
            if($flag == 0){
                $d = array(
                    'startTime' => time(),
                    'people_id' => $user_id
                );
                M('time')->add($d);
            }
            $this->success('签到成功',U('Index/day').'?name=' . $name);
        }else{
            $this->error('没找到该用户');
        }
    }

    public function day(){
        $this->name   = $_GET['name'];
        $date         = date('Y-m-d',time());
        $people       = M('people')->select();
        for($i=0;$i<count($people);$i++){
            $where = array('people_id' => $people[$i]['id']);
            $data = M('time')->where($where)->select();
            $flag = 0;
            for($j=0;$j<count($data);$j++)
            {
                if(date("Y-m-d",$data[$j]['startTime']) == $date){
                    $people[$i]['startTime'] = date('H:i:s' ,$data[$j]['startTime']);
                    if($data[$j]['endTime'] == 0){
                        $people[$i]['endTime']   = '没签到';
                    }else{
                        $people[$i]['endTime']   = date('H:i:s' ,$data[$j]['endTime']);
                    }
                    $flag = 1;
                }
            }
            if($flag == 0){
                $people[$i]['startTime'] = '没签到';
                $people[$i]['endTime']   = '没签到';
            }
        }
        $this->people = $people;
        $this->date   = $date;
        $this->display();
    }

    public function bookHandle(){
        $menu      = I('meal');
        $user_id   = cookie('id');
        $date      = date("Y-m-d");
        if($menu == null){
            $this->error('请选择食物');
        }
        $where = array('user_id' => $user_id, 'date' => $date);
        if(M('user_menu')->where($where)->find()){
            M('user_menu')->where($where)->delete();
        }
        foreach ($menu as $value) {
            $data = array(
                'user_id' => $user_id,
                'menu_id' => $value,
                'date'    => $date
            );
            M('user_menu')->add($data);
        }
        $this->success('成功确认',U('Index/index')); 

    }

    public function check(){
        $date  = date("Y-m-d");
        $where = array('date' => $date);
        $data  = M('user_menu')->where($where)->select();
        foreach ($data as $value) {
            $meal[$value['menu_id']]++;
            $bookName[$value['user_id']]++;
        }
        $sum=0;
        $i=0;
        foreach ($meal as $key => $value) {
            $menu = M('menu')->find($key);
            //p($menu);
            $sum = ($sum + $value * $menu['price'] + $value);
            $arr[$i++] = array(
                'name'    => $menu['name'],
                'number'  => $value
            );
        }
        // 读取未订人员名单
        $user = M('user')->select();
        foreach ($user as $value) {
            $flag = 0;
            foreach ($bookName as $key => $v) {
                if($value['id'] == $key)
                {
                    $flag = 1;
                    break;
                }
            }
            if($flag == 0){
                $elseName[] = $value['name'];
            }
        }
        if(count($elseName) == 0){
            $isFlag = 0;
        }else{
            $isFlag = 1;
        }
        $name           = cookie('name');
        $this->name     = $name;
        $this->meal     = $arr;
        $this->elseName = $elseName;
        $this->isFlag   = $isFlag;
        $this->sum      = $sum;
        $this->display();
    }


}
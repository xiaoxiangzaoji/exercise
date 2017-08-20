<?php
/**
 * Created by PhpStorm.
 * User: choushan
 * Date: 17-6-23
 * Time: 下午4:06
 */
namespace Admin\Controller;
Class CustomerController extends \Admin\Controller\BaseController
{   
    public function __construct(){
        parent::__construct();
    }
    public function evaluate(){
         $this->display();
    }
    public function yanzhengma(){
        $phone = $_GET['phone'];
        if ($phone) {
            header('Content-type:text/html;charset=utf-8');
            $apiurl = 'http://apis.juhe.cn/mobile/get';
            $params = array(
              'key' => 'b4b88a8ffc09e2fd3f24251ee19fa168', //您申请的手机号码归属地查询接口的appkey
              'phone' => "$phone" //要查询的手机号码
            );
             
            $paramsString = http_build_query($params);
             
            $content = @file_get_contents($apiurl.'?'.$paramsString);
            $result = json_decode($content,true);
            if($result['error_code'] == '0'){
                // echo "省份：".$result['result']['province']."\r\n";
                // echo "城市：".$result['result']['city']."\r\n";
                // echo "区号：".$result['result']['areacode']."\r\n";
                // echo "邮编：".$result['result']['zip']."\r\n";
                // echo "运营商：".$result['result']['company']."\r\n";
                // echo "类型：".$result['result']['card']."\r\n";
                $arr = array(
                    'province' => $result['result']['province'],
                    'city'=> $result['result']['city'],
                    'area'=> $result['result']['areacode'],
                    'zipcode'=> $result['result']['zip'],
                    'company'-> $result['result']['company'],
                     );
                echo json_encode($arr);
            }else{
                echo $result['reason']."(".$result['error_code'].")";
            }
        }
    }
    public function stock(){
        // 配置 redis 缓存
        $set = array(
            'type' =>'redis' ,
            'host'=>'127.0.0.1' ,
            'port'=>6379,
        );
        // 实例化
        $redis=S($set);
        // 存储数据
        $redis->name="hello world again";
        $redis->id=1;
    }
}
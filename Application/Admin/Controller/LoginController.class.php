<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
//登录的首页
    public function index(){
        if (IS_POST) {
            $data['username'] = $_POST['userName'];
            $password = $_POST['password'];
            $result = M('Admin')->where($data)->find();
            if (trim(md5($password)) == trim($result['password'])) {
                session('name',$data['username']);
                //权限存入session
                $datas['role_id'] = $result['role_id'];
                if ($result['role_id'] == 1) {//判断是不是超级管理员
                    $list= M('permission_list')->field('permissions')->select();
                }else{
                    $list = M('permission_list')->join('LEFT JOIN __ROLE_PERMISSION__ ON __ROLE_PERMISSION__.permission = __PERMISSION_LIST__.id')->where($datas)->field('permissions')->select();                   
                }
                foreach ($list as $k => $v) {
                        $per[] = $v['permissions'];
                    }
                //var_dump($per);die();
                session('per',$per);
                session('role_id',$result['role_id']);

                $last['last_login_time'] = date('Y-m-d H:i:s',time());
                $last['last_login_ip'] = $_SERVER['REMOTE_ADDR'] = ':: 1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'];
                $nice = M('Admin')->where($data)->save($last);
                // var_dump($nice);die();
                $this->redirect('Index/index');
            }else{
                $this->error('密码或用户名错误');
            }
        }else{
            $this->display('index');
        }
    }
//退出
    public function logout(){
        session_destroy();
        unset($_SESSION);
        // unset($_SESSION['name']);
        // $this->redirect('login/index');
        echo "<script>location.href='index.php?m=Admin&c=Login&a=index';</script>";
    }
//我的信息
    public function myinfo(){
        $name['username'] = $_SESSION['name'];
        $result = M('Admin')->where($name)->find();
        // dump($result);die();
        if ($result) {
            $this->assign('result',$result);
        }
        $this->display();
    }
//修改密码
    public function alterpassword(){
        if (!session('?name')) {
            $this->redirect('/Admin/Login/Index','还没登录你干嘛');
        }
        $name['username'] = session('name');
        if (IS_POST) {
            // var_dump($_POST);die();
            $data['password'] = MD5($_POST['new_password']);
            // $data['id'] = 1;
            if (M('Admin')->where($name)->save($data)) {
                $this->success('修改成功',U('myinfo'));
            }else{
                $this->error('修改失败');
            }

        }else{
            $this->display();
        }
    }
//修改头像
    public function alterheadimg(){

        if (!session('?name')) {
            $this->redirect('/Admin/Login/Index','还没登录你干嘛');
        }
        $name = session('name');
        //var_dump($name);die();
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->autoSub =  true; //自动子目录保存文件
            $upload->subName  =  admin;
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath = '';// 设置附件上传目录
            $upload->saveName = time().'_'.mt_rand();
            $upload->replace = true; //存在同名是否覆盖
            $info   =   $upload->uploadOne($_FILES['headimg']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{ // 上传成功 获取上传文件信息
                // $this->success('上传成功！');
                $data = '/Uploads/'.$info['savepath'].$info['savename'];
                $Model = new \Think\Model();
                $result = $Model->execute("update `cs_admin` set headimg = '$data'  where username = '$name'");

                if ($result) {

                    $this->success('上传成功！',U('myinfo'));
                }
            }
        }else{
            $this->display();
        }

    }
}
 ?>
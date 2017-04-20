<?php
    namespace Home\Model;

    use Think\Model;

    class StudentModel extends Model
    {
        // 查询所有学生信息
        public function getStudentList(){

            return $this->order('`time` DESC')->select();

        }

        // 验证登录是否成功
        public function verifyLogin($phone , $password)
        {
            $where['phone'] = $phone;
            $where['password'] = md5($password);

            $stuinfo = $this->where($where)->find();

            if($stuinfo){
                $stuinfo['type'] = 'student';
                cookie('userinfo' , $stuinfo , 24*60*60*7);
                return true;
            }else{
                return false;
            }
        }

        // 入参id获取信息
        public function getStudentInfo($studentid)
        {
            $where['id'] = $studentid;

            return $this->where($where)->field('id,realname,classid,phone,time')->find();
        }

        // 学生添加
        public function addStudent()
        {
            $post = I('post.');

            // 预留标签剥离，数据校验

            $data['realname'] = $post['realname'];
            $data['classid'] = $post['classid'];
            $data['phone'] = $post['phone'];
            $data['password'] = md5($post['password']);
            $data['time'] = time();

            return $this->data($data)->add();
        }
    }
?>
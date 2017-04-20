<?php
    namespace Home\Model;

    use Think\Model;

    class GradeModel extends Model
    {
        public function getGradeList(){

            $where['seriesid'] = I("post.gid");

            return $this->where($where)->select();

        }

        // 所有年级
        public function getAllGradeList(){
            return $this->select();
        }

        // 入参id获取年级信息
        public function getGradeInfo($gradeid)
        {
            $where['id'] = $gradeid;

            return $this->where($where)->find();
        }

        // 添加年级
        public function addGradeAct()
        {
            $post = I('post.');

            $data['seriesid'] = $post['seriesid'];
            $data['gradename'] = $post['gradename'];

            return $this->data($data)->add();
        }

    }

?>
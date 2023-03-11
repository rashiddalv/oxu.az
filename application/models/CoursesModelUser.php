<?php

class CoursesModelUser extends CI_Model
{
    public function get_all_courses()
    {
        return $this->db
            ->select('c_id, c_title, c_description, c_img, c_file_ext, c_trainer, c_price, c_category, t_img, c_duration')
            ->order_by('c_id', 'DESC')
            ->join('trainers', 'trainers.t_name = courses.c_trainer')
            ->get('courses')->result_array();
    }
    public function get_3_courses()
    {
        return $this->db
            ->limit(3)
            ->select('c_id, c_title, c_description, c_img, c_file_ext, c_trainer, c_price, c_category, t_img, c_duration')
            ->order_by('c_id', 'DESC')
            ->join('trainers', 'trainers.t_name = courses.c_trainer')
            ->get('courses')->result_array();
    }
    public function get_single_trainer($id)
    {
        return $this->db
            ->where('t_id', $id)
            ->join('admin', 'admin.a_id = trainers.t_creator_id', 'left')
            ->get('trainers')->row_array();
    }
    public function get_all_categories()
    {
        return $this->db
            ->order_by('category_id', 'DESC')
            ->get('category')->result_array();
    }
    public function get_about()
    {
        return $this->db
            ->get('about')->row_array();
    }
    public function get_all_trainers()
    {
        return $this->db
            ->order_by('t_id', 'DESC')
            ->get('trainers')->result_array();
    }
    public function get_single_course($id)
    {
        return $this->db
            ->where('c_id', $id)
            ->join('admin', 'admin.a_id = courses.c_creator_id', 'left')
            ->get('courses')->row_array();
    }
}
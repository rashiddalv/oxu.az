<?php

class CoursesModel extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('courses', $data);
    }
    public function get_single_data($id)
    {
        return $this->db->where('c_id', $id)->get('courses')->row_array();
    }
    public function get_single_data_trainers($id)
    {
        return $this->db->where('t_id', $id)->get('trainers')->row_array();
    }
    public function register_insert($data)
    {
        $this->db->insert('admin', $data);
    }
    public function delete_course($id)
    {
        $this->db->where('c_id', $id)->delete('courses');
    }
    public function get_all_courses()
    {
        return $this->db
            ->order_by('c_id', 'DESC')
            ->join('admin', 'admin.a_id = courses.c_creator_id')
            ->join('trainers', 'trainers.t_name = courses.c_trainer')
            ->get('courses')->result_array();
    }
    // public function get_all_trainers()
    // {
    //     return $this->db
    //         ->order_by('t_id', 'DESC')
    //         ->join('admin', 'admin.a_id = trainers.t_creator_id')
    //         ->get('trainers')->result_array();
    // }
    public function get_single_course($id)
    {
        return $this->db
            ->where('c_id', $id)
            ->join('admin', 'admin.a_id = courses.c_creator_id', 'left')
            ->get('courses')->row_array();
    }
    public function get_single_trainer($id){
        return $this->db
        ->where('t_id', $id)
        ->join('admin', 'admin.a_id = trainers.t_creator_id', 'left')
        ->get('trainers')->row_array();
    }
    public function update_course($id, $data){
        $this->db->where('c_id', $id)
        ->update('courses', $data);
    }   
    public function update_trainer($id, $data){
        $this->db->where('t_id', $id)
        ->update('trainers', $data);
    }   
    public function insert_trainer($data)
    {
        $this->db->insert('trainers', $data);
    }
    public function get_all_trainers(){
        return $this->db
        ->order_by('t_id', 'DESC')
        ->get('trainers')->result_array();
    }
    public function get_all_categories(){
        return $this->db
        ->order_by('category_id', 'DESC')
        ->get('category')->result_array();
    }
    public function delete_trainer($id){
        $this->db->where('t_id', $id)->delete('trainers');
    }
}
<?php

class CoursesModel extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('courses', $data);
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
            ->get('courses')->result_array();
    }
    public function get_single_course($id)
    {
        return $this->db
            ->where('c_id', $id)
            ->join('admin', 'admin.a_id = courses.c_creator_id', 'left')
            ->get('courses')->row_array();
    }
    public function update_course($id, $data){
        $this->db->where('c_id', $id)
        ->update('courses', $data);
    }   
}
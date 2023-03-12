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
    public function get_single_data_about($id)
    {
        return $this->db->where('b_id', $id)->get('about')->row_array();
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
    public function get_about()
    {
        return $this->db
            ->get('about')->result_array();
    }
    public function get_single_about($id)
    {
        return $this->db
            ->where('b_id', $id)
            ->get('about')->row_array();
    }
    public function get_single_course($id)
    {
        return $this->db
            ->where('c_id', $id)
            ->join('admin', 'admin.a_id = courses.c_creator_id', 'left')
            ->get('courses')->row_array();
    }
    public function get_single_trainer($id)
    {
        return $this->db
            ->where('t_id', $id)
            ->join('admin', 'admin.a_id = trainers.t_creator_id', 'left')
            ->get('trainers')->row_array();
    }
    public function dashboard()
    {
        return $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
    }
    public function update_course($id, $data)
    {
        $this->db->where('c_id', $id)
            ->update('courses', $data);
    }
    public function get_single_contact($id)
    {
        return $this->db
            ->where('contact_id', $id)
            ->join('admin', 'admin.a_id = contact.contact_viewer_id', 'left')
            ->get('contact')->row_array();
    }
    public function contact_detail_viewed($id, $data)
    {
        $this->db->where('contact_id', $id)
            ->update('contact', $data);
    }
    public function contact_detail_not_viewed($id, $data)
    {
        $this->db->where('contact_id', $id)
            ->update('contact', $data);
    }

    public function update_trainer($id, $data)
    {
        $this->db->where('t_id', $id)
            ->update('trainers', $data);
    }
    public function update_about($id, $data)
    {
        $this->db->where('b_id', $id)
            ->update('about', $data);
    }
    public function insert_trainer($data)
    {
        $this->db->insert('trainers', $data);
    }
    public function send_message($data)
    {
        $this->db->insert('contact', $data);
    }
    public function get_all_contact()
    {
        return $this->db
            ->order_by('contact_id', 'DESC')
            ->get('contact')->result_array();
    }

    public function get_all_trainers()
    {
        return $this->db
            ->order_by('t_id', 'DESC')
            ->get('trainers')->result_array();
    }
    public function get_all_categories()
    {
        return $this->db
            ->order_by('category_id', 'DESC')
            ->get('category')->result_array();
    }
    public function delete_trainer($id)
    {
        $this->db->where('t_id', $id)->delete('trainers');
    }
    public function contact_detail_delete($id)
    {
        $this->db->where('contact_id', $id)->delete('contact');
    }
    public function emails($data)
    {
        $this->db->insert('emails', $data);
    }
}
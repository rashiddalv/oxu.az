<?php

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CoursesModelUser');
    }
    public function index()
    {
        $data['get_all_categories'] = $this->CoursesModelUser->get_all_categories();
        $data['get_3_courses'] = $this->CoursesModelUser->get_3_courses();
        $this->load->view('user/index', $data);
    }
    public function about()
    {
        $data['get_about'] = $this->CoursesModelUser->get_about();
        $this->load->view('user/about', $data);
    }
    public function courses()
    {   
        $data['get_all_categories'] = $this->CoursesModelUser->get_all_categories();
        $data['get_all_courses'] = $this->CoursesModelUser->get_all_courses();
        $this->load->view('user/courses', $data);
    }
    public function trainers()
    {
        $data['get_all_trainers'] = $this->CoursesModelUser->get_all_trainers();
        $this->load->view('user/trainers', $data);
    }
    public function contact()
    {
        $this->load->view('user/contact');
    }
    public function course_details($id)
    {
        $product_id = $this->uri->segment(2);
        if(!is_numeric($product_id)){
            redirect(base_url('index'));
        }
        $data['course_detail'] = $this->CoursesModelUser->get_single_course($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('user/course-details', $data);
        if($data['course_detail']){
            $this->load->view('user/course-details',$data);
        }else{
            redirect(base_url('courses'));
        }
    }
    public function trainer_details($id)
    {
        $product_id = $this->uri->segment(2);
        if(!is_numeric($product_id)){
            redirect(base_url('index'));
        }
        $data['trainer_details'] = $this->CoursesModelUser->get_single_trainer($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('user/course-details', $data);
        if($data['trainer_details']){
            $this->load->view('user/trainer-details',$data);
        }else{
            redirect(base_url('courses'));
        }
    }
}
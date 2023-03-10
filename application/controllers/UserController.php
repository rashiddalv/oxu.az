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
        $data['course_detail'] = $this->CoursesModelUser->get_single_course($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        $this->load->view('user/course-details', $data);
    }
}
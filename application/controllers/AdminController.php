<?php

class AdminController extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/auth-login-basic');
    }

    public function login_act()
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if (!empty($email) && !empty($pass)) {
            $data = [
                'a_mail' => $email,
                'a_password' => md5($pass),
            ];
            // print_r('<pre>');
            // print_r($data);
            // die();
            $check_admin = $this->db->where($data)->get('admin')->row_array();
            if ($check_admin) {
                $_SESSION['admin_login_id'] = $check_admin['a_id'];
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('err', 'E-poçt və ya parol səhv daxil edilib.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function log_out()
    {
        $this->session->set_flashdata('success', 'Tezliklə qayıdın!');
        unset($_SESSION['admin_login_id']);
        redirect(base_url('login_dashboard'));
    }

    public function register()
    {
        $this->load->view('admin/auth-register-basic');
    }

    public function register_act()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $name = $_POST['reg-username'];
        $email = $_POST['reg-email'];
        $pass = $_POST['reg-password'];
        $terms = $_POST['reg-terms'];

        if (!empty($name) && !empty($email) && !empty($pass) && isset($terms) && $terms == 'Yes') {
            if (preg_match('~^\p{Lu}~u', $name)) {

                $this->form_validation->set_rules('reg-email', 'Email', 'trim|required|valid_email');
                if ($this->form_validation->run() == TRUE) {
                    if (strlen($pass) >= 6 && strlen($pass) <= 15) {





                        //==========================================================CHECK EMAIL REPEAT (WORK)====================================================

                        $checkEmailDublicate = $this->db->where("a_mail", $email)->get("admin")->row_array();
                        if ($checkEmailDublicate) {
                            $this->session->set_flashdata('err', 'Daxil etdiyiniz e-poçt məşğuldur.');
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $data = [
                                'a_name' => $name,
                                'a_mail' => $email,
                                'a_password' => md5($pass)
                            ];
                            $this->db->insert('admin', $data);
                            $this->session->set_flashdata('success', 'Hesab uğurla yaradıldı.');
                            redirect($_SERVER['HTTP_REFERER']);
                        }

                        //==========================================================CHECK EMAIL REPEAT (WORK)====================================================









                    } else {
                        $this->session->set_flashdata('err', 'Şifrənin uzunluğu ən azı 6 olmalıdır.');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('err', 'Həqiqi e-poçtu daxil edin.');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('err', 'Ad böyük hərflə başlamalıdır.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function dashboard()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $this->load->view('admin/dashboard', $data);
    }
    public function dashboard_courses()
    {
        $data['get_all_courses'] = $this->db
            ->order_by('c_id', 'DESC')
            ->join('admin', 'admin.a_id = courses.c_creator_id')
            ->get('courses')->result_array();
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $this->load->view('admin/courses/courses', $data);
    }
    public function course_create()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $this->load->view('admin/courses/create', $data);
    }
    public function course_create_act()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $trainer = $_POST['trainer'];
        $price = $_POST['price'];

        if (!empty($title) && !empty($description) && !empty($trainer) && !empty($category) && !empty($price)) {
            if (preg_match('~^\p{Lu}~u', $title) && preg_match('~^\p{Lu}~u', $description)) {
                if (is_numeric($price)) {
                    $data = [
                        'c_title' => $title,
                        'c_description' => $description,
                        'c_category' => $category,
                        'c_trainer' => $trainer,
                        'c_price' => $price,
                        // 'c_img'      => ,
                        'c_creator_id' => $_SESSION['admin_login_id'],
                        'c_created_date' => date("Y-m-d H:i:s"),
                    ];
                    $this->db->insert('courses', $data);
                    $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                    redirect(base_url('dashboard_courses'));
                } else {
                    $this->session->set_flashdata('err', 'Qiymət sahəsində hərflər və ya xüsusi simvollar olmamalıdır.');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('err', 'Kursun adı və təsviri böyük hərflə başlamalıdır.');
                redirect($_SERVER['HTTP_REFERER']);

            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function course_delete($id)
    {
        $this->db->where('c_id', $id)->delete('courses');
        $this->session->set_flashdata('success', 'Kurs uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
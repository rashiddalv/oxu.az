<?php

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CoursesModel');
    }
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
        $verification_token = md5(uniqid());

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
                                'a_password' => md5($pass),
                                'a_status' => 'Unverified user',
                                'a_token' => $verification_token,
                                
                            ];
                            $this->CoursesModel->register_insert($data);
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


    // =================ACCOUNT VERIFICATION=================
    // public function verify_account($token, $id)
    // {
    //     $config = array(
    //         'protocol' => 'smtp',
    //         // 'mail', 'sendmail', or 'smtp'
    //         'smtp_host' => 'smtp.gmail.com',
    //         'smtp_port' => 587,
    //         'smtp_user' => 'rashiddvalorant@gmail.com',
    //         'smtp_pass' => 'drbijagzswauwzyi',
    //         'smtp_crypto' => 'tls',
    //         'mailtype' => 'html',
    //         //plaintext 'text' mails or 'html'
    //         'smtp_timeout' => '4',
    //         //in seconds
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE,
    //         'newline' => "\r\n"
    //     );
    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);

    //         $data = $this->db->get_where('admin', ['a_token' => $token])->row();
    //         $email = $this->db->query("SELECT `a_mail` FROM `admin` WHERE `a_id` = $id");
            


    //         $this->load->library('email', $config);
    //         $this->email->initialize($config);

    //         $this->email->from('rashiddalv@gmail.com', 'OXU.AZ');
    //         $this->email->to('$email');

    //         $this->email->subject('Verify Account');
    //         // $message = $this->load->view('admin/mail', $data, TRUE);
    //         $this->email->message('Verify your account: ' . base_url('verify_account/token/' . $token));

    //         $this->email->send();

    //         // show_error($this->email->print_debugger());

    //         // if (!$this->email->send()) {
    //         //     echo '123';
    //         // }


    //         $this->session->set_flashdata('success', 'Account verification email has been sent.');
    //         redirect($_SERVER['HTTP_REFERER']);
        

    // }
    // public function token($token)
    // {
    //     $verify_account = $this->db->get_where('admin', ['a_token' => $token])->row();

    //     if (!$verify_account) {
    //         show_404();
    //     } else {
    //         $this->load->view('admin/reset_password_token_form', ['a_token' => $token]);
    //     }
    // }
    // =================ACCOUNT VERIFICATION=================

    
    public function dashboard()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $this->load->view('admin/dashboard', $data);
    }
    public function dashboard_courses()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['get_all_courses'] = $this->CoursesModel->get_all_courses();
        $this->load->view('admin/courses/courses', $data);
    }
    public function course_create()
    {
        $data['get_all_trainers'] = $this->CoursesModel->get_all_trainers();
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
            $config['upload_path'] = './uploads/courses/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('course_img')) {
                $file_name = $this->upload->data('file_name');
                $file_ext = $this->upload->data('file_ext');
                if (preg_match('~^\p{Lu}~u', $title) && preg_match('~^\p{Lu}~u', $description)) {
                    if (is_numeric($price)) {
                        $data = [
                            'c_title' => $title,
                            'c_description' => $description,
                            'c_category' => $category,
                            'c_trainer' => $trainer,
                            'c_price' => $price,
                            'c_img' => $file_name,
                            'c_file_ext' => $file_ext,
                            'c_creator_id' => $_SESSION['admin_login_id'],
                            'c_created_date' => date("Y-m-d H:i:s"),
                        ];

                        $this->CoursesModel->insert($data);
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
                $data = [
                    'c_title' => $title,
                    'c_description' => $description,
                    'c_category' => $category,
                    'c_trainer' => $trainer,
                    'c_price' => $price,
                    'c_creator_id' => $_SESSION['admin_login_id'],
                    'c_created_date' => date("Y-m-d H:i:s"),
                ];
                $this->CoursesModel->insert($data);
                $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                redirect(base_url('dashboard_courses'));
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function course_delete($id)
    {
        $this->CoursesModel->delete_course($id);
        $this->session->set_flashdata('success', 'Kurs uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function dashboard_account_settings()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $this->load->view('admin/pages-account-settings-account', $data);
    }
    public function account_settings_act()
    {
        $config['upload_path'] = './uploads/admin/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        // $config['max_size']          = 100;
        // $config['max_width']         = 1024;
        // $config['max_height']        = 768;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('profile_pic')) {
            $file_name = $this->upload->data('file_name');
            $new_name = $_POST['new_name'];
            $new_mail = $_POST['new_mail'];
            $data = [
                'a_img' => $file_name,
                'a_name' => $new_name,
                'a_mail' => $new_mail,
            ];
            $this->db->where('a_id', $_SESSION['admin_login_id'])->update('admin', $data);
            $this->session->set_flashdata('success', 'Profile settings saved successfully.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $new_name = $_POST['new_name'];
            $new_mail = $_POST['new_mail'];
            $data = [
                'a_name' => $new_name,
                'a_mail' => $new_mail,
            ];
            $this->db->where('a_id', $_SESSION['admin_login_id'])->update('admin', $data);
            $this->session->set_flashdata('success', 'Profile settings saved successfully.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function course_detail($id)
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['course_detail'] = $this->CoursesModel->get_single_course($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        $this->load->view('admin/courses/detail', $data);
    }
    public function delete_course_detail($id)
    {
        $this->CoursesModel->delete_course($id);
        $this->session->set_flashdata('success', 'Kurs uğurla silindi.');
        redirect(base_url('dashboard_courses'));
    }
    public function course_edit($id)
    {
        $data['get_all_trainers'] = $this->CoursesModel->get_all_trainers();
        $data['get_single_data'] = $this->CoursesModel->get_single_data($id);
        $this->load->view('admin/courses/edit', $data);
    }
    public function course_edit_act($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $trainer = $_POST['trainer'];
        $price = $_POST['price'];
        if (!empty($title) && !empty($description) && !empty($trainer) && !empty($category) && !empty($price)) {
            $config['upload_path'] = './uploads/courses/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('course_img')) {
                $file_name = $this->upload->data('file_name');
                $file_ext = $this->upload->data('file_ext');
                if (preg_match('~^\p{Lu}~u', $title) && preg_match('~^\p{Lu}~u', $description)) {
                    if (is_numeric($price)) {
                        $data = [
                            'c_title' => $title,
                            'c_description' => $description,
                            'c_category' => $category,
                            'c_trainer' => $trainer,
                            'c_price' => $price,
                            'c_img' => $file_name,
                            'c_file_ext' => $file_ext,
                            'c_updater_id' => $_SESSION['admin_login_id'],
                            'c_update_date' => date("Y-m-d H:i:s"),
                        ];

                        $this->CoursesModel->update_course($id, $data);
                        $this->session->set_flashdata('success', 'Kurs uğurla yeniləndi.');
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
                $data = [
                    'c_title' => $title,
                    'c_description' => $description,
                    'c_category' => $category,
                    'c_trainer' => $trainer,
                    'c_price' => $price,
                    'c_updater_id' => $_SESSION['admin_login_id'],
                    'c_update_date' => date("Y-m-d H:i:s"),
                ];
                $this->CoursesModel->update_course($id, $data);
                $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                redirect(base_url('dashboard_courses'));
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function dashboard_trainers()
    {
        $data['get_all_trainers'] = $this->CoursesModel->get_all_trainers();
        $this->load->view('admin/trainers/trainers', $data);
    }
    public function trainer_create()
    {
        $this->load->view('admin/trainers/create');
    }
    public function trainer_create_act()
    {
        $name = $_POST['name-surname'];
        $bio = $_POST['bio'];

        if (!empty($name) && !empty($bio)) {
            $config['upload_path'] = './uploads/trainers/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (preg_match('~^\p{Lu}~u', $name)) {
                if ($this->upload->do_upload('trainer_img')) {
                    $file_name = $this->upload->data('file_name');
                    $file_ext = $this->upload->data('file_ext');
                    $data = [
                        't_name' => $name,
                        't_about' => $bio,
                        't_img' => $file_name,
                        't_img_ext' => $file_ext,
                        't_creator_id' => $_SESSION['admin_login_id'],
                        't_created_date' => date("Y-m-d H:i:s"),
                    ];

                    $this->CoursesModel->insert_trainer($data);
                    $this->session->set_flashdata('success', 'Müəllim uğurla əlavə edildi.');
                    redirect(base_url('dashboard_trainers'));
                } else {
                    $data = [
                        't_name' => $name,
                        't_about' => $bio,
                        't_creator_id' => $_SESSION['admin_login_id'],
                        't_created_date' => date("Y-m-d H:i:s"),
                    ];

                    $this->CoursesModel->insert_trainer($data);
                    $this->session->set_flashdata('success', 'Müəllim uğurla əlavə edildi.');
                    redirect(base_url('dashboard_trainers'));
                }
            } else {
                $this->session->set_flashdata('err', 'Müəllimin adı böyük hərflə başlamalıdır.');
                redirect($_SERVER['HTTP_REFERER']);
            }

        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function trainer_delete($id)
    {
        $this->CoursesModel->delete_trainer($id);
        $this->session->set_flashdata('success', 'Təlimçi uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function trainer_edit($id)
    {
        $data['get_single_data_trainers'] = $this->CoursesModel->get_single_data_trainers($id);
        $this->load->view('admin/trainers/edit', $data);
    }
    public function trainer_edit_act($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        if (!empty($title) && !empty($description)) {
            $config['upload_path'] = './uploads/trainers/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (preg_match('~^\p{Lu}~u', $title)) {
                if ($this->upload->do_upload('trainer_img')) {
                    $file_name = $this->upload->data('file_name');
                    $file_ext = $this->upload->data('file_ext');
                    $data = [
                        't_name' => $title,
                        't_about' => $description,
                        't_img' => $file_name,
                        't_img_ext' => $file_ext,
                    ];

                    $this->CoursesModel->update_trainer($id, $data);
                    $this->session->set_flashdata('success', 'Təlimçi uğurla yeniləndi.');
                    redirect(base_url('dashboard_trainers'));

                } else {
                    $data = [
                        't_name' => $title,
                        't_about' => $description,
                    ];
                    $this->CoursesModel->update_trainer($id, $data);
                    $this->session->set_flashdata('success', 'Təlimçi uğurla yeniləndi.');
                    redirect(base_url('dashboard_trainers'));
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
}
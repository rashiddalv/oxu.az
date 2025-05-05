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
            $data = $this->security->xss_clean($data);
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
                            $data = $this->security->xss_clean($data);
                            $this->CoursesModel->register_insert($data);
                            $this->session->set_flashdata('success', 'Hesab uğurla yaradıldı.');
                            redirect('login_dashboard');
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
    public function verify_acc_token($id)
    {
        $data = [
            'a_token' => md5(uniqid()),
            'a_status' => 'Verified user',
        ];
        $data = $this->security->xss_clean($data);
        $this->db->where('a_token', $id);
        $this->db->update('admin', $data);
        if ($this->db->affected_rows() == 1) {
            $this->load->view('admin/account-verified');
        } else {
            show_404();
        }
    }
    public function verify_account()
    {
        $config = array(
            'protocol' => 'smtp',
            // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => getenv("EMAIL_USER"),
            'smtp_pass' => getenv("EMAIL_PASS"),
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4',
            //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => "\r\n"
        );
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // $data = $this->db->get_where('admin', ['a_token' => $token])->row_array();
        // show_error($token);
        $admin = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();





        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('rashiddalv@gmail.com', 'OXU.AZ');
        $this->email->to($admin['a_mail']);
        $this->email->subject('Account Verification');
        $message = $this->load->view('admin/verify', $admin, TRUE);
        $this->email->message($message);
        $this->email->send();

        // show_error($this->email->print_debugger());

        // if (!$this->email->send()) {
        //     echo '123';
        // }


        $this->session->set_flashdata('success', 'Hesabınızı təsdiqləmək üçün link e-poçtunuza göndərilib.');
        redirect($_SERVER['HTTP_REFERER']);


    }
    // =================ACCOUNT VERIFICATION=================
    public function dashboard()
    {
        $data['admin'] = $this->CoursesModel->dashboard();
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
        $data['get_all_categories'] = $this->CoursesModel->get_all_categories();
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
        $duration = $_POST['duration'];

        if (!empty($title) && !empty($description) && !empty($trainer) && !empty($category) && !empty($price) && !empty($duration) && preg_match('~^\p{Lu}~u', $title) && preg_match('~^\p{Lu}~u', $description)) {
            $check_teacher = $this->db->where('t_name', $trainer)->get('trainers')->row_array();
            if ($check_teacher) {
                $check_category = $this->db->where('category_name', $category)->get('category')->row_array();
                if ($check_category) {
                    if (is_numeric($price) && is_numeric($duration)) {

                        $config['upload_path'] = './uploads/courses/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('course_img')) {
                            $file_name = $this->upload->data('file_name');
                            $file_ext = $this->upload->data('file_ext');




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
                                'c_duration' => $duration,
                            ];
                            $data = $this->security->xss_clean($data);
                            $this->CoursesModel->insert($data);
                            $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                            redirect(base_url('dashboard_courses'));
                        } else {
                            $data = [
                                'c_title' => $title,
                                'c_description' => $description,
                                'c_category' => $category,
                                'c_trainer' => $trainer,
                                'c_price' => $price,
                                'c_creator_id' => $_SESSION['admin_login_id'],
                                'c_created_date' => date("Y-m-d H:i:s"),
                                'c_duration' => $duration,
                            ];
                            $data = $this->security->xss_clean($data);
                            $this->CoursesModel->insert($data);
                            $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                            redirect(base_url('dashboard_courses'));
                        }

                    } else {
                        $this->session->set_flashdata('err', 'Qiymət və kurs müddəti sahələrində hərflər və ya xüsusi simvollar olmamalıdır.');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('err', 'Bu kateqoriya yoxdur.');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('err', 'Bu müəllim yoxdur.');
                redirect($_SERVER['HTTP_REFERER']);
            }

            // } else {
            //     $this->session->set_flashdata('err', 'Bu kateqoriya/müəllim yoxdur.');
            //     redirect($_SERVER['HTTP_REFERER']);
            // }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun. Kursun adı və təsviri böyük hərflə yazılmalıdır.');
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
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size']          = 100;
        // $config['max_width']         = 1024;
        // $config['max_height']        = 768;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $new_name = $_POST['new_name'];

        if (!empty($new_name)) {
            if ($this->upload->do_upload('profile_pic')) {
                $file_name = $this->upload->data('file_name');
                $data = [
                    'a_img' => $file_name,
                    'a_name' => trim($new_name),
                ];
                $data = $this->security->xss_clean($data);
                $this->db->where('a_id', $_SESSION['admin_login_id'])->update('admin', $data);
                $this->session->set_flashdata('success', 'Profil parametrləri uğurla yadda saxlanıldı.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $new_name = $_POST['new_name'];
                $new_mail = $_POST['new_mail'];
                $data = [
                    'a_name' => trim($new_name),
                ];
                $data = $this->security->xss_clean($data);
                $this->db->where('a_id', $_SESSION['admin_login_id'])->update('admin', $data);
                $this->session->set_flashdata('success', 'Profil parametrləri uğurla yadda saxlanıldı.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function course_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['course_detail'] = $this->CoursesModel->get_single_course($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('admin/courses/detail', $data);
        if ($data['course_detail']) {
            $this->load->view('admin/courses/detail', $data);
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function delete_course_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $this->CoursesModel->delete_course($id);
        $this->session->set_flashdata('success', 'Kurs uğurla silindi.');
        redirect(base_url('dashboard_courses'));
    }
    public function delete_trainers_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $this->CoursesModel->delete_trainer($id);
        $this->session->set_flashdata('success', 'Təlimçi uğurla silindi.');
        redirect(base_url('dashboard_trainers'));
    }
    public function course_edit($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['get_all_trainers'] = $this->CoursesModel->get_all_trainers();
        $data['get_single_data'] = $this->CoursesModel->get_single_data($id);

        // $this->load->view('admin/courses/edit', $data);
        if ($data['get_single_data']) {
            $this->load->view('admin/courses/edit', $data);
        } else {
            redirect(base_url('dashboard'));
        }

    }
    public function course_edit_act($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $trainer = $_POST['trainer'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        if (!empty($title) && !empty($description) && !empty($trainer) && !empty($category) && !empty($price) && !empty($duration)) {
            $check_teacher = $this->db->where('t_name', $trainer)->get('trainers')->row_array();
            if ($check_teacher) {
                $check_category = $this->db->where('category_name', $category)->get('category')->row_array();
                if ($check_category) {
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
                                    'c_duration' => $duration,

                                ];
                                $data = $this->security->xss_clean($data);
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
                            'c_duration' => $duration,
                        ];
                        $data = $this->security->xss_clean($data);
                        $this->CoursesModel->update_course($id, $data);
                        $this->session->set_flashdata('success', 'Kurs uğurla yaradıldı.');
                        redirect(base_url('dashboard_courses'));
                    }
                } else {
                    $this->session->set_flashdata('err', 'Bu kateqoriya yoxdur.');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('err', 'Bu müəllim yoxdur.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function course_img_delete($id)
    {
        $data = [
            'c_img' => '',
            'c_file_ext' => '',
        ];
        $data = $this->security->xss_clean($data);
        $this->CoursesModel->update_course($id, $data);
        $this->session->set_flashdata('success', 'Şəkil uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function account_img_delete($id)
    {
        $data = [
            'a_img' => '',
        ];
        $data = $this->security->xss_clean($data);
        $this->db->where('a_id', $_SESSION['admin_login_id'])->update('admin', $data);
        $this->session->set_flashdata('success', 'Şəkil uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function dashboard_trainers()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
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
                    $data = $this->security->xss_clean($data);
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
                    $data = $this->security->xss_clean($data);
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
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['get_single_data_trainers'] = $this->CoursesModel->get_single_data_trainers($id);
        // $this->load->view('admin/trainers/edit', $data);
        if ($data['get_single_data_trainers']) {
            $this->load->view('admin/trainers/edit', $data);
        } else {
            redirect(base_url('dashboard'));
        }
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
                    $data = $this->security->xss_clean($data);
                    $this->CoursesModel->update_trainer($id, $data);
                    $this->session->set_flashdata('success', 'Təlimçi uğurla yeniləndi.');
                    redirect(base_url('dashboard_trainers'));

                } else {
                    $data = [
                        't_name' => $title,
                        't_about' => $description,
                    ];
                    $data = $this->security->xss_clean($data);
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
    public function trainer_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['trainer_detail'] = $this->CoursesModel->get_single_trainer($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('admin/trainers/detail', $data);
        if ($data['trainer_detail']) {
            $this->load->view('admin/trainers/detail', $data);
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function trainer_img_delete($id)
    {
        $data = [
            't_img' => '',
            't_img_ext' => '',
        ];
        $data = $this->security->xss_clean($data);
        $this->CoursesModel->update_trainer($id, $data);
        $this->session->set_flashdata('success', 'Şəkil uğurla silindi.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function dashboard_about()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['get_about'] = $this->CoursesModel->get_about();
        $this->load->view('admin/about/about', $data);
    }
    public function about_edit($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['get_about'] = $this->CoursesModel->get_single_data_about($id);
        // $this->load->view('admin/about/edit', $data);
        if ($data['get_about']) {
            $this->load->view('admin/about/edit', $data);
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function about_edit_act($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        if (!empty($title) && !empty($description)) {
            $config['upload_path'] = './uploads/about/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (preg_match('~^\p{Lu}~u', $title)) {
                if ($this->upload->do_upload('about_img')) {
                    $file_name = $this->upload->data('file_name');
                    $file_ext = $this->upload->data('file_ext');
                    $data = [
                        'b_title' => $title,
                        'b_description' => $description,
                        'b_img' => $file_name,
                        'b_img_ext' => $file_ext,
                        'b_editor_id' => $_SESSION['admin_login_id'],
                        'b_edit_date' => date("Y-m-d H:i:s"),
                    ];
                    $data = $this->security->xss_clean($data);
                    $this->CoursesModel->update_about($id, $data);
                    $this->session->set_flashdata('success', 'Məlumat uğurla yeniləndi.');
                    redirect(base_url('dashboard_about'));

                } else {
                    $data = [
                        'b_title' => $title,
                        'b_description' => $description,
                    ];
                    $data = $this->security->xss_clean($data);
                    $this->CoursesModel->update_about($id, $data);
                    $this->session->set_flashdata('success', 'Məlumat uğurla yeniləndi.');
                    redirect(base_url('dashboard_about'));
                }
            } else {
                $this->session->set_flashdata('err', 'Başlıq böyük hərflə başlamalıdır.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələri doldurun.');
            redirect($_SERVER['HTTP_REFERER']);

        }
    }
    public function about_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['about_detail'] = $this->CoursesModel->get_single_about($id);
        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('admin/about/detail', $data);
        if ($data['about_detail']) {
            $this->load->view('admin/about/detail', $data);
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function dashboard_contact()
    {
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['get_all_contact'] = $this->CoursesModel->get_all_contact();
        $this->load->view('admin/contact/contact', $data);
    }
    public function contact_send_act()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
            if (preg_match('~^\p{Lu}~u', $name)) {
                $data = [
                    'contact_name' => $name,
                    'contact_email' => $email,
                    'contact_subject' => $subject,
                    'contact_message' => $message,
                    'contact_status' => 'Müraciət cavablandırılmayıb',
                    'contact_date' => date("Y-m-d H:i:s"),
                ];
                $data = $this->security->xss_clean($data);
                $this->CoursesModel->send_message($data);
                $this->session->set_flashdata('success', 'Sorğunuz uğurla göndərildi.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('err', 'Ad böyük hərflə başlamalıdır.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('err', 'Bütün sahələr doldurulmalıdır.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function contact_detail($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data['contact_detail'] = $this->CoursesModel->get_single_contact($id);

        // print_r('<pre>');
        // print_r($data['course_detail']);
        // die();
        // $this->load->view('admin/contact/detail', $data);
        if ($data['contact_detail']) {
            $this->load->view('admin/contact/detail', $data);
        } else {
            redirect(base_url('dashboard'));
        }
    }
    public function contact_detail_viewed($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data['admin'] = $this->db->where('a_id', $_SESSION['admin_login_id'])->get('admin')->row_array();
        $data = [
            'contact_status' => 'Müraciət cavablandırılıb',
            'contact_viewed_date' => date("Y-m-d H:i:s"),
            'contact_viewer_id' => $_SESSION['admin_login_id'],
        ];
        $data = $this->security->xss_clean($data);
        $this->CoursesModel->contact_detail_viewed($id, $data);
        $this->session->set_flashdata('success', 'Müraciət cavablandırılıb.');
        redirect(base_url('dashboard_contact'));
    }
    public function contact_detail_not_viewed($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $data = [
            'contact_status' => 'Müraciət cavablandırılmayıb',
            'contact_viewed_date' => '—',
            'contact_viewer_id' => "",
        ];
        $data = $this->security->xss_clean($data);
        $this->CoursesModel->contact_detail_not_viewed($id, $data);
        $this->session->set_flashdata('err', 'Müraciət cavablandırılmayıb.');
        redirect(base_url('dashboard_contact'));
    }
    public function contact_detail_delete($id)
    {
        $product_id = $this->uri->segment(2);
        if (!is_numeric($product_id)) {
            redirect(base_url('dashboard'));
        }
        $this->CoursesModel->contact_detail_delete($id);
        $this->session->set_flashdata('success', 'Müraciət uğurla silindi.');
        redirect(base_url('dashboard_contact'));
    }
    public function emails()
    {
        $email = $_POST['email'];
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'email' => $email,
            ];
            $data = $this->security->xss_clean($data);
            $this->CoursesModel->emails($data);
            redirect($_SERVER['HTTP_REFERER']);

        } else {
            redirect(base_url('index'));
        }
    }
}
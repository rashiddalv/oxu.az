<?php

class ResetPassword extends CI_Controller
{


    public function index()
    {
        $this->load->view('admin/auth-forgot-password-basic');
    }
    public function send()
    {
        $config = array(
            'protocol' => 'smtp',
            // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'rashiddvalorant@gmail.com',
            'smtp_pass' => 'drbijagzswauwzyi',
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
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');



        if ($this->form_validation->run() == false) {
            $this->load->view('admin/auth-forgot-password-basic');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('admin', ['a_mail' => $email])->row();

            if (!$user) {
                $this->session->set_flashdata('err', 'E-poçt tapılmadı.');
                redirect($_SERVER['HTTP_REFERER']);

            } else {
                $token = bin2hex(random_bytes(32));

                $this->db->insert('reset-pass', [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                $data = $this->db->get_where('reset-pass', ['token' => $token])->row();

                $this->load->library('email', $config);
                $this->email->initialize($config);

                $this->email->from('rashiddalv@gmail.com', 'OXU.AZ');
                $this->email->to($email);

                $this->email->subject('Reset Password');
                $message = $this->load->view('admin/mail', $data, TRUE);
                $this->email->message($message);
                // $this->email->message('Click the following link to reset your password: ' . base_url('reset_password/token/' . $token));

                $this->email->send();
                // show_error($this->email->print_debugger());

                // if (!$this->email->send()) {
                //     echo '123';
                // }    


                $this->session->set_flashdata('success', 'Parolunuzu sıfırlamaq üçün təlimatlarla bir e-poçt göndərildi.');
                redirect('reset_password');
            }
        }
    }

    public function token($token)
    {
        $password_reset = $this->db->get_where('reset-pass', ['token' => $token])->row();

        if (!$password_reset) {
            show_404();
        } else {
            $this->load->view('admin/reset_password_token_form', ['token' => $token]);
        }
    }

    public function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('err', 'Your password has been updated.');
            $this->load->view('admin/reset_password_token_form', ['token' => $this->input->post('token')]);

        } else {
            $password_reset = $this->db->get_where('reset-pass', ['token' => $this->input->post('token')])->row();

            if (!$password_reset) {
                show_404();

            } else {
                $user = $this->db->get_where('admin', ['a_mail' => $password_reset->email])->row();
                $new_password = ($_POST['password']);
                $data = [
                    'a_password' => md5($new_password)
                ];

                $this->db->where('a_id', $user->a_id);
                $this->db->update('admin', $data);
                $this->db->where('id', $password_reset->id);
                $this->db->delete('reset-pass');

                $this->session->set_flashdata('success', 'Parolunuz yeniləndi.');
                redirect('login_dashboard');
            }
        }
    }
    public function reset_password_token_form()
    {
        $this->load->view('admin/reset_password_token_form');
    }
}
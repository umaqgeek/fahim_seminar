<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller 
{
    function __construct() {
        parent::__construct();
    }
    
    public function viewpage($page = 'index', $data = array(), $menu = 'menu') {
        $page1 = 'one';
        if ($this->input->get('page')) {
            $page1 = $this->input->get('page');
        }
        $data1['page1'] = $page1;
        
        // check for the flashdata
        if ($this->session->flashdata('error') != "") 
                $data1['error'] = $this->session->flashdata('error');
        if ($this->session->flashdata('sucess') != "") 
                $data1['sucess'] = $this->session->flashdata('sucess');
        if ($this->session->flashdata('info') != "") 
                $data1['info'] = $this->session->flashdata('info');
        
//        print_r($data1);

        echo $this->load->view('utama/header', $data, true);
        echo $this->load->view('utama/' . $menu, $data1, true);
        echo $this->load->view('utama/' . $page, $data, true);
        echo $this->load->view('utama/footer', $data1, true);
    }

    public function index() {
        $this->load->model('m_post_page');
        $data['post_page'] = $this->m_post_page->getAll();
        $this->viewpage('index', $data);
    }
    
    function registerprocess() {
        if ($this->input->post()) {
            $arr = $this->input->post();
            
            $image = $this->my_func->do_upload('resit', './assets/uploads/resit/');
//            print_r($image);
            
            if (isset($image['error'])) {
                
                $error = $image['error'];
                $this->session->set_flashdata('error', $error);
                redirect(site_url('utama/index#four'));
                
            } else if (isset($image['upload_data']['file_name'])) {
                
                $datetime = date('Y-m-d H:i:s');
                $data_sr = array(
                    'sr_name' => $arr['name'],
                    'sr_email' => $arr['email'],
                    'sr_phone' => $arr['phone'],
                    'sr_address' => $arr['address'],
                    'sr_resit' => $image['upload_data']['file_name'],
                    'sr_datetime' => $datetime,
                    'srs_id' => 1
                );
                $this->load->model('m_seminar_registration');
                $sr_id = $this->m_seminar_registration->add($data_sr);
                
                if ($sr_id) {
                    $subject = "Nine.40 Trainer - Seminar Registration Request";
                    $id = $this->my_func->format_digit($sr_id);
                    $link = site_url("admin/manageregistration?page=two");
                    $msg = "User ID N4T".$id." had registered. Please revise the request at this link - ".$link.".";
                    $this->my_func->send_email_allAdmins($subject, $msg, $datetime);
                    $this->session->set_flashdata('sucess', 'Thank you, your registration request is success.<br />'
                            . 'We will revise it and inform you through your email.');   
                } else {
                    $this->session->set_flashdata('error', 'Opss! Registration request is failed.');
                }
                
            } else {
                $this->session->set_flashdata('error', 'Opss! Something is wrong!!');
            }
            
        } else {
            $this->session->set_flashdata('error', 'Access denied!');
        }
        redirect(site_url('utama/index#four'));
    }

    public function loginpage() {
        $this->viewpage('login', '', 'menulogin');
    }
    
    private function test_email() {
        $date = date('Y-m-d H:i:s');
        $bol = $this->my_func->send_email('umaqgeek@gmail.com', 'Test nine40trainer', 'Test anta php date: '.$date);
        die("Status: ".$bol);
    }
    
    public function loginprocess() {
        if ($this->input->post('username') && $this->input->post('password')) {
            $arr = $this->input->post();
            $user = $arr['username'];
            $pass = $arr['password'];
            if ($this->authenticate()) {
                
                redirect(site_url('admin'));
                
            } else {
                redirect(site_url('utama/loginpage?page=login'));
            }
        } else {
            $this->session->set_flashdata('error', 'Do not leave blank!');
            redirect(site_url('utama/loginpage?page=login'));
        }
    }
    
    private function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        return $this->simpleloginsecure->login($username, $password);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
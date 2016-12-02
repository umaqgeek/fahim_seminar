<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    function __construct() {
        parent::__construct();
    }

    public function index($status='view')
    {
        if ($status == 'view') {
            $this->load->model('m_seminar_registration');
            $data['seminar_registration'] = $this->m_seminar_registration->getAll();
            $this->viewpage('managereg/index', $data);
        } else if ($status == 'edit') {
            if ($this->input->get('sr')) {
                $srx = $this->input->get('sr');
                $sr_id = $this->my_func->n4t_decrypt($srx);
                $this->load->model('m_seminar_registration');
                $data['seminar_registration'] = $this->m_seminar_registration->get($sr_id);
                $this->viewpage('managereg/editreg', $data);
            } else {
                redirect(site_url('admin/logout'));
            }
        } else if ($status == 'delete') {
            if ($this->input->get('sr')) {
                $srx = $this->input->get('sr');
                $sr_id = $this->my_func->n4t_decrypt($srx);
                $this->load->model('m_seminar_registration');
                $sr = $this->m_seminar_registration->get($sr_id);
                if (isset($sr) && !empty($sr)) {
                    $to = $sr[0]->sr_email;
                    $subject = "Nine.40 Trainer - Registration Rejected";
                    $time = date('Y-m-d H:i:s');
                    $msg = "[" . $this->my_func->sql_time_to_datetime($time) . "] Opss! We're sorry, your registration request has been rejected.";
                    $bol_email = $this->my_func->send_email($to, $subject, $msg);
                    if ($bol_email) {
                        $data_sr = array(
                            'srs_id' => 3
                        );
                        $this->m_seminar_registration->edit($sr_id, $data_sr);
                    } else {
                        $this->session->set_flashdata('error', 'Opss! Rejection failed!!');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid user!');
                }
                redirect(site_url('admin/index?page=one1'));
            } else {
                redirect(site_url('admin/logout'));
            }
        } else if ($status == 'approve') {
            if ($this->input->get('sr')) {
                $srx = $this->input->get('sr');
                $sr_id = $this->my_func->n4t_decrypt($srx);
                $this->load->model('m_seminar_registration');
                $sr = $this->m_seminar_registration->get($sr_id);
                if (isset($sr) && !empty($sr)) {
                    $to = $sr[0]->sr_email;
                    $subject = "Nine.40 Trainer - Registration Approved";
                    $time = date('Y-m-d H:i:s');
                    $msg = "" . $this->my_func->sql_time_to_datetime($time) . " Congratulation, your registration request has been approved.";
                    $bol_email = $this->my_func->send_email($to, $subject, $msg);
                    if ($bol_email) {
                        $data_sr = array(
                            'srs_id' => 2
                        );
                        $this->m_seminar_registration->edit($sr_id, $data_sr);
                    } else {
                        $this->session->set_flashdata('error', 'Opss! Approval failed!!');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid user!');
                }
                redirect(site_url('admin/index?page=one1'));
            } else {
                redirect(site_url('admin/logout'));
            }
        } else {
            redirect(site_url('admin/logout'));
        }
    }
    
    function post_page_add_date($post_array) {
        $date = date('Y-m-d H:i:s');
        $post_array['pp_datetime'] = $date;
        return $post_array;
    }     
    
    public function managepost($status='view')
    {
//        $crud = new grocery_CRUD();
//        
//        $crud->set_table('post_page');
//        $crud->display_as('pp_title', 'Title')
//                ->display_as('pp_post', 'Post')
//                ->display_as('pp_priority', 'Post Priority (Top: 1)');
//        $crud->columns('pp_title', 'pp_priority', 'pp_datetime');
//        $crud->fields('pp_title', 'pp_post', 'pp_priority');
//        $crud->callback_before_insert(array($this, 'post_page_add_date'));
//        
//        $data = $crud->render();
        
        $this->viewpage('managepost/index');
    }

    public function viewpage($page = 'index', $data = array())
    {
        $page1 = 'one1';
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
        
        echo $this->load->view('admin/header', $data, true);
        echo $this->load->view('admin/menu', $data1, true);
        echo $this->load->view('admin/' . $page, $data, true);
        echo $this->load->view('admin/footer', $data1, true);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('utama');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
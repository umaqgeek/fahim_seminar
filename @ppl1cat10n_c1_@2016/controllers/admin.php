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
        if ($status == 'view') {
            $this->load->model('m_post_page');
            $data['post_page'] = $this->m_post_page->getAll();
            $this->viewpage('managepost/index', $data);
        } else if ($status == 'add') {
            
            $this->load->model('m_post_page');
            $post_page = $this->m_post_page->getAll();
            $pp_pr = array();
            if (isset($post_page) && !empty($post_page)) {
                foreach ($post_page as $ppx) {
                    $pp_pr[] = $ppx->pp_priority;
                }
            }
            $pp_priorities = array();
            for ($im=1; $im<=100; $im++) {
                if (!in_array($im, $pp_pr)) {
                    $pp_priorities[] = $im;
                }
            }
            $data['pp_pr'] = $pp_priorities;
            
            if ($this->input->post('pp_title')) {
                $arr = $this->input->post();
                $arr['pp_datetime'] = date('Y-m-d H:i:s');
                
                $arr['pp_post'] = str_replace("\n", "<br />", $arr['pp_post']);
                
                $pp_image = array();
                for ($im=1; $im<=5; $im++) {
                    $pp_image[$im-1] = $this->my_func->do_upload('pp_image'.$im, './assets/uploads/post/');
                    if (isset($pp_image[$im-1]['upload_data']['file_name'])) {
                        $arr['pp_image'.$im] = $pp_image[$im-1]['upload_data']['file_name'];
                    } else {
                        $arr['pp_image'.$im] = "";
                    }
                }
                
                $this->load->model('m_post_page');
                $pp_id = $this->m_post_page->add($arr);
                if ($pp_id) {
                    redirect(site_url('admin/managepost?page=two'));
                } else {
                    $this->session->set_flashdata('error', 'Add post failed!!');
                    redirect(site_url('admin/managepost/add?page=two'));
                }
            }
            $this->viewpage('managepost/add', $data);
        } else if ($status == 'delete') {
            if ($this->input->get('pp')) {
                $ppx = $this->input->get('pp');
                $pp_id = $this->my_func->n4t_decrypt($ppx);
                $this->load->model('m_post_page');
                $pp = $this->m_post_page->get($pp_id);
                if (isset($pp) && !empty($pp)) {
                    $this->m_post_page->delete($pp_id);
                } else {
                    $this->session->set_flashdata('error', 'Invalid post to be deleted!!');
                }
                redirect(site_url('admin/managepost?page=two'));
            } else {
                $this->session->set_flashdata('error', 'Invalid post to be deleted!!');
                redirect(site_url('admin/managepost?page=two'));
            }
        } else if ($status == 'edit') {
            if ($this->input->get('pp')) {
                $ppx = $this->input->get('pp');
                $pp_id = $this->my_func->n4t_decrypt($ppx);
                $this->load->model('m_post_page');
                $pp = $this->m_post_page->get($pp_id);
                if (isset($pp) && !empty($pp)) {
                    
                    if ($this->input->post('pp_title')) {
                        $arr = $this->input->post();
                        
                        $ppidx = $arr['pp'];
                        unset($arr['pp']);
                        $pp_id = $this->my_func->n4t_decrypt($ppidx);
                        
                        $arr['pp_datetime'] = date('Y-m-d H:i:s');

                        $arr['pp_post'] = str_replace("\n", "<br />", $arr['pp_post']);

                        $pp_image = array();
                        for ($im=1; $im<=5; $im++) {
                            $pp_image[$im-1] = $this->my_func->do_upload('pp_image'.$im, './assets/uploads/post/');
                            if (isset($pp_image[$im-1]['upload_data']['file_name'])) {
                                $arr['pp_image'.$im] = $pp_image[$im-1]['upload_data']['file_name'];
                            }
                        }

                        $this->load->model('m_post_page');
                        $pp_id = $this->m_post_page->edit($pp_id, $arr);
                        if ($pp_id) {
                            redirect(site_url('admin/managepost?page=two'));
                        } else {
                            $this->session->set_flashdata('error', 'Add post failed!!');
                            redirect(site_url('admin/managepost/add?page=two'));
                        }
                    }
                    
                    $data['ppid'] = $this->my_func->n4t_encrypt($pp_id);
                    $data['pp'] = $pp[0];
                    $this->viewpage('managepost/editpost', $data);
                    
                } else {
                    $this->session->set_flashdata('error', 'Invalid post!!a');
                    redirect(site_url('admin/managepost?page=two'));
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid post!!b');
                redirect(site_url('admin/managepost?page=two'));
            }
        }
    }
    
    function deleteImage() {
        if ($this->input->get('ppid')) {
            $arr = $this->input->get();
            
//            print_r($arr); die();
            
            $ppid = $arr['ppid'];
            $pp_id = $this->my_func->n4t_decrypt($ppid);
            $ppidx = $this->my_func->n4t_encrypt($pp_id);
            $ims = $arr['ims'];
            $im = $arr['im'];
            
            $this->load->model('m_post_page');
            $data_sr = array('pp_image'.$ims => '');
            $bolpp = $this->m_post_page->edit($pp_id, $data_sr);
            if ($bolpp) {
                
                $xim = explode('.', $im);
                if (isset($xim[1]) && !empty($xim[1])) {
                    $thumbimg = $xim[0].'_thumb.'.$xim[1];
//                    echo $im . "<br />";
//                    echo $thumbimg; die();
                    unlink("./assets/uploads/post/".$im);
                    unlink("./assets/uploads/post/".$thumbimg);
                }
                
            } else {
                $this->session->set_flashdata('error', 'Cannot delete image!!');
            }
            redirect(site_url('admin/managepost/edit/?page=two&pp='.$ppidx));
            
        } else {
            $this->session->set_flashdata('error', 'Access denied!!');
            redirect(site_url('admin/managepost?page=two'));
        }
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
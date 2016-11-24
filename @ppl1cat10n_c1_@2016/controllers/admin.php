<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->viewpage('managepost/index');
    }
    
    public function manageregistration()
    {
        $this->viewpage('managereg/index');
    }

    public function viewpage($page = 'index', $data = array())
    {
        $page1 = 'one';
        if ($this->input->get('page')) {
            $page1 = $this->input->get('page');
        }
        $data['page1'] = $page1;
        
        echo $this->load->view('admin/header', $data, true);
        echo $this->load->view('admin/menu', $data, true);
        echo $this->load->view('admin/' . $page, $data, true);
        echo $this->load->view('admin/footer', $data, true);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('utama');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
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
        $data['page1'] = $page1;

        echo $this->load->view('utama/header', $data, true);
        echo $this->load->view('utama/' . $menu, $data, true);
        echo $this->load->view('utama/' . $page, $data, true);
        echo $this->load->view('utama/footer', $data, true);
    }

    public function index() {
        $this->load->model('m_post_page');
        $data['post_page'] = $this->m_post_page->getAll();
        $this->viewpage('index', $data);
    }

    public function loginpage() {
        $this->viewpage('login', '', 'menulogin');
    }
    
    public function loginprocess() {
        redirect(site_url('admin'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $crud = new grocery_CRUD();
        
        $crud->set_table('post_page');
        $crud->display_as('pp_title', 'Title')
                ->display_as('pp_post', 'Post')
                ->display_as('pp_priority', 'Post Priority (Top: 1)');
        $crud->columns('pp_title', 'pp_priority', 'pp_datetime');
        $crud->fields('pp_title', 'pp_post', 'pp_priority');
        $crud->callback_before_insert(array($this, 'post_page_add_date'));
        
        $data = $crud->render();
        
        $this->viewpage('managepost/index', $data);
    }
    
    function post_page_add_date($post_array) {
        $date = date('Y-m-d H:i:s');
        $post_array['pp_datetime'] = $date;
        return $post_array;
    }     
    
    public function manageregistration()
    {
        $this->viewpage('managereg/index');
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
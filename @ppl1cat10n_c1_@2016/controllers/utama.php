<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller 
{
    
	public function index()
	{
		$this->load->view('utama/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
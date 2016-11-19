<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Site Sentry security library for Code Igniter applications
 * Author: James Nicol, Glossopteris Web Designs & Development, www.glossopteris.com, April 2006
 *
 *
 */

class Site_sentry {

    function Site_sentry() {
        $this -> obj = &get_instance();
    }
	
	function is_logged_in()
	{
		if($this -> obj -> session)
		{
			if($this -> obj -> session -> userdata('logged_in')){
				return TRUE;
			}
			else
				return FALSE;												 
		}else
		{
			return FALSE;
		}
	}
	
	function login_routine($user='', $pass='')
	{
		$CI = $this -> obj;
		
		$CI -> load -> library('encrypt');
		
		$logged_in = false;
		
		//logging example below :-
		
		//echo $enc = $CI->encrypt->encode($pass);
		//echo '<br>'.$CI->encrypt->decode($enc);
		/*
		$CI->db->select('stu_matricNo');
		$CI->db->where("stu_matricNo",$user);
		$CI->db->where("stu_pass",$pass);
		$query = $CI->db->get('student');
		
		$row_stud = $query->num_rows();
		
		$CI->db->select('st_number');
		$CI->db->where("st_number",$user);
		$CI->db->where("st_password", $pass);
		$query = $CI->db->get('staff');
		
		$row_staff = $query->num_rows();
		
		//login student
		if($row_stud > 0)
		{
			$CI->db->select('stu_id, stu_matricNo, stu_name, stu_sem, course_id');
			$CI->db->where("stu_matricNo",$user);
			$query = $CI->db->get("student");
			
			foreach($query->result() as $row)
			{
				  $logged_in = true;
				  $data_session["smp_id"] = $row->stu_id;
				  $data_session["smp_userid"] = $row->stu_matricNo;
				  $data_session["smp_username"] = $row->stu_name;
				  $data_session["smp_sem"] = $row->stu_sem;
				  $data_session["smp_courseid"] = $row->course_id;
				  $data_session["smp_level"] = $CI->config->item("stu_level");
				  $data_session["logged_in"] = true;
				  
				  $CI->session->set_userdata($data_session);
			}
			
		}
		else if($row_staff > 0)
		{
			$CI->db->select("st_id, st_number, st_position, st_name, faculty_id");
			$CI->db->where("st_number",$user);
			$query = $CI->db->get("staff");
			
			foreach($query->result() as $row)
			{
				$logged_in = true;
				$data_session["smp_id"] = $row->st_id;
				$data_session["smp_userid"] = $row->st_number;
				$data_session["smp_username"] = $row->st_name;
				$data_session["smp_position"] = $row->st_position;
				$data_session["smp_courseid"] = $row->faculty_id;
				$data_session["smp_level"] = $CI->config->item("sta_level");
				$data_session["logged_in"] = true;
				  
				$CI->session->set_userdata($data_session);
			}
		}
		//*/
		
		return $logged_in;
		
	}

}

?>
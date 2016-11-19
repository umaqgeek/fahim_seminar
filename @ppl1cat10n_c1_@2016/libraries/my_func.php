<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Func {
	
	public function __construct(){
		$this->obj = &get_instance();
	}
	
	public function getFace($menubar, $content) {
		$CI = $this->obj;
		$data['menu_content'] = $menubar;
		$data['main_content'] = $content;
		$CI->load->view('v_main',$data);
	}
	
	public function getAmil($am_id=null)
	{
		$CI = $this->obj;
		$am = $CI->m_amil->get($am_id);
		if(!empty($am))
		return $am[0]->am_name;
	}

	public function getPurityDesc($pu_id=null)
	{
		$CI = $this->obj;
		$pu = $CI->m_purity->get($pu_id);
		if(!empty($pu))
		return $pu[0]->pu_desc;
	}

	//function definition goes after here
	public function getTransactionStatus($ts_id) {
		$CI = $this->obj;
		$ts = $CI->m_transaction_status->get($ts_id);
		if ($ts) {
			return $ts[0]->ts_desc;
		} else {
			return '-';
		}
	}
	
	public function getCurrency() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_currency_type;
		} else {
			return 'MYR';
		}
	}
        
        public function getGST() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_gst_rate;
		} else {
			return 0.06;
		}
	}
        
        public function getMintingMaximum() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_minting_maximum;
		} else {
			return 100.00;
		}
	}
        
        public function getMinimumTrans() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_minimum_trans;
		} else {
			return 1.00;
		}
	}
        
        public function getAdminBankAccount() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_admin_bank_account;
		} else {
			return "04042010006119";
		}
	}
        
        public function getAdminBankName() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_admin_bank_name;
		} else {
			return "Koperasi DinarPal Melaka Berhad";
		}
	}
        
        public function getMaintenance() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
                        if ($dc[0]->dc_maintenance == 1) {
                            return true;
                        } else {
                            return false;
                        }
		} else {
			return false;
		}
	}
        
        public function getCommissionGramRate($it_id=1, $weight=0) {
		$CI = $this->obj;
		$it = $CI->m_item_type->get($it_id);
		if (isset($it) && !empty($it)) {
			$rate_gram = $it[0]->it_comm_rate_gram;
                        $rate_money = $it[0]->it_comm_rate_money;
                        $pay_rate = ($rate_money * 1.0 / $rate_gram) * $weight;
                        return $pay_rate;
		} else {
			return 1.00;
		}
	}
        
        public function getVerificationRate() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_verification_rate;
		} else {
			return 10.00;
		}
	}
        
        public function getGeneologyRate() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
		if (isset($dc) && !empty($dc)) {
			return $dc[0]->dc_geneology_rate;
		} else {
			return 0.10;
		}
	}
        
        public function getMeAdminHQ() {
		$CI = $this->obj;
		$dc = $CI->m_dinarpal_config->getAll();
                $me_username_hq = (isset($dc) && !empty($dc)) ? ($dc[0]->dc_hq_username) : ("dphq");
                $me_hq = $CI->m_members->getByName($me_username_hq);
                $me_id_hq = (isset($me_hq) && !empty($me_hq)) ? ($me_hq[0]->me_id) : (0);
                return $me_id_hq;
	}
	
	public function trim_array($arr) {
		$newArr = array();
		foreach ($arr as $key => $ar) {
			if (empty($ar) || NULL == $ar || '' == $ar) {
				$newArr[$key] = '-';
			} else {
				$newArr[$key] = strtoupper($ar);
			}
		}
		return $newArr;
	}
	
	public function pemecahArRahnu($code, $stat) {
		if ($stat == 'PP') {
			$codes = $code[2].$code[3].$code[4];
			return number_format($codes);
		}
		return 0;
	}
	
	public function getMe($me_id, $me_to, $me_from) {
		if ($me_id == $me_to) {
			return $me_from;
		} else if ($me_id == $me_from) {
			return $me_to;
		} else {
			return 0;
		}
	}
        
        public function isInputValidation_array($arr=array(), $field=array()) {
            $bol = true;
            $output = array();
            foreach ($arr as $akey => $aval) {
                $bol_check = false;
                if (!empty($field)) {
                    foreach ($field as $bkey => $bval) {
                        if ($akey == $bkey) {
                            $bol_check = true;
                            break;
                        }
                    }
                } else {
                    $bol_check = true;
                }
                if ($bol_check) {
                    $bol = $this->isInputValidation($aval);
                    if ($bol == false) {
                        $field_name = explode("_", $akey);
                        $output[] = "Field " . $field_name[1] . " is blank!";
                    }
                }
            }
            return $output;
        }
        
        public function isInputValidation($input="") {
            $bol = true;
            if ("-" == $input || "" == $input) {
                $bol = false;
            }
            return $bol;
        }
	
	public function paymentToFrom($me_id, $me_to, $me_from) {
		if ($me_to == 0 || $me_from == 0) {
                        if ($me_to == 0) {
                            return 'To';
                        } else {
                            return 'From';
                        }
                }
                if ($me_id == $me_to && $me_id == $me_from && $me_to == $me_from) {
                        return 'Self';
		} else if ($me_id == $me_to) {
			return 'From';
		} else if ($me_id == $me_from) {
			return 'To';
                } else {
			return '-';
		}
	}

	public function getItemTypeName($id){
		$CI = $this->obj;
		$CI->db->select('it_name');
		$CI->db->from('item_type it');
		$CI->db->where('it.it_id', $id);
		$q = $CI->db->get();
		if($q->num_rows() > 0) {
			foreach($q->result() as $r) {
				return $r->it_name;
			}

		}
	}


	public function getItemTypeChildName($id){
		$CI = $this->obj;
		$CI->db->select('itc_name');
		$CI->db->from('item_type_child itc');
		$CI->db->where('itc.itc_id', $id);
		$q = $CI->db->get();
		if($q->num_rows() > 0) {
			foreach($q->result() as $r) {
				return $r->itc_name;
			}

		}
	}
        
        public function getAtId($itc_id) {
                $CI = $this->obj;
                $itc = $this->m_item_type_child->get($itc_id);
                if (isset($itc) && !empty($itc)) {
                    return $itc[0]->it_id;
                } else {
                    return 0;
                }
        }

	public function getItemItctName($id){
		$CI = $this->obj;
		$CI->db->select('itct_name');
		$CI->db->from('itc_type itct');
		$CI->db->where('itct.itct_id', $id);
		$q = $CI->db->get();
		if($q->num_rows() > 0) {
			foreach($q->result() as $r) {
				return $r->itct_name;
			}

		}
	}

	public function getAccountTypeName($at_id)
	{
		$CI = $this->obj;
		$CI->db->select('at_desc');
		$CI->db->from('account_type at');
		$CI->db->where('at.at_id', $at_id);
		$q = $CI->db->get();
		if($q->num_rows() > 0) {
			foreach($q->result() as $r) {
				return $r->at_desc;
			}

		}
	}
	
	
	public function isValidPassword($pwd) {
		$error = '';
		if( strlen($pwd) < 8 ) {
			$error .= "Password too short!<br />";
		}
		if( strlen($pwd) > 20 ) {
			$error .= "Password too long!<br />";
		}
		
		if( !preg_match("#[0-9]+#", $pwd) ) {
			$error .= "Password must include at least one number!<br />";
		}
		if( !preg_match("#[a-z]+#", $pwd) ) {
			$error .= "Password must include at least one letter!<br />";
		}
		if( !preg_match("#[A-Z]+#", $pwd) ) {
			$error .= "Password must include at least one CAPS!<br />";
		}
		if( !preg_match("#\W+#", $pwd) ) {
			$error .= "Password must include at least one symbol!<br />";
		}
		
		if(isset($error) && $error != ''){
			return "Password validation failure ( your choise is weak ) <br /><br />$error";
		} else {
			return "Your password is strong.";
		}
	}
	
	public function format_digit($num) {
		if ($num < 10) {
			return "0000".$num;
		} else if ($num < 100) {
			return "000".$num;
		} else if ($num < 1000) {
			return "00".$num;
		} else if ($num < 10000) {
			return "0".$num;
		} else {
			return $num;
		}
	}

	public function getGrandTotalWeight($itct_id,$q)
	{
		$CI = $this->obj;
		$CI->db->select('itct.itct_weight');
		$CI->db->from('itc_type itct');
		$CI->db->where('itct.itct_id', $itct_id);
		$qz = $CI->db->get();
		
		$weight=0;
		if($qz->num_rows() > 0) {

			foreach($qz->result() as $r) {
				$weight= $r->itct_weight;
			}
			
			return $weight*$q;
		}
	}
	
	public function date_to_sql_time($date, $time) {
		$tarikh = explode('/', $date);
		return $tarikh[2] . '-' . $tarikh[1] . '-' . $tarikh[0] . ' ' . date('H:i:s');
	}
	
	public function sql_time_to_date($date) {
		$tarikh1 = explode(' ', $date);
		$tarikh2 = explode('-', $tarikh1[0]);
		return $tarikh2[2] . '/' . $tarikh2[1] . '/' . $tarikh2[0];
	}
	
	public function sql_time_to_datetime($date) {
		$tarikh1 = explode(' ', $date);
		$tarikh2 = explode('-', $tarikh1[0]);
                if (isset($tarikh2[2])) {
                    if ($tarikh2[2] != '00') {
                        return $tarikh2[2] . '/' . $tarikh2[1] . '/' . $tarikh2[0] . ' ' . $tarikh1[1];
                    } else {
                        return "";
                    }
                } else {
                    return "";
                }
	}
        
        public function get_next_day($year=0, $month=0, $day=0) {
            $year = (is_numeric($year)) ? ($year) : (0);
            $month = (is_numeric($month)) ? ($month) : (0);
            $day = (is_numeric($day)) ? ($day) : (0);
            $nexttime = date('Y-m-d H:i:s', strtotime('+'.$year.' year, +'.$month.' month, +'.$day.' day'));
            return $nexttime;
        }
	
	public function trim_username($me_firstname) {
		return strtolower(str_replace(" ", "", $me_firstname));
	}
	
	public function do_upload($name='', $upload_path='./assets/uploads/profile/', 
                $allowed_types='gif|jpg|jpeg|png|pdf|txt|text|doc|docx|word|xls|xlsx')
	{
		$CI = $this->obj;
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = $allowed_types;
		$config['max_size']	= '1000000';
//		$config['max_width']  = '1500';
//		$config['max_height']  = '2000';
                $config['encrypt_name'] = TRUE;

		$CI->load->library('upload');
		$CI->upload->initialize($config);

		$data = '';

		if ( ! $CI->upload->do_upload($name))
		{
			$data = array('error' => $CI->upload->display_errors());

			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $CI->upload->data());
                        
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $upload_path . $data['upload_data']['file_name'];
                        $conf['create_thumb'] = TRUE;
                        $conf['maintain_ratio'] = TRUE;
                        $conf['width'] = 100;
                        $conf['height'] = 75;
                        $CI->load->library('image_lib', $conf);
                        $CI->image_lib->resize();

                        //$this->load->view('upload_success', $data);
		}
		
		return $data;
	}
	
	public function dinarpal_encrypt($text) {
		$CI = $this->obj;
		//$data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $CI->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, '1');
        //return base64_encode($data);
		$val1 = $CI->encrypt->encode($text);
		$val2 = '';
		for ($i=0; $i<strlen($val1); $i++) {
			if ($val1[$i] == '/') {
				$val2 .= '_';
			} else if ($val1[$i] == '+') {
				$val2 .= '-';
			} else {
				$val2 .= $val1[$i];
			}
		}
		return $val2;
	}
	
	public function dinarpal_decrypt($text) {
		$CI = $this->obj;
		//$text = base64_decode($text);
        //return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $CI->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, '1');
		$val1 = '';
		for ($i=0; $i<strlen($text); $i++) {
			if ($text[$i] == '_') {
				$val1 .= '/';
			} else if ($text[$i] == '-') {
				$val1 .= '+';
			} else {
				$val1 .= $text[$i];
			}
		}
		$val2 = $CI->encrypt->decode($val1);
		return $val2;
	}
        
        public function getUploadPath($path='items') {
            return base_url()."assets/uploads/".$path."/";
        }
        
        public function getRandomVal($type='alnum', $length=16) {
            return random_string($type, $length);
        }
        
        public function getCaptchaIndex() {
            $CI = $this->obj;
            $index = random_string('numeric');
            $index = $index % 16;
            return $index;
        }
        
        public function isCaptcha($index, $str) {
            $cArr = array(
                "ZKW4",                
                "BMVHKY",                
                "944531",                
                "7d6bf",                
                "RAE3",                
                "3-2 parks",                
                "advses",                
                "3nc9z",                
                "quxg4h",                
                "2CCEX",                
                "2PVCb",                
                "slythygomi",                
                "trustother",                
                "apricot",                
                "pmymku"                
            );
            return (strcmp(strtoupper($cArr[$index-1]), strtoupper($str)) == 0);
        }
        
        public function getMeAdmin($sl_id) {
            $CI = $this->obj;
            $me_admin = $CI->m_members->getSL($sl_id);
            $me_id_admin = (isset($me_admin) && !empty($me_admin)) ? ($me_admin[0]->me_id) : (0);
            return $me_id_admin;
        }
        
        public function url_https($url) {
            return str_replace('http://', 'https://', $url);
        }
        
        public function getNoImage($type=-1) {
//            return "NoImageAvailable.png";
            return "No_image_available.png";
        }
        
        public function QRCode($str) {
            include('QRGenerator.php');
            $ayat = (isset($str) && !empty($str)) ? ($str) : ("-");
            $qrcode = new QRGenerator($ayat, 100);  // 100 is the qr size
            $code = $qrcode->generate();
            print "<a href='" . $code . "' target='_blank'><img src='". $code ."'></a>";
        }
        
        public function QRCode2($str) {
            include('QRGenerator.php');
            $ayat = (isset($str) && !empty($str)) ? ($str) : ("-");
            $qrcode = new QRGenerator($ayat, 100);  // 100 is the qr size
            $code = $qrcode->generate();
            return "<span style='color: #FAD1A6;'><img width='150' height='150' src='". $code ."'></span>";
        }
        
        public function get_config_email() {
            /*
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'webmail.dinarpal.com',
                'smtp_port' => 25,
                'smtp_user' => 'support@dinarpal.com',
                'smtp_pass' => '#@!321Cba',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
            );
            //*/
            /*
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'umar@tuffah.info',
                'smtp_pass' => 'kalimas123',
                'mailtype'  => 'html', 
                'charset'   => 'UTF-8'
            );
            //*/
            //*
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'dinarpal13@gmail.com',
                'smtp_pass' => 'Abc123!@#',
                'mailtype'  => 'html', 
                'charset'   => 'UTF-8'
            );
            //*/
            /*
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'umaqgeek@gmail.com',
                'smtp_pass' => '#@!321Cba',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
            );
            //*/
            return $config;
        }
        
        //send email activation
        function send_email($to, $subject, $msg) {
            
            $to = $to . ", dinarpal13@gmail.com";
            
//            print_r($to); die();
            
            $this->CI = & get_instance();

            $config = $this->get_config_email();
            
            $this->CI->load->library('email', $config);
            $this->CI->email->set_newline("\r\n");
            $this->CI->email->from('support@dinarpal.com', 'DinarPal');
            $this->CI->email->to($to);

            $this->CI->email->subject($subject);

            $message = $msg;
            $this->CI->email->message($message);

            // Set to, from, message, etc

            if (ENVIRONMENT != 'development') {
                if (!$this->CI->email->send()) {
    //                print_r($this->CI->email->print_debugger());
                    return false;
                } else {
                    return true;
                }
            }
            return true;
        }
        
        function getRounded($amount) {
//            echo $amount . "<br />";
            $t1 = $amount * 100.0000;
//            echo $t1 . "<br />";
            $t2 = ceil($t1);
//            echo $t2 . "<br />";
            $t3 = $t2 * 1.0 / 10.0000;
//            echo $t3 . "<br />";
            $t4 = floor($t3);
//            echo $t4 . "<br />";
            $t5 = $t4 * 1.0 / 10.0000;
//            echo $t5 . "<br />";
            return $t5;
        }
        
        function getFormulaPts($me_id) {
            $CI = $this->obj;
            $points = $CI->m_members->getPoints($me_id);
            $points_deduct = $CI->m_members->getAccountAdjustment($me_id);
            $points_deduct2 = $CI->m_members->getPointSelfTransfer($me_id);
            $pts = 0.00;
            $pts_deduct = 0.00;
            $pts_deduct2 = 0.00;
            if (isset($points) && !empty($points)) {
                foreach ($points as $pt) {
                    $pts += $pt->tr_amount;
                }
            }
            if (isset($points_deduct) && !empty($points_deduct)) {
                foreach ($points_deduct as $pt_d) {
                    $pts_deduct += $pt_d->tr_amount;
                }
            }
            if (isset($points_deduct2) && !empty($points_deduct2)) {
                foreach ($points_deduct2 as $pt_d2) {
                    $pts_deduct2 += $pt_d2->tr_amount;
                }
            }
            $pts -= $pts_deduct;
            $pts -= $pts_deduct2;
            
            // gain 100 points per 1 downline
            $geneology_aff = $CI->m_geneology_aff->getAll($me_id);
            $num_downline = sizeof($geneology_aff);
            $pts_downline = $num_downline * 100;
            $pts += $pts_downline;
            
            return $pts;
        }
        
        function getFormulaRank($i) {
//            $formula = 500 * pow(10, $i-1);
            if ($i == 1) {
                $formula = 100;
            } else if ($i >= 2 && $i <= 18) {
                $formula = 90 * pow(10, $i-1);
            } else {
                $formula = 1000 * pow(10, $i-1);
            }
            return $formula;
        }
        
        function getFormulaX($pts) {
            $X = 0;
            $B = 0;
            $A = 0;
            if ($pts > 0) {
                for ($i = 1; $i <= $this->getMaximumRank(); $i++) {
                    $X = $this->getFormulaRank($i);
                    $B += $X;
                    $A = $B - $X;
                    if ($pts > $A && $pts <= $B) {
                        break;
                    }
                }
            } else {
                $X = $this->getFormulaRank(1);
            }
            return $X;
        }
        
        function getFormulaB($pts) {
            $X = 0;
            $B = 0;
            $A = 0;
            if ($pts > 0) {
                for ($i = 1; $i <= $this->getMaximumRank(); $i++) {
                    $X = $this->getFormulaRank($i);
                    $B += $X;
                    $A = $B - $X;
                    if ($pts > $A && $pts <= $B) {
                        break;
                    }
                }
            } else {
                $X = $this->getFormulaRank(1);
                $B += $X;
            }
            return $B;
        }
        
        function getFormulaA($pts) {
            $X = 0;
            $B = 0;
            $A = 0;
            if ($pts > 0) {
                for ($i = 1; $i <= $this->getMaximumRank(); $i++) {
                    $X = $this->getFormulaRank($i);
                    $B += $X;
                    $A = $B - $X;
                    if ($pts > $A && $pts <= $B) {
                        break;
                    }
                }
            } else {
                $X = $this->getFormulaRank(1);
                $B += $X;
                $A = $B - $X;
            }
            return $A;
        }
        
        function getMaximumRank() {
            return 18;
        }
        
        function getMembersRank($me_id) {
            $CI = $this->obj;
            $pts = $this->getFormulaPts($me_id);
            $lvl = $this->getLevel($pts);
            $ranks = $CI->m_ranks->get($lvl);
            if ($me_id == 7) { //arash
                $ranks = $CI->m_ranks->get(19);
            } else if ($me_id == 6) { //umaq
                $ranks = $CI->m_ranks->get(20);
            }
//            echo $me_id.' '.$lvl.' '.$ranks;
            return $ranks;
        }
        
        function getLevel($pts) {
            $X = 0;
            $B = 0;
            $A = 0;
            $lvl = 1;
            if ($pts > 0) {
                for ($i = 1; $i <= $this->getMaximumRank(); $i++) {
                    $X = $this->getFormulaRank($i);
                    $B += $X;
                    $A = $B - $X;
                    if ($pts > $A && $pts <= $B) {
                        $lvl = $i;
                        break;
                    }
                }
            } else {
                $X = $this->getFormulaRank(1);
                $B += $X;
                $A = $B - $X;
                $lvl = 1;
            }
            return $lvl;
        }
        
        function getSalutationGender($me_id) {
            $CI = $this->obj;
            $me = $CI->m_members->get($me_id);
            $g_id = (isset($me) && !empty($me)) ? ($me[0]->g_id) : (1);
            if ($g_id == 1) {
                return "his";
            } else if ($g_id == 2) {
                return "her";
            } else {
                return "its";
            }
        }
        
        function getSalutationGender2($me_id) {
            $CI = $this->obj;
            $me = $CI->m_members->get($me_id);
            $g_id = (isset($me) && !empty($me)) ? ($me[0]->g_id) : (1);
            if ($g_id == 1) {
                return "he";
            } else if ($g_id == 2) {
                return "she";
            } else {
                return "it";
            }
        }
        
        function getScaleNumber($num) {
            if ($num >= 100000) {
                $x = round($num);
                $x_number_format = number_format($x);
                $x_array = explode(',', $x_number_format);
                $x_parts = array('k', 'm', 'b', 't', 'q', 'qt');
                $x_count_parts = count($x_array) - 1;
                $x_display = $x;
//                $x_display = $x_count_parts;
                $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                $x_display = number_format($x_display);
                $x_display .= $x_parts[$x_count_parts - 1];
            } else {
                $x_display = number_format($num);
            }
            return $x_display;
        }
        
        function getItemLife($start_date, $end_date) {
            $todaysDate = date('Y-m-d H:i:s');
            $t_a = strtotime($start_date);
            $t_x = strtotime($todaysDate);
            $t_b = strtotime($end_date);
            if (isset($t_a) && !empty($t_a) && isset($t_b) && !empty($t_b)) {
                $b_a = $t_b - $t_a;
                $b_b = $t_b - $t_x;
                $p_a = ($b_b * 1.0 / $b_a) * 100;
                return $p_a;
            } else {
                return 0;
            }
        }
        
        function getItemLifeSpan($v_id) {
            $CI = $this->obj;
            $kc = $CI->m_keep_child->getVault($v_id);
            $k_startdate = "";
            $k_enddate = "";
            if (isset($kc) && !empty($kc)) {
                if (isset($kc[0]->k_startdate) && !empty($kc[0]->k_startdate)) {
                    $k_startdate = $kc[0]->k_startdate;
                }
                if (isset($kc[0]->k_enddate) && !empty($kc[0]->k_enddate)) {
                    $k_enddate = $kc[0]->k_enddate;
                }
            }
            $itemLife = $this->getItemLife($k_startdate, $k_enddate);
            $str = $this->getLifeSpan($itemLife);
            return $str;
        }
        
        function getLifeSpan($num) {
            $color = "none";
            if ($num <= 20) {
                $color = "#a00";
            } else if ($num > 20 && $num <= 50) {
                $color = "#ea0";
            } else if ($num > 50 && $num <= 80) {
                $color = "none";
            } else {
                $color = "#0a0";
            }
            $str = "<div class=\"progress\" style=\"background-color: rgba(0,0,0,0.1);\">
                    <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"" . number_format($num, 2) . "\"
                        aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"background-color: " . $color . "; width:" . number_format($num, 2) . "%\">
                        " . number_format($num, 2) . "% time left
                    </div>
                </div>";
            return $str;
        }
        
        function getAllItemLifeSpan($me_id) {
            $CI = $this->obj;
            $vault = $CI->m_vault->getAll_personalDetail(3, $me_id);
            $avg = 0.00;
//            $num_item = sizeof($vault);
            $num_item = 0;
            if (isset($vault) && !empty($vault)) {
                foreach ($vault as $v) {
                    $ivmt_id = $v->ivmt_id;
                    if ($ivmt_id != 2) {
                        $num_item += 1;
                        $kc = $CI->m_keep_child->getVault($v->v_id);
                        $k_startdate = "";
                        $k_enddate = "";
                        if (isset($kc) && !empty($kc)) {
                            if (isset($kc[0]->k_startdate) && !empty($kc[0]->k_startdate)) {
                                $k_startdate = $kc[0]->k_startdate;
                            }
                            if (isset($kc[0]->k_enddate) && !empty($kc[0]->k_enddate)) {
                                $k_enddate = $kc[0]->k_enddate;
                            }
                        }
                        $itemLife = $this->getItemLife($k_startdate, $k_enddate);
                        $avg += $itemLife;
                    }
                }
                if ($num_item > 0) {
                    $avg /= $num_item;
                } else {
                    $avg = 0;
                }
            }
            return $this->getLifeSpan($avg);
        }
        
        function getMintingIcon($v_id, $stat_notice=1) {
            $CI = $this->obj;
            $vault = $CI->m_vault->get($v_id);
            if (isset($vault) && !empty($vault)) {
                $ivmt_id = $vault[0]->ivmt_id;
                $gram_max = $this->getMintingMaximum();
                $notice = "This item is part of Gold Affordable Campaign. ";
                if ($stat_notice == 2) {
//                    $notice .= "This item should be made till it reaches "
//                            . number_format($gram_max, 2)
//                            . " grams before it can be withdrawn as a solid item.";
                } else if ($stat_notice == 3) {
                    $notice .= "It does not subject to the keep fee.";
                }
                if ($ivmt_id == 2) {
                    return "<span class='top-tooltip bottom-tooltip' data-tooltip='".$notice."'>"
                            . "<img width='25' height='25' src='".base_url()."assets/images/minting3.png' />"
                            . "</span>";
                } else {
                    return "";
                }
            } else {
                return "";
            }
        }
        
        function getVaucher($code) {
            $CI = $this->obj;
            $str = $this->dinarpal_decrypt($code);
//            echo $str;
            $strpecah = explode('|', $str);
            $v_id = 0;
            $v_cert = '-';
            if (isset($strpecah[0]) && !empty($strpecah[0])) {
                $strpecah2 = explode('V', $strpecah[0]);
                if (isset($strpecah2[1]) && !empty($strpecah2[1])) {
                    $v_id = $strpecah2[1];
                }
            }
            if (isset($strpecah[1]) && !empty($strpecah[1])) {
                $v_cert = $strpecah[1];
            }
//            echo $v_id . ':' . $v_cert;
            $vault = $CI->m_vault->getVaucher($v_id, $v_cert);
            if (isset($vault) && !empty($vault)) {
                $v = array();
                foreach ($vault[0] as $vkey => $vval) {
                    $v[$vkey] = $vval;
                }
                return $v;
            } else {
                return array();
            }
        }
        
        function getVaultImages($v_id) {
            $CI = $this->obj;
            $vault = $CI->m_vault->get($v_id);
            $imgs = "";
            if (isset($vault) && !empty($vault)) {
                $items = $vault[0];
                $noImage = $this->getNoImage(1);
                $vimg1 = (isset($items->v_image) && !empty($items->v_image) && $items->v_image != null && $items->v_image != "") ?
                        ($items->v_image) : ($noImage);
                $vimg2 = (isset($items->v_image2) && !empty($items->v_image2) && $items->v_image2 != null && $items->v_image2 != "") ?
                        ($items->v_image2) : ($noImage);
                $vimg3 = (isset($items->v_image3) && !empty($items->v_image3) && $items->v_image3 != null && $items->v_image3 != "") ?
                        ($items->v_image3) : ($noImage);
                $vimg4 = (isset($items->v_image4) && !empty($items->v_image4) && $items->v_image4 != null && $items->v_image4 != "") ?
                        ($items->v_image4) : ($noImage);
                $vimg5 = (isset($items->v_image5) && !empty($items->v_image5) && $items->v_image5 != null && $items->v_image5 != "") ?
                        ($items->v_image5) : ($noImage);
                if (isset($items->v_image) && !empty($items->v_image) && $items->v_image != null && $items->v_image != "" && $items->v_image != $noImage) {
                    $imgs .= '<a onclick="magicToolboxOnChangeSelector(this);" href="' . base_url() 
                            . 'assets/uploads/items/' . $vimg1 
                            . '" rel="zoom-id:MagicZoomPlusImage14063;caption-source:a:title;zoom-width:550;zoom-height:550;show-title:false;" '
                            . 'rev="'. base_url() . 'assets/uploads/items/' 
                            . $vimg1 .'" class="MagicThumb-swap" style="outline: none; display: inline-block;">
                            <img src="'. base_url() . 'assets/uploads/items/'. $vimg1 
                            . '" alt="" style="max-height: 50px; max-width: 50px"></a>';
                } 
                if (isset($items->v_image2) && !empty($items->v_image2) && $items->v_image2 != null && $items->v_image2 != "" && $items->v_image2 != $noImage) {
                    $imgs .= '<a onclick="magicToolboxOnChangeSelector(this);" href="' . base_url() 
                            . 'assets/uploads/items/' . $vimg2 
                            . '" rel="zoom-id:MagicZoomPlusImage14063;caption-source:a:title;zoom-width:550;zoom-height:550;show-title:false;" '
                            . 'rev="'. base_url() . 'assets/uploads/items/' 
                            . $vimg2 .'" class="MagicThumb-swap" style="outline: none; display: inline-block;">
                            <img src="'. base_url() . 'assets/uploads/items/'. $vimg2 
                            . '" alt="" style="max-height: 50px; max-width: 50px"></a>';
                } 
                if (isset($items->v_image3) && !empty($items->v_image3) && $items->v_image3 != null && $items->v_image3 != "" && $items->v_image3 != $noImage) {
                    $imgs .= '<a onclick="magicToolboxOnChangeSelector(this);" href="' . base_url() 
                            . 'assets/uploads/items/' . $vimg3 
                            . '" rel="zoom-id:MagicZoomPlusImage14063;caption-source:a:title;zoom-width:550;zoom-height:550;show-title:false;" '
                            . 'rev="'. base_url() . 'assets/uploads/items/' 
                            . $vimg3 .'" class="MagicThumb-swap" style="outline: none; display: inline-block;">
                            <img src="'. base_url() . 'assets/uploads/items/'. $vimg3 
                            . '" alt="" style="max-height: 50px; max-width: 50px"></a>';
                } 
                if (isset($items->v_image4) && !empty($items->v_image4) && $items->v_image4 != null && $items->v_image4 != "" && $items->v_image4 != $noImage) {
                    $imgs .= '<a onclick="magicToolboxOnChangeSelector(this);" href="' . base_url() 
                            . 'assets/uploads/items/' . $vimg4 
                            . '" rel="zoom-id:MagicZoomPlusImage14063;caption-source:a:title;zoom-width:550;zoom-height:550;show-title:false;" '
                            . 'rev="'. base_url() . 'assets/uploads/items/' 
                            . $vimg4 .'" class="MagicThumb-swap" style="outline: none; display: inline-block;">
                            <img src="'. base_url() . 'assets/uploads/items/'. $vimg4 
                            . '" alt="" style="max-height: 50px; max-width: 50px"></a>';
                } 
                if (isset($items->v_image5) && !empty($items->v_image5) && $items->v_image5 != null && $items->v_image5 != "" && $items->v_image5 != $noImage) {
                    $imgs .= '<a onclick="magicToolboxOnChangeSelector(this);" href="' . base_url() 
                            . 'assets/uploads/items/' . $vimg5 
                            . '" rel="zoom-id:MagicZoomPlusImage14063;caption-source:a:title;zoom-width:550;zoom-height:550;show-title:false;" '
                            . 'rev="'. base_url() . 'assets/uploads/items/' 
                            . $vimg5 .'" class="MagicThumb-swap" style="outline: none; display: inline-block;">
                            <img src="'. base_url() . 'assets/uploads/items/'. $vimg5 
                            . '" alt="" style="max-height: 50px; max-width: 50px"></a>';
                } 
            }
            return $imgs;
        }
        
        function getFee($ft_id, $amount=1) {
            $CI = $this->obj;
            $ft = $CI->m_fee_type->get($ft_id);
            $ft_price = 0.00;
            if (isset($ft) && !empty($ft)) {
                $ft_type = $ft[0]->ft_type;
                $ft_price = $ft[0]->ft_price;
                if ($ft_type == 'STATIC') {
                    $ft_price = $ft_price;
                } else if ($ft_type == 'DYNAMIC') {
                    $ft_price = $ft_price * $amount;
                }
            }
            return $ft_price;
        }
        
        function getShortString($str, $limit=20) {
            $s = "";
            for ($i=0; $i<$limit && $i<strlen($str); $i++) {
                $s .= $str[$i];
            }
            if (strlen($str) >= $limit) {
                $s .= "...";
            }
            return $s;
        }
        
        function send_email_allAdmins($subject, $msg, $tr_datetime) {
            $CI = $this->obj;
            $all_admins = $CI->m_members->getAll_Staff(2);
            if (isset($all_admins) && !empty($all_admins)) {
                foreach ($all_admins as $aa) {
                    // send email
                    $to = $aa->me_email;
                    $msg1 = "[" . $this->sql_time_to_datetime($tr_datetime) . "] " . $msg;
                    $this->send_email($to, $subject, $msg1);
                }
            }
        }
}
?>
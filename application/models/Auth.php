<?php

	class Auth extends CI_model{
		function __construct(){
			parent::__construct();
		}
		public $email;
		public function idUpdate(){
			$this->db->select('unique_id');
			$unique_id = $this->db->get('user')->result_array();
			$totalId = count($unique_id);
			for ($i=0; $i < $totalId; $i++) {
				$data = $unique_id[$i]['unique_id'];
				$count = $i + 1;
				$this->db->query("UPDATE user SET id = '$count' WHERE unique_id = '$data'");
			}
		}
		public function signup($data){
			$this->db->insert('user',$data);
		}
		public function checkEmail($email){
			$this->db->select('user_email');
			$this->db->where('user_email',$email);
			$this->email = $this->db->get('user');

			return $this->email->result_array();

		}

		public function login($data){
			$data = $this->db->get_where('user', array('user_email'=>$data['email'], 'user_pass'=>$data['pass']));

			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}
	}

?>
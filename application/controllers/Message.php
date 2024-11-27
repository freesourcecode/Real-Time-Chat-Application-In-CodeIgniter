<?php
class Message extends CI_controller{
	public function index(){
		if(isset($_SESSION['image'])){
			$data['data'] = $this->Messagemodel->ownerDetails();
			$this->load->view('message/message',$data);
		}else{
			$this->load->view('error/error');
		}
	}
	public function ownerDetails(){
		$res = $this->Messagemodel->ownerDetails();
		print_r(json_encode($res));
	}
	public function allUser(){
		$data['data'] = $this->Messagemodel->allUser();
		$data['last_msg'] = array();
		$this->load->helper('url');
		if(!is_array($data['data'])){
			echo "<p class='text-center'>No user available.</p>";
		}else{
			$count = count($data['data']);
			for($i = 0; $i < $count; $i++){
				$unique_id = $data['data'][$i]['unique_id'];
				$msg = $this->Messagemodel->getLastMessage($unique_id);
				for($j = 0; $j < count($msg); $j++){

					$time = explode(" ",$msg[0]['time']); //00:00:00.0000
					$time = explode(".", $time[1]);//00:00:00
					$time = explode(":",$time[0]);//00 00 00
					if((int)$time[0] == 12){
						$time = $time[0].":".$time[1]." PM";
					}
					elseif((int)$time[0] > 12){
						$time = ($time[0] - 12).":".$time[1]." PM";
					}else{
						$time = $time[0].":".$time[1]." AM";
					}

					array_push($data['last_msg'],array(
						'message' => $msg[0]['message'],
						'sender_id' => $msg[0]['sender_message_id'],
						'receiver_id' => $msg[0]['receiver_message_id'],
						'time' => $time //00:00
					));
				}
			}
			$this->load->view('message/sampleDataShow',$data);
		}
		
	}
	public function getIndividual(){
		$returnVal = $this->Messagemodel->getIndividual($_POST['data']);
		print_r(json_encode($returnVal,true));
	}
	public function logout(){
		$date = $_POST['date'];
		$this->load->helper('url');
		$this->Messagemodel->logoutUser('deactive',$date);
		unset(
			$_SESSION['uniqueid'],
			$_SESSION['username'],
			$_SESSION['image'],
		);
		echo base_url();
	}
	public function setNoMessage(){
		$data['image'] = $_POST['image'];
		$data['name'] = $_POST['name'];
		$this->load->view('message/notmessageyet',$data);
	}
	public function sendMessage(){
		if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
		$jsonDecode = json_decode($_POST['data'],true);
		$uniq = $_SESSION['uniqueid'];
		$arr = array(
			'time' => $jsonDecode['datetime'],
			'sender_message_id' => $uniq,
			'receiver_message_id' => $jsonDecode['uniq'],
			'message' => $jsonDecode['message'],
		);
			$this->Messagemodel->sentMessage($arr);
		}
	}
	public function getMessage(){
		if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
			$data['data'] = $this->Messagemodel->getmessage($_POST['data']);
			$data['image'] = $_POST['image'];
			$this->load->view('message/sampleMessageShow',$data);
		}
	}
	public function updateBio(){
		if($_POST){
			$this->Messagemodel->updateBio($_POST);
		}
	}
	public function blockUser(){
		if(isset($_POST['time']) && isset($_POST['uniq'])){
			$arr = array(
				'blocked_from' => $_SESSION['uniqueid'],
				'blocked_to' => $_POST['uniq'],
				'time' => $_POST['time']
			);
			$this->Messagemodel->blockUser($arr);
			return 1;
		}
	}
	public function getBlockUserData(){
		if(isset($_POST['uniq'])){
			$res = $this->Messagemodel->getBlockUserData($_POST['uniq'],$_SESSION['uniqueid']);
			print_r(json_encode($res));
		}
	}
	public function unBlockUser(){
		if(isset($_POST['uniq'])){
			$from = $_SESSION['uniqueid'];
			$to = $_POST['uniq'];
			$this->Messagemodel->unBlockUser($from, $to);
		}
	}
}


?>
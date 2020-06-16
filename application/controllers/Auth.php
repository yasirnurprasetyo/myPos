<?php
class Auth extends CI_Controller {
	public function login()
	{
		alredyLogin();
		$this->load->view('login');
	}

	public function proses_login()
	{
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])){
			$this->load->model('ModelUser');
			$query = $this->ModelUser->login($post);
			if($query->num_rows() > 0){
				$row = 	$query->row();
				$param = array(
					"userid" => $row->user_id,
					"level" => $row->level
				);
				$this->session->set_userdata($param);
				echo "<script>
					alert('Selamat, login anda berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			}else{
				echo "<script>
					alert('Maaf, login anda gagal username/password anda salah');
					window.location='".site_url('auth/login')."';
				</script>";
			}
		}
	}

	public function logout()
	{
		$param = array('userid','level');
		$this->session->unset_userdata($param);
		redirect('auth/login');
	}
}

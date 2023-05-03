<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()

	{

		parent::__construct();

		$this->load->library('template');
		date_default_timezone_set("Asia/Jakarta");

		// if (!empty($this->session->userdata('login'))) {
		// 	redirect('Auth/login');
		// }
	}

	public function login()
	{
		$data = [
			'title' => 'Login',
		];

		$this->template->loadViews('pages/Auth/login', $data);
	}

	public function registrasi()
	{
		$data = [
			'title' => 'Registrasi',
		];

		$this->template->loadViews('pages/Auth/registrasi', $data);
	}

	public function loginRequest()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => '{field} can not be empty!',
			'valid_email' => '{field} is invalid!',
		]);

		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => '{field} can not be empty!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$dataPost = $this->input->post();

			$users = $this->db->select("*")->from("user")->where("email", $dataPost['email'])->get()->row();
			if (!empty($users)) {
				if ($users->is_active == 1) {
					if (password_verify($dataPost['password'], $users->password)) {
						$sessionData = array(
							'login' => TRUE,
							'users' => $users
						);

						$this->session->set_userdata($sessionData);

						$this->session->set_flashdata("success", 'Login successfully');
						// echo json_encode('ok');
						redirect('Home');
					} else {
						$this->session->set_flashdata("error", 'Login Failed! Email / Password wrong');
						redirect('Auth/login');
					}
				} else {
					$this->session->set_flashdata("error", 'Login Failed! Email inactive');
					redirect('Auth/login');
				}
			} else {
				$this->session->set_flashdata("error", 'Login failed, Email not found');
				redirect('Auth/login');
			}
		}
	}

	public function registrationRequest()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required', [
			'required' => '{field} can not be empty!'
		]);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
			'required' => '{field} can not be empty!',
			'valid_email' => '{field} is invalid!',
			'is_unique' => '{field} already exists in the database!'
		]);

		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[12]|is_unique[user.phone]', [
			'required' => '{field} can not be empty!',
			'min_length' => '{field} minimum 10 Number!',
			'max_length' => '{field} maximum 12 Number!',
			'is_unique' => '{field} already exists in the database!'
		]);

		$this->form_validation->set_rules('address', 'Address', 'trim|required', [
			'required' => '{field} can not be empty!'
		]);

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
			'required' => '{field} can not be empty!',
			'min_length' => '{field} minimum 6 words!'
		]);

		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]', [
			'required' => '{field} can not be empty!',
			'matches' => '{field} not the same as password!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->registrasi();
		} else {
			$dataPost = $this->input->post();

			$user = where_row('user', ['email' => $dataPost['email']]);
			if (empty($user)) {
				$data = [
					'fullname' => $dataPost['fullname'],
					'email' => $dataPost['email'],
					'phone' => $dataPost['phone'],
					'address' => $dataPost['address'],
					'password' => create_pass($dataPost['password']),
					'is_active' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				];

				insert_table('user', $data);

				$this->session->set_flashdata("success", 'Create account successfully!');
				redirect('Auth/login');
			} else {
				$this->session->set_flashdata("error", 'Email already exists in the database!');
				redirect('Auth/registrasi');
			}
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('Auth/login');
	}
}

<?php
	class Vehicles extends CI_Controller{
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('vehicle_name', 'Vehicle_name', 'required');
      		$this->form_validation->set_rules('make', 'Make', 'required');
      		$this->form_validation->set_rules('model', 'Model', 'required');
			$this->form_validation->set_rules('license', 'License', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/register', $data);
				$this->load->view('templates/footer');
			} else {
				$this->vehicle_model->register();
				// Set message
				$this->session->set_flashdata('vehicle_registered', 'The vehicle is now registered and can log in');
				redirect('home');
			}
		}
		// Log in user
		public function login(){
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('vehicle_name', 'Vehicle_name', 'required');
			$this->form_validation->set_rules('license', 'License', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// Get vehicle name
				$vehiclename = $this->input->post('vehicle_name');
				// Get the license
				$license = $this->input->post('license');
				// Login vehicle
				$vehicle_id = $this->vehicle_model->login($vehiclename, $license);
				if($vehicle_id){
					// Create session
					$user_data = array(
						'vehicle_id' => $vehicle_id,
						'vehicle_name' => $vehiclename,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('vehicle_loggedin', 'The vehicle is now logged in');
					redirect('home');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('about');
				}		
			}
		}
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('vehicle_id');
			$this->session->unset_userdata('vehicle_name');
			// Set message
			$this->session->set_flashdata('vehicle_loggedout', 'The vehicle is now logged out');
			redirect('vehicles/login');
		}
		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}
		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->vehicle_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function fuelup(){
			$data['title'] = 'Fuel Up';
			$this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
      		$this->form_validation->set_rules('gallons', 'Gallons', 'required|numeric');
      		$this->form_validation->set_rules('miles', 'Miles', 'required|numeric');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/fuelup', $data);
				$this->load->view('templates/footer');
			} else {
				$this->vehicle_model->fuelup();
				// Set message
				$this->session->set_flashdata('vehicle_fueled', 'The vehicle is now fuel up');
				redirect('home');
			}
		}

		public function fuelup_history(){
			$data['title'] = 'Fuel up information';
			$data['fuelups'] = $this->vehicle_model->get_fuelup_history();
			$this->load->view('templates/header');
			$this->load->view('vehicles/fuelup_history', $data);
			$this->load->view('templates/footer');
		}

		public function miles_driven(){
			$data['title'] = 'Miles driven';
			$data['fuelups'] = $this->vehicle_model->get_fuelup_history();
			$this->load->view('templates/header');
			$this->load->view('vehicles/miles_driven', $data);
			$this->load->view('templates/footer');
		}

		public function gallon_price(){
			$data['title'] = 'Gallon price';
			$data['fuelups'] = $this->vehicle_model->get_fuelup_history();
			$this->load->view('templates/header');
			$this->load->view('vehicles/gallon_price', $data);
			$this->load->view('templates/footer');
		}

	}
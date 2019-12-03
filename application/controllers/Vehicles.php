<?php
	class Vehicles extends CI_Controller{
		// Register vehicle
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
		// Log in vehicle
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
		// Log vehicle out
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

		public function oil_change(){
			$data['title'] = 'Oil change';
      $this->form_validation->set_rules('miles', 'Miles', 'required|numeric');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/oil_change', $data);
				$this->load->view('templates/footer');
			} else {
				$this->vehicle_model->oil_change();
				// Set message
				$this->session->set_flashdata('vehicle_oil_changed', 'The vehicle has the oil changed');
				redirect('home');
			}
		}

		public function tires_change(){
			$data['title'] = 'Tires change';
      $this->form_validation->set_rules('miles', 'Miles', 'required|numeric');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/tires_change', $data);
				$this->load->view('templates/footer');
			} else {
				$this->vehicle_model->tires_change();
				// Set message
				$this->session->set_flashdata('vehicle_tires_changed', 'The vehicle has the tires changed');
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
			$data['title'] = 'Get date range';
			$this->form_validation->set_rules('from', 'From', 'required|date');
      $this->form_validation->set_rules('to', 'To', 'required|date');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$data['form_name'] = 'vehicles/miles_driven';
				$this->load->view('vehicles/get_dates', $data);
				$this->load->view('templates/footer');
			} else {
				$data['title'] = 'Miles driven';
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data['fuelups'] = $this->vehicle_model->get_fuelup_date_range($from, $to);
				$this->load->view('templates/header');
				$this->load->view('vehicles/miles_driven', $data);
				$this->load->view('templates/footer');
			}
		}

		public function gallon_price(){
			$data['title'] = 'Get date range';
			$this->form_validation->set_rules('from', 'From', 'required|date');
      $this->form_validation->set_rules('to', 'To', 'required|date');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$data['form_name'] = 'vehicles/gallon_price';
				$this->load->view('vehicles/get_dates', $data);
				$this->load->view('templates/footer');
			} else {
				$data['title'] = 'Gallon price information';
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data['fuelups'] = $this->vehicle_model->get_fuelup_date_range($from, $to);
				$this->load->view('templates/header');
				$this->load->view('vehicles/gallon_price', $data);
				$this->load->view('templates/footer');
			}
		}

		public function get_mpg_dates(){
			$data['title'] = 'Get date range';
			$this->form_validation->set_rules('from', 'From', 'required|date');
      $this->form_validation->set_rules('to', 'To', 'required|date');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$data['form_name'] = 'vehicles/get_mpg_dates';
				$this->load->view('vehicles/get_dates', $data);
				$this->load->view('templates/footer');
			} else {
				$data['title'] = 'Fuel up information';
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data['fuelups'] = $this->vehicle_model->get_fuelup_date_range($from, $to);
				$this->load->view('templates/header');
				$this->load->view('vehicles/fuelup_history', $data);
				$this->load->view('templates/footer');
			}
		}

		public function get_dates(){
			$data['title'] = 'Get date range';
			$this->form_validation->set_rules('from', 'From', 'required|date');
      $this->form_validation->set_rules('to', 'To', 'required|date');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('vehicles/get_dates', $data);
				$this->load->view('templates/footer');
			} else {
				$data['from'] = $from = $this->input->post('from');
				$data['to'] = $to = $this->input->post('to');
				return ;
			}
		}

	}
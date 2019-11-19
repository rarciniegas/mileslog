<?php
	class Vehicle_model extends CI_Model{
		public function register(){
			// Vehicle data array
			$data = array(
				'vehicle_name' => $this->input->post('vehicle_name'),
		        'make' => $this->input->post('make'),
		        'model' => $this->input->post('model'),
		        'license' => $this->input->post('license'),
			);
			// Insert vehicle
			return $this->db->insert('vehicle', $data);
		}
		// Log vehicle in
		public function login($vehiclename, $license){
			// Validate
			$this->db->where('vehicle_name', $vehiclename);
			$this->db->where('license', $license);
			$result = $this->db->get('vehicle');
			if($result->num_rows() == 1){
				return $result->row(0)->vehicleID;
			} else {
				return false;
			}
		}
		// Check vehiclename exists
		public function check_vehiclename_exists($vehiclename){
			$query = $this->db->get_where('vehicle', array('vehicle_name' => $vehiclename));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Insert fuel up data
		public function fuelup(){
			// Fuel data array
			$data = array(

				'vehicleID' => $this->session->userdata('vehicle_id'),
		        'amount' => $this->input->post('amount'),
		        'gallons' => $this->input->post('gallons'),
		        'miles' => $this->input->post('miles'),
			);
			// Insert fuel up record
			return $this->db->insert('fuel', $data);
		}

		// Insert oil change data
		public function oil_change(){
			// Oil change data array
			$data = array(

				'vehicleID' => $this->session->userdata('vehicle_id'),

		        'miles' => $this->input->post('miles'),
			);
			// Insert oil change record
			return $this->db->insert('oil', $data);
		}

		// Insert tires change data
		public function tires_change(){
			// Tires change data array
			$data = array(
		
				'vehicleID' => $this->session->userdata('vehicle_id'),
				'miles' => $this->input->post('miles'),
			);
			// Insert oil change record
			return $this->db->insert('tires', $data);
		}

		public function get_fuelup_history(){
			$query = $this->db->get('fuel');
			return $query->result_array();
		}

	}
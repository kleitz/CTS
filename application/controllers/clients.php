<?php
class Clients extends CI_Controller {

	function index(){
		$this->load->model('clients_model');
		$query = $this->clients_model->get_clients();

		if($query){
			$data['clients'] = $query;
		}
		//display all users
		$this->load->view('dashboard_views/clients_view', $data);
	}


	/*
	 *  CRUD Area
	*/

	//display add view 'clients/add'
	function add(){
		$this->load->view('dashboard_views/add_client_view');
	}



	//new client
	function create(){
		 $data = array(
		 		'c_fname' => $this->input->post('firstname'),
				'c_email' => $this->input->post('email'),
				'c_dateadded' => unix_to_human(time(), TRUE, 'us'),
				'c_mname' => $this->input->post('middlename'),
		 		'c_lname' => $this->input->post('lastname'),
		 		'c_mobileno' => $this->input->post('mobilenumber'),
		 		'c_telno' => $this->input->post('telnumber'),
		 		'c_address' => $this->input->post('address'),
		 		'c_gender' => $this->input->post('gender'),
				
		);
		$this->load->model('clients_model');
		$this->clients_model->add_client($data);
		redirect('clients');
	}

	//edit client 'client/edit'
	function edit(){
		$this->load->model('clients_model');
		$query = $this->clients_model->get_client_by_id();
		if($query){
			$data['records'] = $query;
		}
		$this->load->view('dashboard_views/edit_client_view', $data);
	}

	function update(){

	}

	//deactivate client (model-deactivate)

	function deactivate(){
		$data = array(
				'isactive' => '0'
		);
		$this->load->model('clients_model');
		$this->clients_model->deactivate_client($data);
		redirect('clients');
	}


//   Validate Area

	function form_validate(){
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobilenumber', 'Number', 'numeric');
		$this->form_validation->set_rules('telnumber', 'Number', 'numeric');
		$this->form_validation->set_message('valid_email', 'Please enter a valid email');
		$this->form_validation->set_message('numeric', 'Please enter a valid number');
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}
		else
		{
			$this->create();
		}
	}
	
}



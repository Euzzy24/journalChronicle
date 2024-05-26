<?php
class Users extends CI_Controller {
    public function index($pagename = 'user') {
        $this->load->model('user_model');
        
        $data['title'] = 'User Lists';
        $query = $this->input->get('query');
        $data['users'] = $this->user_model->get_users($query);

        // $this->load->model('article_model');
        // $data['title'] = ucfirst($pagename);
        // $data['articles'] = $this->article_model->get_articles();


        // $this->load->model('volumes_model');
        // $data['title'] = ucfirst($pagename);
        // $data['volumes'] = $this->volumes_model->get_volumes();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('users/' . $pagename, $data);
        $this->load->view('templates/footer');
    }

    public function add_user() {
        $data['title'] = 'Add User';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        $this->load->model('user_model');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the add user form with validation errors
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav');
            $this->load->view('users/user', $data);
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $this->user_model->add_user($this->input->post());
            redirect('users');
        }
    }
    public function update_user($id) {
        $data['title'] = 'Update User';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        $this->load->model('user_model');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the update user form with validation errors
            $data['user'] = $this->user_model->get_user($id); // Retrieve user data for the form
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav');
            $this->load->view('users/user', $data); // Assuming you have an edit_user view
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $update_data = array(
                'complete_name' => $this->input->post('complete_name'),
                'email' => $this->input->post('email'),
                'pword' => $this->input->post('password') // Assuming 'pword' is the field for password
                // Add other fields as needed
            );
            $this->user_model->update_user($id, $update_data);
            redirect('users');
        }
    }
    
    
	public function delete_user($id){
		$this->user_model->delete_user($id);
		redirect('users');
	}

}

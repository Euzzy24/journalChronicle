<?php
class Authors extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('authors_model');
    }

    public function view($page = 'index') {
        if (!file_exists(APPPATH.'views/authors/'.$page.'.php')) {
            show_404();
        }

        $query = $this->input->get('query');
        $data['title'] = ucfirst('Authors');
        $data['authors'] = $this->authors_model->get_authors($query);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('authors/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_author() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('author_title', 'Author Title', 'required');
        $this->form_validation->set_rules('author_email', 'Author Email', 'required|valid_email');
        $this->form_validation->set_rules('author_contact', 'Author Contact', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['authors'] = $this->authors_model->get_authors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav', $data);
            $this->load->view('authors/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg';
            $config['max_size'] = 4096; // 4MB maximum file size
            $config['file_name'] = uniqid(); // Unique file name
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('profile_pic')) {
                $data = $this->upload->data();
                $file_name = 'uploads/' . $data['file_name']; // File path to store in the database
            } else {
                $file_name = 'assets/images/profile.png'; // Default profile picture if upload fails
            }
    
            $form_data = array(
                'author_name' => $this->input->post('author_name'),
                'author_title' => $this->input->post('author_title'),
                'author_email' => $this->input->post('author_email'),
                'author_contact' => $this->input->post('author_contact'),
                'pword' => $this->input->post('author_password'),
                'author_image' => $file_name
            );
    
            $this->authors_model->add_author($form_data);
    
            redirect('authors');
        }
        
    }

    public function update_author($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('author_title', 'Author Title', 'required');
        $this->form_validation->set_rules('author_email', 'Author Email', 'required|valid_email');
        $this->form_validation->set_rules('author_contact', 'Author Contact', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['authors'] = $this->authors_model->get_authors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav', $data);
            $this->load->view('authors/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg';
            $config['max_size'] = 4096; // 4MB maximum file size
            $config['file_name'] = uniqid(); // Unique file name
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('edit_pic')) {
                $data = $this->upload->data();
                $file_name = 'uploads/' . $data['file_name'];
            } else {
                $file_name = 'assets/images/profile.png';
            }
    
            $form_data = array(
                'author_name' => $this->input->post('author_name'),
                'author_title' => $this->input->post('author_title'),
                'author_email' => $this->input->post('author_email'),
                'author_contact' => $this->input->post('author_contact'),
                'author_image' => $file_name
            );
    
            $this->authors_model->update_author($id, $form_data);
    
            redirect('authors');
        }
    }

    public function delete_author($id){
        $this->authors_model->delete_author($id);
        redirect('authors');
    }
}

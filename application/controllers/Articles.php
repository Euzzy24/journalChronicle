<?php
class Articles extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('article_model');
        $this->load->model('Volumes_model');
        // Load the upload library
    }

    public function index($pagename = 'index') {
        
        $this->load->model('article_model');
        $data['title'] = ('ARTICLES');
        // $data['articles'] = $this->article_model->get_articles();
        $query = $this->input->get('query');
		$data['articles'] = $this->article_model->fetch_articles($query);
        // print_r($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('articles/' . $pagename, $data);
        $this->load->view('templates/footer');
    }


    public function view($id){
		$data['articles'] = $this->article_model->get_article_by_id($id);
		$data['volumes'] = $this->Volumes_model->get_volume_by_id($data['article']['volumeid']);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/articles', $data);
		$this->load->view('templates/footer');
	}

    public function view_article($id){
        $data['title'] = ('ARTICLE DETAILS');
		$data['articles'] = $this->article_model->get_article_by_id($id);
		$data['volumes'] = $this->Volumes_model->get_volume_by_id($data['articles']['volumeid']);
		$this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
		$this->load->view('articles/view_article', $data);
		$this->load->view('templates/footer');
	}


        // public function create_article() {
        //     // Load the article model
        //     $this->load->model('article_model');
            
		// 		$config['upload_path'] = './public/articles/';
		// 		$config['allowed_types'] = 'pdf|doc|docx'; 
		// 		$config['max_size'] = 2048; // 2MB maximum file size
		// 		$config['file_name'] = uniqid(); // Unique file name
	
		// 		$this->upload->initialize($config);
	
		// 		if ($this->upload->do_upload('filename')) {
		// 			$upload_data = $this->upload->data();
		// 			$file_name = $upload_data['file_name'];
		// 		} else {
		// 			// File upload failed, display error
		// 			$error = $this->upload->display_errors();
		// 			echo $error;
		// 			return; // Exit function if file upload fails
		// 		}
        
        //     // Get form data
        //     $title = $this->input->post('title');
        //     $volumeid = $this->input->post('volume');
        //     $abstract = $this->input->post('abstract');
        //     $keywords = $this->input->post('keywords');
        //     $filename = $this->input->post('filename');
        //     $doi = $this->input->post('doi');
        //     $published = $this->input->post('published');
        //     $authorids = $this->input->post('authors');
        
        //     // Create article data array
        //     $article_data = array(
        //         'title' => $title,
        //         'volumeid' => $volumeid,
        //         'abstract' => $abstract,
        //         'keywords' => $keywords,
        //         'filename' => $filename,
        //         'doi' => $doi,
        //         'published' => $published
        //     );
        
        //     // Create article
        //     $articleid = $this->article_model->create_article($article_data);
        
        //     // Associate authors with the article
        //     if (!empty($authorids)) {
        //         foreach ($authorids as $auid) {
        //             $this->article_model->add_article_author($articleid, $auid);
        //         }
        //     }
        
        //     // Redirect to articles index or show success message
        //     redirect('articles');
        // }


        public function new_article(){
            $data['volumes'] = $this->Volumes_model->fetch_volume();
            $data['title'] = ('NEW ARTICLE');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav');
            $this->load->view('articles/create_article');
            $this->load->view('templates/footer');
        }
    
        public function add_article(){

            // Set validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        
            // Check if form is submitted and validated
            if($this->form_validation->run() == FALSE){
                // Validation failed, load view with validation errors
                $data['volumes'] = $this->Volumes_model->fetch_volume();
                $this->load->view('templates/header');
                $this->load->view('templates/admin_nav');
                $this->load->view('articles/create_article', $data);
                $this->load->view('templates/footer');
            } else {
                $config['upload_path'] = './public/articles/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 2048; // 2MB maximum file size
                $config['file_name'] = uniqid(); // Unique file name
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('filename')) {

                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
        
                    $data = array(
                        'title' => $this->input->post('title'),
                        'keywords' => $this->input->post('keywords'),
                        'abstract' => $this->input->post('abstract'),
                        'doi' => $this->input->post('doi'),
                        'published' => $this->input->post('published'),
                        'volumeid' => $this->input->post('Volume'),
                        'filename' => $file_name,
                    );
        
                    $this->article_model->add_article($data);
        
                    // Redirect after successful insertion
                    redirect('articles');
                } else {
                    // File upload failed, display error
                    $error = $this->upload->display_errors();
                    echo $error;
                }
            }
            }

            public function edit_article($id){
                $data['volumes'] = $this->Volumes_model->fetch_published_volume();
                $data['article'] = $this->article_model->get_article_by_id($id);
                $this->load->view('templates/header');
                $this->load->view('templates/admin_nav');
                $this->load->view('articles/update_article', $data);
                $this->load->view('templates/footer');
            }

            public function update_article($id){

                // Set validation rules
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('keywords', 'Keywords', 'required');
                $this->form_validation->set_rules('abstract', 'Abstract', 'required');
            
                // Check if form is submitted and validated
                if($this->form_validation->run() == FALSE){
                    // Validation failed, load view with validation errors
                    $data['volumes'] = $this->Volumes_model->fetch_volume();
                    $this->load->view('templates/header');
                    $this->load->view('templates/admin_nav');
                    $this->load->view('articles/create_article', $data);
                    $this->load->view('templates/footer');
                } else {
                    $config['upload_path'] = './public/articles/';
                    $config['allowed_types'] = 'pdf|doc|docx';
                    $config['max_size'] = 2048; // 2MB maximum file size
                    $config['file_name'] = uniqid(); // Unique file name
            
                    $this->upload->initialize($config);
            
                    if ($this->upload->do_upload('filename')) {
    
                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
            
                        $data = array(
                            'title' => $this->input->post('title'),
                            'keywords' => $this->input->post('keywords'),
                            'abstract' => $this->input->post('abstract'),
                            'doi' => $this->input->post('doi'),
                            'published' => $this->input->post('published'),
                            'volumeid' => $this->input->post('Volume'),
                            'filename' => $file_name,
                        );
            
                        $this->article_model->update_article($id, $data);
            
                        // Redirect after successful insertion
                        redirect('articles');
                    } else {
                        // File upload failed, display error
                        $error = $this->upload->display_errors();
                        echo $error;
                    }
                }
                }
            


                public function download($filename) {
                    $file_path = FCPATH . 'public/articles/' . $filename;
                
                    // Check if file exists
                    if (file_exists($file_path)) {
                        // Load the download helper
                        $this->load->helper('download');
                
                        // Set the file MIME type
                        $mime = mime_content_type($file_path);
                
                        // Generate the server response for the file download
                        force_download($filename, file_get_contents($file_path), $mime);
                    } else {
                        // File not found, handle the error
                        echo "File not found!";
                    }
                }

        public function delete_article($id){
            $this->article_model->delete_article($id);
            redirect('articles');
        }
    
}

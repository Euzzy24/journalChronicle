<?php
class Pages extends CI_Controller {
    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        // if($page === 'articles'){
        //     $this->load->model('volumes_model');
        //     $this->load->model('article_model');
        //     $query = $this->input->get('query');
        //     $data['articles'] = $this->article_model->published_articles($query);

		// 	$data['volumes'] = $this->volumes_model->published_volume();
        //     // print_r($data['volumes']);
		// 	// print_r($data['volumes']);
		// 	// $data['articles'] = $this->articles_model->fetch_articles();
		// 	$this->load->view('templates/header');
        //     $this->load->view('templates/nav', $data);
		// 	$this->load->view('pages/articles',  $data);
		// 	$this->load->view('templates/footer');
		// 	return;
		// }
        
        $this->load->model('article_model'); // Load the model
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['articles'] = $this->article_model->get_articles();
        
        
        $this->load->model('volumes_model');
        
        $data['title'] = ucfirst($page);
        $data['volumes'] = $this->volumes_model->get_volumes();
        // print_r($data['volumes']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);

        // $data['title'] = ucfirst($page); // Capitalize the first letter
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/nav');
        // $this->load->view('pages/' . $page);
        // $this->load->view('templates/footer');
    }

    public function public_home(){
        $this->load->model('volumes_model');
        $this->load->model('article_model');
        $data['title'] = 'Home';
        $query = $this->input->get('query');
        $data['articles'] = $this->article_model->published_articles($query);
        $data['volumes'] = $this->volumes_model->published_volume();
        // print_r($data['volumes']);
        // print_r($data['volumes']);
        // $data['articles'] = $this->articles_model->fetch_articles();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/articles',  $data);
        $this->load->view('templates/footer');
        return;
    }

    public function public_article($id){
        $data['title'] = ('ARTICLE DETAILS');
		$data['articles'] = $this->article_model->get_article_by_id($id);
		$data['volumes'] = $this->Volumes_model->get_volume_by_id($data['articles']['volumeid']);
		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
		$this->load->view('pages/public_article', $data);
		$this->load->view('templates/footer');
	}

    public function volume_article($id){
        $this->load->model('volumes_model');
        $data['title'] =('VOLUME ARTICLES');
        $data['volumes'] = $this->volumes_model->get_volume_by_id($id) ;
        // print_r($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/volume_article', $data);
        $this->load->view('templates/footer', $data);
    }
}
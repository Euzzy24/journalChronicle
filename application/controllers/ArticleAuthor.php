<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleAuthor extends CI_Controller {
	public function index($id){
		$data['articleauthors'] = $this->user_model->get_users_by_articles($id);
		$data['id'] = $id;
        $data['title'] = ('Add Authors');
		$data['id'] = $id;
		$this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
		$this->load->view('article_author/index', $data);
		$this->load->view('templates/footer');
	}

	public function new($id){
		$data['authors'] = $this->authors_model->get_authors();
		$data['id'] = $id;
		$this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
		$this->load->view('article_author/assign_author', $data);
		$this->load->view('templates/footer');
	}

	public function add($id){
		$data = array(
			'article_id' => $id,
			'auid' => $this->input->post('author_id') 
		);

		$this->ArticleAuthor_model->add_article_author($data);
		redirect("articleauthor/$id");
	}

	public function edit($articleid, $id) {
    $data['articleauthor'] = $this->articleauthor_model->get_article_author_by_id($id);
		$data['authors'] = $this->authors_model->get_authors();
		$data['id'] = $articleid;
		$this->load->view('templates/header');
		$this->load->view('article_author/edit_assigned_author', $data);
		$this->load->view('templates/footer');
	}

	public function update($articleid, $id) {
		$data = array(
			'authid' => $this->input->post('author_id') 
		);
    $this->articleauthor_model->update_article_author($id, $data);
    redirect('article/'.$articleid.'/authors');
	}

	public function delete($articleid, $id) {
    $this->ArticleAuthor_model->delete_article_author($id);
    redirect("articleauthor/$articleid");
	}

}

<?php
class ArticleAuthor_model extends CI_Model{
	public function add_article_author($data){
		$this->db->insert('article_author', $data);
	}

	public function update_article_author($id, $data){
		$this->db->where('id', $id);
		$this->db->update('article_author', $data);
	}

	public function delete_article_author($id){
		$this->db->where('id', $id);
		$this->db->delete('article_author');
	}

	public function get_article_author_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('article_author');
		return $query->row_array();
	}
}

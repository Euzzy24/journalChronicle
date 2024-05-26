<?php

    class Volumes_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function fetch_volume($query = NULL) {
            if (!is_null($query)) {
                    $this->db->order_by('vol_name', 'ASC');
                $this->db->like('vol_name', $query);
                $this->db->or_like('description', $query);
            }
                
                $this->db->order_by('vol_name', 'ASC');
            $query = $this->db->get('volumes');
            $volumes = $query->result_array();
        
            return $volumes;
        }

        public function published_volume($query = NULL) {
            if (!is_null($query)) {
                    $this->db->order_by('vol_name', 'ASC');
                $this->db->like('vol_name', $query);
                $this->db->or_like('description', $query);
            }
                $this->db->where('published', 1);
                $this->db->order_by('vol_name', 'ASC');
            $query = $this->db->get('volumes');
            $volumes = $query->result_array();
        
            return $volumes;
        }
        
        public function get_volumes($id = FALSE){
            if ($id === FALSE){
                $query = $this->db->get('volumes');
                return $query->result_array();
            }
            $query = $this->db->get_where('volumes', array('id' => $id));
            return $query->row_array();
        }


        public function get_volume_id($vid){
            $query = $this->db->get_where('volumes', array('volumeid' => $vid));
            return $query->row_array();
        }

        public function add_volume(){

            $data = array(
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('vol_desc'),
                'published' => $this->input->post('status'),
                'archived' => 0
                // 'archive' => $archive
            );

            return $this->db->insert('volumes', $data);
        }

        public function update_volume($vid, $update){

            $this->db->where('volumeid', $vid);
            $this->db->update('volumes', $update);
        }

        public function delete_volume($vid){
            $this->db->where('volumeid', $vid);
            $this->db->delete('volumes');
    }
        public function toggle_archive($vid, $archive_status)
        {
            $this->db->where('volumeid', $vid);
            return $this->db->update('volumes', array('archived' => $archive_status));
        }

        public function get_authors_by_article_id($id){
            $query = $this->db->get_where('article_author', array('article_id' => $id));
            return $query->result_array();
        }

        
	public function get_authors_by_id($id){
		$query = $this->db->get_where('authors', array('auid'=> $id));
		return $query->row_array();
	}


    
	public function get_articles_by_volume_id($id){
		$this->db->order_by('title', 'ASC');
		$query = $this->db->get_where('articles', array('volumeid'=> $id));
		$articles = $query->result_array();
		foreach ($articles as &$article) {
			$articleauthors = $this->get_authors_by_article_id($article['articleid']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'][] =  $this->get_authors_by_id($author['auid']);
			}
		}
	
		return $articles;
	}

    

    public function get_volume_by_id($id) {
        $volume = $this->db->get_where('volumes', array('volumeid' => $id))->row_array();
    
        if ($volume) {
            $volume['articles'] = $this->get_articles_by_volume_id($volume['volumeid']);
        }
    
        return $volume;
        }

        public function fetch_published_volume($query = NULL) {
            if (!is_null($query)) {
                $this->db->order_by('vol_name', 'ASC');
                    $this->db->like('vol_name', $query);
                    $this->db->or_like('description', $query);
            }
            
            $this->db->where('published', 1);
            // $this->db->where('archived', 0);
            $this->db->order_by('vol_name', 'ASC');
            $query = $this->db->get('volumes');
            $volumes = $query->result_array();
        
            return $volumes;
        }

    }
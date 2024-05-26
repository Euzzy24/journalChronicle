<?php

    class article_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        public function fetch_articles($query = NULL)
        {
            if ($query !== NULL) {
                $this->db->like('title', $query);
                $this->db->or_like('keywords', $query);
                $this->db->like('abstract', $query);
            }
        
            $this->db->select('articles.*, volumes.vol_name');
            $this->db->from('articles');
            $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
            $query = $this->db->get();
        
            return $query->result_array();
        }
        public function published_articles($query = NULL)
        {
            if ($query !== NULL) {
                $this->db->group_start();
                $this->db->like('title', $query);
                $this->db->or_like('keywords', $query);
                $this->db->or_like('abstract', $query);
                $this->db->group_end();
            }
        
            $this->db->select('articles.*, volumes.vol_name');
            $this->db->from('articles');
            $this->db->where('articles.published', 1);
            $this->db->where('volumes.published', 1);
            $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
        
            $query = $this->db->get();
        
            return $query->result_array();
        }
        

        
        public function get_articles($query = NULL) {
            $this->db->select('articles.*, GROUP_CONCAT(authors.author_name SEPARATOR ", ") as authors, volumes.vol_name');
            $this->db->from('articles');
            $this->db->join('article_author', 'article_author.article_id = articles.articleid', 'inner');
            $this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
            $this->db->join('volumes', 'articles.volumeid = volumes.volumeid', 'inner'); // Use inner join with volumes table
            $this->db->group_by('articles.articleid');
            $this->db->order_by('articles.date_published', 'DESC');
        
            if ($query !== NULL) {
                $this->db->like('articles.title', $query);
                $this->db->or_like('articles.keywords', $query);
                $this->db->or_like('articles.abstract', $query); // Use or_like here instead of like
            }
        
            $query = $this->db->get();
            $articles = $query->result_array();
        
            // Ensure 'authors' key exists
            foreach ($articles as &$article) {
                if (!isset($article['authors'])) {
                    $article['authors'] = '';  // Set empty string if no authors
                }
            }
        
            return $articles;
        }
        

        // public function get_articles($query=NULL){
        //     $this->db->select('authors.*, articles.*');
        //     $this->db->from('article_author');
        //     $this->db->join('articles', 'article_author.article_id = articles.articleid', 'inner');
        //     $this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
        //     $this->db->order_by('articles.date_published', 'DESC');
        //     if ($query !== NULL ) {
        //         $this->db->like('title', $query);
        //         $this->db->or_like('keywords', $query);
        //         $this->db->like('abstract', $query);
        //     }
    
        //     $query = $this->db->get();
        //     return $query->result_array();
        // }

        public function get_volumes($id = FALSE){
            if ($id === FALSE){
                $query = $this->db->get('volumes');
                return $query->result_array();
            }
            $query = $this->db->get_where('volumes', array('id' => $id));
            return $query->row_array();
        }

        public function get_authors($query=FALSE){
            if($query === NULL){
                $query = $this->db->get('authors');
                return $query->result_array();
            }
    
            $this->db->like('author_name', $query);
            $this->db->or_like('author_email', $query);
            $query = $this->db->get('authors');
            
            return $query->result_array();
            
        }

        public function get_article_by_id($id){
            $article = $this->db->get_where('articles', array('articleid' => $id))->row_array();
            $articleauthors = $this->Volumes_model->get_authors_by_article_id($article['articleid']);
                $article['authors'] = [];
                foreach ($articleauthors as &$author) {
                        $article['authors'][] =  $this->Volumes_model->get_authors_by_id($author['auid']);
                }
            return $article;
        }

        public function get_articles_by_volume_id($id){
            $this->db->select('authors.*, articles.*');
            $this->db->from('article_author');
            $this->db->join('articles', 'article_author.article_id = articles.articleid', 'inner');
            $this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
            $this->db->where('articles.volumeid', $id);
    
            $query = $this->db->get();
            return $query->result_array();
        }
    


        public function add_article($data){
            $this->db->insert('articles', $data);
            }

    
        public function update_article($id, $data){
                $this->db->where('articleid', $id);
                $this->db->update('articles', $data);
        }

        
        public function delete_article($id){
			$this->db->where('articleid', $id);
			$this->db->delete('articles');
	}
    }
<?php

    class authors_model extends CI_Model{
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
    
        public function get_author_by_id($id){
            $query = $this->db->get_where('authors', array('auid' => $id));
            return $query->row_array();
        }
    
        public function add_author($data){
            $this->db->insert('authors', $data);
        }
    
        public function update_author($id, $data){
            $this->db->where('auid', $id);
            $this->db->update('authors', $data);
        }
    
        public function delete_author($id){
                $this->db->where('auid', $id);
                $this->db->delete('authors');
        }
    
    }
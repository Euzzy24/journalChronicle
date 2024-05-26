<?php

    class user_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        public function get_users($query=NULL){
            if($query === NULL){
                $this->db->order_by('complete_name', 'ASC');
                $query = $this->db->get('users');
                return $query->result_array();
            }
            $this->db->order_by('complete_name', 'ASC');
            $this->db->like('complete_name', $query);
            $this->db->or_like('email', $query);
            $query = $this->db->get('users');
            
        
            return $query->result_array();
        }
    

        // public function get_users($id = FALSE){
        //     if ($id === FALSE){
        //         $query = $this->db->get('users');
        //         return $query->result_array();
        //     }
        //     $query = $this->db->get_where('users', array('id' => $id));
        //     return $query->row_array();
        // }

        public function get_users_by_articles($id){
            $article_authors = $this->db->get_where('article_author', array('article_id' => $id))->result_array();
            foreach ($article_authors as &$article_author) {
                $article_author['author'] = $this->Volumes_model->get_authors_by_id($article_author['auid']);
            }
            return $article_authors;
        }




        public function add_user(){
            // $slug = url_title($this->input->post('complete_name'));
        
            // Handle file upload
            $config['upload_path'] = './uploads/'; // Specify the upload directory
            $config['allowed_types'] = 'gif|jpg|png'; // Specify allowed file types
            $config['max_size'] = 2048; // Specify max file size in KB
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('profile_pic')) {
                $data = $this->upload->data();
                $profile_pic = 'uploads/' . $data['file_name']; // File path to store in the database
            } else {
                $profile_pic = 'assets/images/profile.png'; // Default profile picture if upload fails
            }
        
            $role_map = array(
                'viewer' => 3,
                'evaluator' => 2,
                'admin' => 1
            );
        
            // Get the role value based on the input
            $role_name = $this->input->post('role');
            $role = isset($role_map[$role_name]) ? $role_map[$role_name] : 3;

            // Prepare data for insertion
            $data = array(
                'complete_name' => $this->input->post('complete_name'),
                // 'slug' => $slug,
                'email' => $this->input->post('email'),
                'pword' => $this->input->post('password'),
                'profile_pic' => $profile_pic,
                'role' => $role
            );
        
            return $this->db->insert('users', $data);
        }
        

        public function update_user($id, $update_data) {
            // Handle file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('edit_pic')) {
                $upload_data = $this->upload->data();
                $edit_pic = 'uploads/' . $upload_data['file_name'];
            } else {
                $edit_pic = 'assets/images/profile.png';
            }
        
            $role_map = array(
                'viewer' => 3,
                'evaluator' => 2,
                'admin' => 1
            );
        
            // Get the role value based on the input
            $role_name = $this->input->post('role');
            $role = isset($role_map[$role_name]) ? $role_map[$role_name] : 3;
        
            // Prepare data for update
            $update_data['profile_pic'] = $edit_pic;
            $update_data['role'] = $role;
        
            // Update user data
            $this->db->where('userid', $id);
            $this->db->update('users', $update_data);
        }
        
        
        public function delete_user($id){
            $this->db->where('userid', $id);
            $this->db->delete('users');
    }
    }
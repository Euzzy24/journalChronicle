<?php
class Volumes extends CI_Controller {
    public function view($page = 'index')
    {
        
        $this->load->model('volumes_model');
        $data['title'] =('VOLUMES');
        $query = $this->input->get('query');
        $data['volumes'] = $this->volumes_model->fetch_volume($query);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('volumes/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_volume($id){
        $this->load->model('volumes_model');
        $data['title'] =('VOLUME ARTICLES');
        $data['volumes'] = $this->volumes_model->get_volume_by_id($id) ;
        // print_r($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('volumes/view_volume', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_vol(){
        $this->load->model('volumes_model');
        $data['title'] =('NEW VOLUMES');
        $data['volumes'] = $this->volumes_model->get_volumes();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('volumes/create_volume', $data);
        $this->load->view('templates/footer', $data);
    }
    public function add_vol(){
        $this->load->model('volumes_model');
        $this->volumes_model->add_volume($this->input->post());
        redirect('volumes');
    }

    public function edit_vol($id){
        $this->load->model('volumes_model');
        $data['title'] =('Update VOLUMES');
        $data['volumes'] = $this->volumes_model->get_volume_id($id);
        // $data['volumes'] = $this->volumes_model->get_volumes();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_nav', $data);
        $this->load->view('volumes/update_volume', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_vol($vid)
    {
        $update_data = array(
            'vol_name' => $this->input->post('vol_name'),
            'description' => $this->input->post('vol_desc'),
            'published' => $this->input->post('status'),
            'archived' => 0
        );

        $this->load->model('volumes_model');
        $this->volumes_model->update_volume($vid, $update_data);
        redirect('volumes');
    }

    public function delete_vol($vid)
    {
        $this->load->model('volumes_model');
        $this->volumes_model->delete_volume($vid);
        redirect('volumes');
    }

    public function toggle_archive($vid, $archive_status)

    
    {
        $this->load->model('volumes_model');
        
        try {
            $result = $this->volumes_model->toggle_archive($vid, $archive_status);
            
            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update the database.']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    
}
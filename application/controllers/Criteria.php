<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('criteria_model','criteria');
    }

    public function index()
    {
        $data = array();
        $data['criterias'] = $this->criteria->getCriteria();
        $this->load->view('criteria/mainDataKriteria', $data);
    }

    public function form($criteria_id = null)
    {
        $data = array();
        if($criteria_id){
            $data['criteria'] = $this->criteria->getCriteriaById($criteria_id);
        }
        $this->load->view('criteria/create_data_criteria', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (
            // 'id' => $id,
            'name' => $this->input->post('name'),
            'sts' => $this->input->post('sts')            
        );
        if(!$id){
            $send_form = $this->criteria->createCriteria($form_data);
        } else {
            $send_form = $this->criteria->updateCriteria($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('message', array('success','Data berhasil ditambahkan!'));
            redirect('http://localhost/website-saw/');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Dados incorretos!'));
            redirect('criteria/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->criteria->deleteCriteria($id);
        if($delete){
            $this->session->set_flashdata('message', array('success','Data berhasil dihapuskan!'));
            redirect('criteria');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Produk tidak ditemukan!'));
            redirect('criteria');
        }
    }
}

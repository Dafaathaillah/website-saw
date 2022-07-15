<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model','data_alternatif');
    }

    public function index()
    {
        $data = array();
        $data['data_alternatifs'] = $this->data_alternatif->getData();
        $this->load->view('dataAlternatif/mainDataAlternatif', $data);
    }

    public function form($data_id = null)
    {
        $data = array();
        if($data_id){
            $data['data_alternatif'] = $this->data_alternatif->getDataById($data_id);
        }
        $this->load->view('dataAlternatif/create_data_alternatif', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (
            // 'id' => $id,
            'name' => $this->input->post('name')                   
        );
        if(!$id){
            $send_form = $this->data_alternatif->createData($form_data);
        } else {
            $send_form = $this->data_alternatif->updateData($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('message', array('success','Data berhasil ditambahkan!'));
            redirect('http://localhost/website-saw/');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Dados incorretos!'));
            redirect('data_alternatif/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->data_alternatif->deleteData($id);
        if($delete){
            $this->session->set_flashdata('message', array('success','Data berhasil dihapuskan!'));
            redirect('data_alternatif');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Produk tidak ditemukan!'));
            redirect('data_alternatif');
        }
    }
}

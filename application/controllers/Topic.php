<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('topic_model','topic');
    }

    public function index()
    {
        $data = array();
        $data['Topics'] = $this->topic->getTopic();
        $this->load->view('topik/topik', $data);
    }

    public function form($topic_id = null)
    {
        $data = array();
        if($topic_id){
            $data['topic'] = $this->topic->getTopicById($topic_id);
        }
        $this->load->view('topik/createTopik', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (
            // 'id' => $id,
            'name' => $this->input->post('name')                      
        );
        if(!$id){
            $send_form = $this->topic->createTopic($form_data);
        } else {
            $send_form = $this->topic->updateTopic($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('message', array('success','Data berhasil ditambahkan!'));
            redirect('http://localhost/website-saw/');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Dados incorretos!'));
            redirect('topic/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->topic->deleteTopic($id);
        if($delete){
            $this->session->set_flashdata('message', array('success','Data berhasil dihapuskan!'));
            redirect('topic');
        }
        else
        {
            $this->session->set_flashdata('message', array('danger','Ops! Produk tidak ditemukan!'));
            redirect('topic');
        }
    }
}

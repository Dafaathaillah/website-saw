<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_criteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sub_criteria_model','sub_criteria');
        // $this->load->model('criteria_model','criteria');
    }

    public function index()
    {
        $data = array();
        // $data['sub_criterias'] = $this->sub_criteria->getSub();
        $data['criterias'] = $this->sub_criteria->getCriteria();
        $data['sub_criterias'] = $this->sub_criteria->getSubsByCriteriaId();
        $this->load->view('subKriteria/mainSubKriteria', $data);
    }

    public function form($sub_id = null)
    {
        $data = array();
        if($sub_id){
            // $data['sub_criterias'] = $this->sub_criteria->getCriteria();        
            // $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId();            
        }
        $this->load->view('subKriteria/createSubKriteria', $data);
    }

    public function view($id = null){
        $data = array();
        // $data['sub_criterias'] = $this->sub_criteria->getSub($id);  
        $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId();
        $this->load->view('subKriteria/mainSubKriteria', $data);
    }


    public function save($id = null)
    {
        $form_data = array
        (
            // 'id' => $id,
            'criteria_id' => $this->input->post('name'),
            'score' => $this->input->post('score'),
            'description' => $this->input->post('description')            
        );
        if(!$id){
            $send_form = $this->sub_criteria->createSub($form_data);
        } else {
            $send_form = $this->sub_criteria->updateSub($form_data);   
        }
        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Produto salvo com sucesso!'));
            redirect('http://localhost/website-saw/');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect('sub_criteria/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->sub_criteria->deleteSub($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Produto deletado com sucesso!'));
            redirect('sub_criteria');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Produto não encontrado!'));
            redirect('sub_criteria');
        }
    }
}
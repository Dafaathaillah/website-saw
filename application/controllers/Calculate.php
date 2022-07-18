<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('sub_criteria_model','sub_criteria');
        $this->load->model('calculate_model','calculate');
        // $this->load->model('criteria_model','criteria');
    }

    public function index()
    {        
        // $data['sub_criterias'] = $this->sub_criteria->getSub();
        // $data['sub_criterias'] = $this->sub_criteria->getCriteriaById($sub_id);
        $data = array();		
		$data['topic'] = $this->calculate->getTopic();
		$data['data_alternatif'] = $this->calculate->getData();
		$data['criterias'] = $this->calculate->getCriteria(); // for form input
		$data['sub_criterias'] = $this->calculate->getSubsByCriteriaId(); 		
		$data['subs'] = $this->calculate->getSubs(); 
        $this->load->view('perhitungan/mainPerhitungan', $data);
    }

    public function form($calculate_id = null)
    {
        $data = array();
        if($calculate_id){
            // $data['sub_criterias'] = $this->sub_criteria->getCriteria();        
            // $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId();            
        }
        $this->load->view('perhitungan/createSubKriteria', $data);
    }

    public function view($id = null){
        $data = array();
        // $data['sub_criterias'] = $this->sub_criteria->getSub($id);  
        $data['sub_criteria'] = $this->calculate->getSubsByCriteriaId();
        $this->load->view('perhitungan/mainSubKriteria', $data);
    }


    public function save($id = null)
    {
        $form_data = array
        (
            // 'id' => $id,
            'topic_id' => $this->input->post('topic_id'),
            'data_alternatif_id' => $this->input->post('data_alternatif_id'),
            'criteria_id' => $this->input->post('criteria_id'),
            'sub_criteria_id' => $this->input->post('sub_criteria_id')                        
        );
        if(!$id){
            $send_form = $this->calculate->createSub($form_data);
        } else {
            $send_form = $this->calculate->updateSub($form_data);   
        }
        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Produto salvo com sucesso!'));
            redirect('http://localhost/website-saw/');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect('calculate/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->calculate->deleteSub($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Produto deletado com sucesso!'));
            redirect('calculate');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Produto não encontrado!'));
            redirect('calculate');
        }
    }
}
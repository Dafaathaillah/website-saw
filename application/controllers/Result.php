<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('sub_criteria_model','sub_criteria');
    	$this->load->model('result_model','result');                
    }

    public function index()
    {                
        $input = $this->input->get('topic_id');
        $data = array();		
		$data['topic'] = $this->result->getTopic();
		$data['data_alternatif'] = $this->result->getData($input);
        $data['data_alternatifs'] = $this->result->getDataAlternatif();
		// $data['criterias'] = $this->result->getCriteria(); // for form input
		// $data['sub_criterias'] = $this->result->getSubsByCriteriaId(); 		
		// $data['subs'] = $this->result->getSubs();         
        $data['criteria'] = $this->result->getCriteria(); 
        $data['scores'] = $this->result->getArrayScore($input); 
        // $data['calculates'] = $this->result->getCalculate();
        // $data['matrix'] = $this->result->getMatrix(); 
        $this->load->view('hasil/mainTableHasil', $data);
    }

    public function form($calculate_id = null)
    {        
        redirect(base_url('result'));
    }

    public function view($id = null){
        $data = array();        
        $data['sub_criteria'] = $this->result->getSubsByCriteriaId();        
        $this->load->view('hasil/mainTableHasil', $data);
    }    

    public function save($id = null)
    {                
        $data  = array();
        $data['criteria'] = $this->result->getCriteria();            

        if(!$id){           
            foreach ($data['criteria'] as $key => $value) {
                $form_data = array
                (                    
                        'topic_id' => $this->input->post('topic_id'),
                        'data_alternatif_id' => $this->input->post('data_alternatif_id'),                        
                        'criteria_id' => $_POST['criteria_id'][$key],
                        'sub_kriteria_id' => $_POST['sub_kriteria_id'][$key],
                );
                $send_form = $this->result->createResult($form_data);            
        }
        } else {
            $send_form = $this->result->updateResult($form_data, $data);   
        }
        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Produto salvo com sucesso!'));
            redirect(base_url('result'));
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect(base_url('result/form'));
        }
    }

    public function delete($id)
    {
        $delete = $this->result->deleteSub($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Produto deletado com sucesso!'));
            redirect('result');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Produto não encontrado!'));
            redirect('result');
        }
    }
}
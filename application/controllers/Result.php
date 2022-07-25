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
        $data['results'] = $this->result->getResult($input);
        $data['min'] = $this->result->getMin($input);
        $data['max'] = $this->result->getMax($input);
        $data['bobot'] = $this->result->getBobot($input);
        $data['sts'] = $this->result->getBobot($input);
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
        $this->load->view('hasil/mainTableHasil', $data);
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
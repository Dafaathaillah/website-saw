<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('sub_criteria_model','sub_criteria');
        $this->load->model('calculate_model','calculate');
        $this->load->model('criteria_model','criteria');
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
        $data['results'] = $this->calculate->getResult(); 
        $this->load->view('perhitungan/mainPerhitungan', $data);
    }

    public function form($calculate_id = null)
    {
        $data = array();
        if($calculate_id){
            // $data['sub_criterias'] = $this->sub_criteria->getCriteria();        
            // $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId();            
        }
        redirect(base_url('calculate'));
    }

    public function view($id = null){
        $data = array();
        // $data['sub_criterias'] = $this->sub_criteria->getSub($id);  
        $data['sub_criteria'] = $this->calculate->getSubsByCriteriaId();
        $this->load->view('perhitungan/mainSubKriteria', $data);
    }

    public function calculate(){
        
        $data = array();
        $data['calculates'] = $this->calculate->getCalculateByAllId();        
        
        foreach ($calculates as $calulate) {
            $data_alternatif[] = $data_alternatif['criteria'];
        }

    }

    public function save($id = null)
    {                
        $data  = array();
        $data['criteria'] = $this->calculate->getCriteria();            

        if(!$id){           
            foreach ($data['criteria'] as $key => $value) {
                $form_data = array
                (
                    // 'topic_id' => $topic,
                    // 'data_alternatif_id' => $data_alternatif,
                    // 'criteria' => $key['criteria_id'],
                        'topic_id' => $this->input->post('topic_id'),
                        'data_alternatif_id' => $this->input->post('data_alternatif_id'),                        
                        'criteria_id' => $_POST['criteria_id'][$key],
                        'sub_kriteria_id' => $_POST['sub_kriteria_id'][$key],
                );
                $send_form = $this->calculate->createCalculate($form_data);            
        }
        } else {
            $send_form = $this->calculate->updateCalculate($form_data);   
        }
        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Produto salvo com sucesso!'));
            redirect(base_url('calculate'));
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect(base_url('calculate/form'));
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
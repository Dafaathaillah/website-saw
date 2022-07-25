<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcriteria extends CI_Controller {

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
        
        // $config['base_url'] = site_url('subKriteria/index');
        // $config['total_rows'] = $this->db->count_all('sub_kriteria');
        // $config['per_page'] = 5;
        // $config['uri_segment'] = 3;
        // $choice = $config["total_rows"] / $config['per_page'];
        // $config["num_links"] = floor($choice);

        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // // $data['sub_criterias'] = $this->sub_criteria->getSub($id);  
        // $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId($config['per_page'], $data['page']);
        // $data['pagination'] = $this->pagination->create_links();
        $this->load->view('subKriteria/mainSubKriteria', $data);
    }

    public function form($sub_id = null)
    {
        $data = array();
        if($sub_id){
            // $data['criterias'] = $this->sub_criteria->getCriteria();        
            // $data['sub_criteria'] = $this->sub_criteria->getSubsByCriteriaId();            
        }
        $this->load->view('subKriteria/createSubKriteria', $data);
    }

    public function view($id = null){       
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
            redirect(base_url('subcriteria'));
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect('subcriteria/form');
        }
    }

    public function delete($id)
    {
        $this->sub_criteria->deleteSub($id);
        redirect('subcriteria');
    }
}

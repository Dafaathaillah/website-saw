<?php
class Calculate_model extends CI_Model {

    public function getCalculate(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('calculate');                
        return $query->result();        
    }

    public function getCalculateByTopicIdDataId(){    
        $this->db->select('topic.name, data_alternatif.name');
        $this->db->from('result');
        $this->db->join('topic', 'topic.id = result.id');                        
        $this->db->join('data_alternatif', 'data_alternatif.id = result.id'); 
        $query = $this->db->get('');
        return $query->result();
    }    

    public function getCriteria(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('criteria');
        return $query->result();
    }


    public function getData(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('data_alternatif');
        return $query->result();
    }

    public function getSubsByCriteriaId(){    
        $this->db->select('criteria.id AS id_criteria, sub_kriteria.id AS sub_criteria_id, criteria.name, sub_kriteria.score, sub_kriteria.description');
        $this->db->from('sub_kriteria');
        $this->db->join('criteria', 'criteria.id = sub_kriteria.criteria_id');                        
        $query = $this->db->get('');
        return $query->result();
    }

    public function getTopic(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('topic');
        return $query->result();
    }
    
    public function getCalculateById($id){
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $query = $this->db->get('calculate');
        return $query->result();
    }

    public function createCalculate($form_data){
        $this->db->insert('calculate', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateCalculate($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('calculate', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteCalculate($id){
        $this->db->set('cond', 0);
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $this->db->update('calculate');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
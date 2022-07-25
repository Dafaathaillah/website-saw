<?php
class Sub_criteria_model extends CI_Model {

    public function getSub(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('sub_kriteria');                
        return $query->result();        
    }

    public function getSubsByCriteriaId(){    
        $this->db->select('sub_kriteria.id AS sub_kriteria_id, criteria.id AS id_criteria, criteria.name, sub_kriteria.score, sub_kriteria.description');
        $this->db->from('sub_kriteria');
        $this->db->join('criteria', 'criteria.id = sub_kriteria.criteria_id');
		$this->db->where('sub_kriteria.cond', 1);                        
        $query = $this->db->get('');
        return $query->result();
    }

    public function getCriteria(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('criteria');
        return $query->result();
    }

    public function getSubById($id){
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $query = $this->db->get('sub_kriteria');
        return $query->result();
    }

    public function createSub($form_data){
        $this->db->insert('sub_kriteria', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateSub($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('sub_kriteria', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteSub($id){
        $this->db->set('cond', 0);
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $this->db->update('sub_kriteria');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}

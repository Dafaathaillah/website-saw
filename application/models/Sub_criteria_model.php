<?php
class sub_criteria_model extends CI_Model {

    public function getSub(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('sub_kriteria');        
        // $this->db->select('criteria.name, sub_kriteria.score, sub_kriteria.description');
        // $this->db->from('sub_kriteria');
        // $this->db->join('sub_kriteria a', 'a.criteria_id = criteria.id');
        // $this->db->join('criteria c', 'a.criteria_id = c.id');        
        // $this->db->order_by('c.id');
        // $this->db->where('a.criteria_id', $id);
        // $this->db->where('c.cond', 1);
        // $query = $this->db->get('sub_kriteria');
        return $query->result();        
    }

    public function getSubsByOrderId($id){    
        $this->db->join('sub_kriteria', 'sub_kriteria.criteria_id = criteria.id');
        $this->db->join('criteria', 'sub_kriteria.criteria_id = criteria.id');
        $this->db->select('criteria.name, sub_kriteria.score, sub_kriteria.description');
        $this->db->order_by('sub_kriteria.id');
        $this->db->where('sub_kriteria.criteria_id', $id);
        $this->db->where('criteria.cond', 1);
        $query = $this->db->get('sub_kriteria');
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
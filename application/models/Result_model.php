<?php
class Result_model extends CI_Model
{

	public function getResult($id)
	{
		$this->db->select('data_alternatif.name AS name, result.hasil AS hasil');
        $this->db->from('result');
        $this->db->join('data_alternatif', 'data_alternatif.id=result.data_alternatif_id');   
        $this->db->where('topic_id', $id);      
        $this->db->order_by('result.hasil', 'desc');                   
        // $this->db->where('calculate.sub_kriteria_id', $sub_id);
        // $this->db->where('calculate.topic_id', $topic_id);
        $query = $this->db->get();
        return $query->result();
	}

    public function getDataAlternatif(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('data_alternatif');
        return $query->result();
    }

    public function getTopic()
	{
		$this->db->order_by('id');
		$this->db->where('cond', 1);
		$query = $this->db->get('topic');
		return $query->result();
	}

	public function getResultById($id)
	{
		$this->db->where('id', $id);
        // $this->db->where('id', $data_id);
		$this->db->where('cond', 1);
		$query = $this->db->get('result');
		return $query->result();
	}
    
    public function getData($id){
        $this->db->select('calculate.data_alternatif_id, calculate.topic_id, data_alternatif.name AS data_name');
        $this->db->from('calculate');
        $this->db->join('data_alternatif', 'data_alternatif.id=calculate.data_alternatif_id');   
        $this->db->where('topic_id', $id);      
        $this->db->group_by('calculate.data_alternatif_id');                   
        // $this->db->where('calculate.sub_kriteria_id', $sub_id);
        // $this->db->where('calculate.topic_id', $topic_id);
        $query = $this->db->get();
        return $query->result();
    }

    // public function getMatrix()
    // {
    //     $this->db->select('calculate.data_alternatif_id, calculate.topic_id, sub_kriteria.score AS score,criteria.sts AS status_criteria,calculate.criteria_id');
    //     $this->db->from('calculate');
    //     $this->db->join('criteria', 'criteria.id=calculate.criteria_id');
    //     $this->db->join('sub_kriteria', 'sub_kriteria.id=calculate.sub_kriteria_id');
    //     // $this->db->where('data_alternatif_id', $data_id);
    //     // $this->db->where('topic_id', $topic_id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }    

    public function getCriteria(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('criteria');
        return $query->result();
    }

    public function getArrayScore($id)
    {
        $this->db->select('calculate.id AS calculate_id, calculate.topic_id AS topic, calculate.data_alternatif_id AS alternatif_id, sub_kriteria.score');
        $this->db->from('calculate');
        $this->db->join('sub_kriteria', 'sub_kriteria.id=calculate.sub_kriteria_id');        
        // $this->db->where('calculate.sub_kriteria_id', $sub_id);
        $this->db->where('calculate.topic_id', $id);
        $this->db->group_by('calculate_id');
        // $this->db->where('data_id', $id2);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBobot($id)
    {
        $this->db->select('calculate.criteria_id, criteria.bobot, criteria.sts');
        $this->db->from('calculate');        
        $this->db->join('criteria', 'criteria.id=calculate.criteria_id');                
        // $this->db->where('calculate.criteria.id', $criteria_id);
        $this->db->where('calculate.topic_id', $id);
        $this->db->group_by('criteria_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getMax($id)
    {
        $this->db->select('calculate.id AS calculate_id, calculate.topic_id AS topic, calculate.data_alternatif_id AS alternatif_id, MAX(sub_kriteria.score) AS max_score');
        $this->db->from('calculate');
        $this->db->join('sub_kriteria', 'sub_kriteria.id=calculate.sub_kriteria_id');        
        // $this->db->where('calculate.sub_kriteria_id', $sub_id);
        $this->db->where('calculate.topic_id', $id);
        // $this->db->group_by('calculate_id');
        // $this->db->where('data_id', $id2);
        $query = $this->db->get();
        return $query->result();
    }

    public function getMin($id)
    {
        $this->db->select('calculate.id AS calculate_id, calculate.topic_id AS topic, calculate.data_alternatif_id AS alternatif_id, MIN(sub_kriteria.score) AS min_score');
        $this->db->from('calculate');
        $this->db->join('sub_kriteria', 'sub_kriteria.id=calculate.sub_kriteria_id');        
        // $this->db->where('calculate.sub_kriteria_id', $sub_id);
        $this->db->where('calculate.topic_id', $id);
        // $this->db->group_by('calculate_id');
        // $this->db->where('data_id', $id2);
        $query = $this->db->get();
        return $query->result();
    }

	public function createResult($form_data)
	{
		$this->db->insert('result', $form_data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function updateResult($form_data, $topic_id)
	{
		$this->db->where('id', $form_data['id']);
        $this->db->where('id', $topic_id['id']);
		$this->db->update('result', $form_data, $topic_id);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function deleteResult($id)
	{
		$this->db->set('cond', 0);
		$this->db->where('id', $id);
		$this->db->where('cond', 1);
		$this->db->update('result');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function find_Result($id)
	{
		return $this->db->get_where('result', array('id' => $id))->row();
	}	
}

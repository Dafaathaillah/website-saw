<?php
class Criteria_model extends CI_Model {

    public function getCriteria(){
        $this->db->order_by('id');
        $this->db->where('cond', 1);
        $query = $this->db->get('criteria');
        return $query->result();
    }

    // public function getCriteriaByOrderId($id){
    //     $this->db->join('product_order', 'product_order.product_id = product.id');
    //     $this->db->join('order', 'product_order.order_id = order.id');
    //     $this->db->select('product.nome, product.sku, product.preco, product_order.product_qtd');
    //     $this->db->order_by('product.id');
    //     $this->db->where('product_order.order_id', $id);
    //     $this->db->where('order.status', 1);
    //     $query = $this->db->get('criteria');
    //     return $query->result();
    // }

    public function getCriteriaById($id){
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $query = $this->db->get('criteria');
        return $query->result();
    }

    public function createCriteria($form_data){
        $this->db->insert('criteria', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateCriteria($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('criteria', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteCriteria($id){
        $this->db->set('cond', 0);
        $this->db->where('id', $id);
        $this->db->where('cond', 1);
        $this->db->update('criteria');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
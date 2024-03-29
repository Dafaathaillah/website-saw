<?php
class Topic_model extends CI_Model
{
	public function rules(){
		return[
			['field' => 'name',
			'label' => 'name',
			'rules' => 'required'],
		];
	}
	public function getTopic($limit, $start)
	{
		$this->db->order_by('id');
		$this->db->where('cond', 1);
		$query = $this->db->get('topic', $limit, $start);
		return $query->result();
	}

	public function getAllTopic(){
		$this->db->order_by('id');
		$this->db->where('cond', 1);
		$query = $this->db->get('topic');
		return $query->result();
	}

	// public function gettopicByOrderId($id){
	//     $this->db->join('product_order', 'product_order.product_id = product.id');
	//     $this->db->join('order', 'product_order.order_id = order.id');
	//     $this->db->select('product.nome, product.sku, product.preco, product_order.product_qtd');
	//     $this->db->order_by('product.id');
	//     $this->db->where('product_order.order_id', $id);
	//     $this->db->where('order.status', 1);
	//     $query = $this->db->get('topic');
	//     return $query->result();
	// }

	public function getTopicById($id)
	{
		return $this->db->get_where($this->topic, ["id" => $id])->row();
	}

	public function createTopic($form_data)
	{
		$this->db->insert('topic', $form_data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function updateTopic()
	{
		$post = $this->input->post();
		$this -> id = $post["id"];
		$this -> name = $post["name"];
		$this -> cond = $post["cond"];

		return $this->db->update($this->topic, $this, array('id' => $post['id']));
	}

	public function deleteTopic($id)
	{
		$this->db->set('cond', 0);
		$this->db->where('id', $id);
		$this->db->where('cond', 1);
		$this->db->update('topic');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function find_topic($id)
	{
		return $this->db->get_where('topik', array('id' => $id))->row();
	}
}

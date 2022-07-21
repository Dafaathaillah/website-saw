<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('topic_model', 'topic');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('Topic/index');
		$config['total_rows'] = $this->db->count_all('topic');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;


		$choice = $config["total_rows"] / $config['per_page'];
		$config["num_links"] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';

		$choice = $config["total_rows"] / $config['per_page'];
        $config["num_links"] = floor($choice);

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';

		$config['full_tag_open'] = '<div class="pagination"><nav><ul class="pagination pagination-rounded">';
		$config['full_tag_close'] = '</ul></nav></div>';

		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';

		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';

		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';

		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';

		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		

		$this->pagination->initialize($config);

		$data = array();
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['topics'] = $this->topic->getTopic($config["per_page"], $data['page']);

		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('topik/mainTopik', $data);
	}

	public function form($topic_id = null)
	{
		$data = array();
		if ($topic_id) {
			$data['topic'] = $this->topic->getTopicById($topic_id);
		}
		$this->load->view('topik/createTopik', $data);
	}

	public function save($id = null)
	{
		$form_data = array(
			// 'id' => $id,
			'name' => $this->input->post('name')
		);
		if (!$id) {
			$send_form = $this->topic->createTopic($form_data);
		} else {
			$send_form = $this->topic->updateTopic($form_data);
		}

		if ($send_form) {
			$this->session->set_flashdata('message', array('success', 'Data berhasil ditambahkan!'));
			redirect('topic');
		} else {
			$this->session->set_flashdata('message', array('danger', 'Ops! Dados incorretos!'));
			redirect('topic/form');
		}
	}

	public function delete($id)
	{
		$this->topic->deleteTopic($id);
		redirect('topic');
	}

	public function edit($id)
	{
		$data['topik'] = $this->topic->get($id);
		$this->load->view('topik/mainEditTopik');
		$this->load->view('topik/editTopik', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('topik/editTopik/' . $id));
		} else {
			$this->topic->update($id);
			$this->session->set_flashdata('success', "Updated Successfully!");
			redirect(base_url('topic'));
		}
	}
}

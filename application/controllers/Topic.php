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
		$data = array();
		$data['topics'] = $this->topic->getTopic();
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

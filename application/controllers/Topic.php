<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('topic_model', 'topic');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('Topic/index');
		$config['total_rows'] = $this->db->count_all('topic');
		$config['per_page'] = 6;
		$config['uri_segment'] = 2;


		$choice = $config["total_rows"] / $config['per_page'];
		$config["num_links"] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagination justify-content-end"><nav><ul class="pagination justify-content-end">';
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
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
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
		$this->load->view('topik/mainEditTopik', $data);
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

	public function edit($id = null){
		if(!isset($id)) redirect('topic');

		$topic = $this->topic_model;
		$validation = $this->form_validation;
		$validation->set_rules($topic->rules());
		
		if ($validation->run()){
			$topic->update();
			$this->session->set_flashdata('succes', 'Berhasil Disimpan');
		}

		$data["topic"] = $topic->getTopicById($id);
		if (!$data["topic"]) show_404();
		 $this->load->view("topik/mainEditTopik", $data);
	}

	public function delete($id)
	{
		$this->topic->deleteTopic($id);
		redirect('topic');
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

	public function excel(){
		$data['topics'] = $this->topic->getAllTopic();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Dafa Maul Hafis");
		$object->getProperties()->getLastModifiedBy("Dafa Maul Hafis");
		$object->getProperties()->setTitle("Perhitungan SPK metode SAW");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'NAME of TOPIC');

		$baris = 2;
		$no = 1;

		foreach($data['topics'] as $tpc){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('A'.$baris, $tpc->name);

			$baris++;
		}
		$filename="Hasil Perhitungan SPK metode SAW".'.xlsx';

		$object->getActiveSheet()->setTitle("Perhitungan SPK metode SAW");

		header('Content-Type: application/vnd.openxmlformat-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename= "'.$filename. '"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}

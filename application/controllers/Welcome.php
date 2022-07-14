<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('sub_criteria_model','sub_criteria');
    }

	public function index()
	{
		// Layouts
		$data = array();
		// $data['sub_criterias'] = $this->sub_criteria->getSub();
		$data['sub_criterias'] = $this->sub_criteria->getSubsByCriteriaId();
		$this->load->view('subKriteria/mainSubKriteria', $data);
		// $this->load->view('layouts/main', $data);
		// $data['data_alternatifs'] = $this->data_alternatif->getData();
		// $this->load->view('dataAlternatif/main_data_alternatif', $data);
		// // Layouts
		// $this->load->view('layouts/main');
		// $this->load->view('landingPage/mainLanding');
		// $this->load->view('auth/login');
		// $this->load->view('auth/register');
		// $this->load->view('dataKriteria/mainEditDataKriteria');
		// $this->load->view('dataAlternatif/mainDataAlternatif');
		// $this->load->view('subKriteria/mainSubKriteria');
		// $this->load->view('subKriteria/mainEditSubKriteria');
		// $this->load->view('hasil/mainTableHasil');
		// $this->load->view('topik/mainEditTopik');
		// $this->load->view('perhitungan/mainPerhitungan');
	}
}

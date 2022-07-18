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

		// model for sub_criteria
        // $this->load->model('sub_criteria_model','sub_criteria');
		// $this->load->model('sub_criteria_model','sub_criteria');

		//model for calculate
		$this->load->model('calculate_model','calculate');
    }

	public function index()
	{
		// Layouts
		
		// For sub criteria section
		// $data = array();		
		// $data['sub_criterias'] = $this->sub_criteria->getSubsByCriteriaId(); //for data table
		// $data['criterias'] = $this->sub_criteria->getCriteria(); // for form input
		// $this->load->view('subKriteria/mainSubKriteria', $data); // load view

		// For Calculate Section
		$data = array();		
		$data['topic'] = $this->calculate->getTopic();
		$data['data_alternatif'] = $this->calculate->getData();
		$data['criterias'] = $this->calculate->getCriteria(); // for form input
		$data['sub_criterias'] = $this->calculate->getSubsByCriteriaId(); 		
		$data['subs'] = $this->calculate->getSubs(); 	
		$this->load->view('perhitungan/mainPerhitungan', $data);
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
	}
}

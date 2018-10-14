<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('verify');
        $this->load->model('logisticsSearch_model');
    }
    // Index
    public function index()
    {
        echo "helloworld";
        //$this->load->view('welcome_message');
    }

    //searchAllLogistics
    public function searchAllLogistics() {
        If (verify_test()){

        }

        $data=$this->logisticsSearch_model->searchAllLogistics();

        $this->load->view('show_message', $data);
    }
}

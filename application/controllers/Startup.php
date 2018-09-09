<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup extends CI_Controller {

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
        $this->load->model('startup_model');
        
    }

    public function index() {
        // if the session preference has not been set, start with forms
        $this->session->preference = isset($this->session->preference)?$this->session->preference:'forms';
        
        $data = [
            'v' => 'home',
            'title' => 'Venture Australia',
            'sub' => 'Startup Centre'
        ];
		$this->load->view('/startup/index',$data);
	}
    

    public function process() {
        // display the process page
        $data = [
            'v' => 'process',
            'title' => 'Starting a Business',
            'sub' => '(In Australia)'
        ];            
		$this->load->view('/startup/index',$data);
	}


    public function step() {
        // check what step was requested and display that page
        // if no step was specified, handle the null request and use step0.php to redirect to the process page
        $url = parse_url(current_url());
        $segs = explode('/',uri_string());
        $step = $this->uri->segment(3,0);
        $q = $this->uri->segment(4,0);
        if(count($segs)>4) { 
            $ctype = $segs[4];
            $cdata = $segs[5];
        } else {
            $ctype = null;
            $cdata = null;            
        }
        if($step) {
            $title = 'Step '.$step;
            switch($step) {
                case 1: 
                    $sub = 'Not What, But Why?';
                break;
                case 2: 
                    $sub = 'Legal Structure';
                break;
                case 3:
                    $sub = 'Digital Readiness';
                break;
                case 4: 
                    $sub = 'Ongoing Support';
                break;
            }
            switch($q) {
                case 0:
                    $question = file_get_contents($url['scheme']. '://'.$url['host'].'/startup/steps/1/0');;
                    break;
                default:
                    $title = false;
                    $question = $this->startup_model->question($q);
                    $qanswers = $this->startup_model->qanswers($q,$url);
                    $answer = $this->startup_model->answer($q);
                    $prev = $url['scheme']. '://'.$url['host'].'/startup/step/1/'.($q-1);
                    $next = $url['scheme']. '://'.$url['host'].'/startup/step/1/'.($q+1);
            }
        } else {
            redirect('/startup/process');
        }
        // display the step page with the relevant data
        if($title) {
            $data = [
                'v' => 'step',
                'title' => $title,
                'sub' => $sub,
                'step' => $step,
                'q' => $question,
                'ctype' => $ctype,
                'cdata' => $cdata,
            ];
        } else {
            $data = [
                'v' => 'question',
                'step' => $step,
                'qtext' => $question,
                'qansw' => $qanswers,
                'atext' => $answer,
                'prev' => $prev,
                'next' => $next,
                'ctype' => $ctype,
                'cdata' => $cdata
            ];            
        }
        $this->load->view('/startup/index',$data);
            
	}
    
    
    public function steps() {
        $step = $this->uri->segment(3,0);
        $q = $this->uri->segment(4,0);
        if($q) {
            $this->load->view('/startup/steps/'.$step.'/'.$q);
        } else {
            $this->load->view('/startup/steps/default.html');
        }
    }


    public function chat() {
        // set the intraction preference to chat and head back to the referring page (or home if not a referral)
        $this->session->preference = 'chat';
        if($this->agent->referrer()) {
            redirect($this->agent->referrer());
        } else {
            $data = [
                'v' => 'home',
                'title' => 'Venture Australia',
                'sub' => 'Startup Centre'
            ];
            $this->load->view('/startup/index',$data);
        }
    }


    public function forms() {
        // set the intraction preference to forms and head back to the referring page (or home if not a referral)
        $this->session->preference = 'forms';
        if ($this->agent->referrer()) {
            redirect($this->agent->referrer());
        } else {
            $data = [
                'v' => 'home',
                'title' => 'Venture Australia',
                'sub' => 'Startup Centre'
            ];
            $this->load->view('/startup/index',$data);
        }
    }
    

}

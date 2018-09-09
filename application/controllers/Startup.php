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
        $step = $this->uri->segment(3,0);
        $q = $this->uri->segment(4,0);
        if($step) {
            $title = 'Step '.$step;
            switch($step) {
                case 1: 
                    $sub = 'Not What, But Why?';
                    $chart = 'fusion';
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
        } else {
            redirect('/startup/process');
        }
        // display the step page with the relevant data
        $data = [
            'v' => 'step',
            'title' => $title,
            'sub' => $sub,
            'step' => $step,
            'c' => $chart
        ];            
		$this->load->view('/startup/index',$data);
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
    
    
    public function visuals() {
        // based on the session data we need to display the relevant data for the question just asked
        $data = [
            'v' => 'opp',
            'title' => 'Opportunity'
        ];
        $this->load->view('/startup/chart',$data);
    }

}

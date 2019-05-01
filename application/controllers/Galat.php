<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Galat extends CI_Controller {
	public function _404() {
		if(strpos($_SERVER["PHP_SELF"],"/pengurus/") && $this->session->userdata("username")) {
            $menu = array(
                "judul" => "404 Not Found",
                "judul_sub" => ""
            );
            $data  = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));

			$this->load->view("galat/pengurus", $data);
        } else {
			$menu = array(
				"judul" => "404 Not Found"
			);
			$data		= $this->M_Pendahuluan->umum($menu);

			$this->load->view("galat/umum", $data);
        }
	}
}
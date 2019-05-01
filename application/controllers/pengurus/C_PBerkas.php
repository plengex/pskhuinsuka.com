<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PBerkas extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Berkas",
                "judul_sub" => "Daftar"
            );
            $data  			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $berkas     = $this->M_Berkas->daftar();
            if ($berkas["status"] === 200) {
                $data["data"] = @array_merge($data["data"],
                    array(
                        "daftar" => $berkas["keterangan"]
                    )
                );
            } else {
                $data["data"] = @array_merge($data["data"],
                    array(
                        "daftar" => ""
                    )
                );
            }

			$this->load->view("pengurus/berkas", $data);
        } else {
            redirect("pengurus");
        }
    }
}
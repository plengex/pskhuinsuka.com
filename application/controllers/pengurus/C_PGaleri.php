<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PGaleri extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Galeri",
                "judul_sub" => "Keterangan"
            );
            $data  			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

			$periode    = $this->M_Organisasi->periode_daftar();
			$galeri     = $this->M_Galeri->lihat($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"]);
			if ($periode["status"] === 200 && $galeri["status"] === 200) {
				$data["data"] = @array_merge($data["data"],
					array(
						"daftar_periode" => $periode["keterangan"]
					)
				);
				$data["data"] = @array_merge($data["data"], $galeri["keterangan"]);
			} else {
				$data["data"] = @array_merge($data["data"],
					array(
						"daftar_periode" => "",
						"periode" => ""
					)
				);
			}

			$this->load->view("pengurus/galeri", $data);
        } else {
            redirect("pengurus");
        }
    }
}
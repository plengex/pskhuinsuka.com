<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_POrganisasi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

  public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Organisasi",
				"judul_sub" => "Profil"
			);
			$data			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

			$periode	= $this->M_Organisasi->periode_daftar();
			$organisasi	= $this->M_Organisasi->lihat($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"]);
			if ($periode["status"] === 200 && $organisasi["status"] === 200) {
				$data["data"] = @array_merge($data["data"], array(
						"daftar_periode" => $periode["keterangan"]
					)
				);
				$data["data"] = @array_merge($data["data"], $organisasi["keterangan"]);
			} else {
				$data["data"] = @array_merge($data["data"], array(
						"daftar_periode" => "",
						"periode" => "",
						"foto" => "assets/gambar/organisasi/_standar_logo.png"
					)
				);
			}

			$jpendapat	= $this->M_JPendapat->daftar();
			if ($jpendapat["status"] === 200) {
				$data["data"] = @array_merge($data["data"],
					array(
						"jpendapat" => $jpendapat["keterangan"]
					)
				);
			} else {
				$data["data"] = @array_merge($data["data"],
					array(
						"jpendapat" => ""
					)
				);
			}

			$this->load->view("pengurus/organisasi", $data);
		} else {
			redirect("pengurus");
		}
	}
}
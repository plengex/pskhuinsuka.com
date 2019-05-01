<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PProfil extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Profil",
				"judul_sub" => "Profil"
			);
			$data  = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();
			
			$periode	= $this->M_Organisasi->periode_daftar();
			$keanggotaan		= $this->M_Keanggotaan->lihat($this->session->userdata("username"));
			if ($periode["status"] === 200 && $keanggotaan["status"] === 200) {
				$data["data"]	= @array_merge($data["data"],
					array(
						"daftar_periode" => $periode["keterangan"]
					)
				);
				$data["data"]	= @array_merge($data["data"], $keanggotaan["keterangan"]);
			} else {
				redirect(base_url("pengurus/")."keanggotaan/beranda");
			}

			$divisi	= $this->M_Divisi->daftar();
			if ($divisi["status"] === 200) {
				$data["data"] = @array_merge($data["data"],
					array(
						"daftar_divisi" => $divisi["keterangan"]
					)
				);
			} else {
				$data["data"] = @array_merge($data["data"],
					array(
						"daftar_divisi" => ""
					)
				);
			}

			$this->load->view("pengurus/profil", $data);
		} else {
			redirect("pengurus");
		}
	}
}
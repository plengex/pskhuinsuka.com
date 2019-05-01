<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PKeanggotaan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
	}

  	public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Keanggotaan",
				"judul_sub" => "Daftar"
			);
			$data		= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

			$periode	= $this->M_Organisasi->periode_daftar();
			if ($periode["status"] === 200) {
				$keanggotaan	= $this->M_Keanggotaan->daftar($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"]);
				if ($keanggotaan["status"] === 200) {
					$data["data"]	= @array_merge($data["data"],
						array(
							"daftar_periode" => $periode["keterangan"],
							"daftar" => $keanggotaan["keterangan"]
						)
					);
				} else {
					$data["data"]	= @array_merge($data["data"],
						array(
							"daftar_periode" => $periode["keterangan"],
							"daftar" => ""
						)
					);
				}
			} else {
				$data["data"]	= @array_merge($data["data"],
					array(
						"daftar_periode" => "",
						"daftar" => ""
					)
				);
			}

			$this->load->view("pengurus/keanggotaan", $data);
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function lihat($username) {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Keanggotaan",
				"judul_sub" => "Sunting"
			);
			$data			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

			$periode		= $this->M_Organisasi->periode_daftar();
			$keanggotaan	= $this->M_Keanggotaan->lihat($username);
			if ($periode["status"] === 200 && $keanggotaan["status"] === 200) {
				$data["data"]	= @array_merge($data["data"],
					array(
						"daftar_periode" => $periode["keterangan"]
					)
				);
				$data["data"]	= @array_merge($data["data"], $keanggotaan["keterangan"]);
			} else {
				redirect(base_url("pengurus/")."keanggotaan/tambah");
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
			redirect(base_url("pengurus"));
		}
	}

	public function tambah() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Keanggotaan",
				"judul_sub" => "Tambah"
			);
			$data			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();
			
			$periode	= $this->M_Organisasi->periode_daftar();
			if ($periode["status"] === 200) {
				$data["data"] = @array_merge($data["data"], array(
						"daftar_periode" => $periode["keterangan"],
						"periode" => "",
						"foto" => "assets/gambar/keanggotaan/_standar.png"
					)
				);
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
			redirect(base_url("pengurus"));
		}
	}
}
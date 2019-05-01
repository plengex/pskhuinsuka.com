<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Umum extends CI_Controller {
	public function index() {
		$menu = array(
			"judul" => "Beranda"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		$divisi = $this->M_Divisi->daftar();
		if ($divisi["status"] === 200) {
			$data["data"] = @array_merge($data["data"],
				array(
					"divisi" => $divisi["keterangan"],
				)
			);
		} else {
			$data["data"] = @array_merge($data["data"],
				array(
					"divisi" => "",
				)
			);
		}

		$jpendapat = $this->M_JPendapat->daftar();
		if ($divisi["status"] === 200) {
			$data["data"] = @array_merge($data["data"],
				array(
					"jpendapat" => $jpendapat["keterangan"],
				)
			);
		} else {
			$data["data"] = @array_merge($data["data"],
				array(
					"jpendapat" => ""
				)
			);
		}
		
		if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$data["organisasi"]["periode"]."_portrait.png")) {
			$foto	= "assets/gambar/organisasi/".$data["organisasi"]["periode"]."_portrait.png";
		} else {
			$foto	= "assets/gambar/organisasi/_standar_portrait.png";
		}
		$data["data"] = @array_merge($data["data"],
			array(
				"portrait" => $foto
			)
		);
		
		if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$data["organisasi"]["periode"]."_landscape.png")) {
			$foto	= "assets/gambar/organisasi/".$data["organisasi"]["periode"]."_landscape.png";
		} else {
			$foto	= "assets/gambar/organisasi/_standar_landscape.png";
		}
		$data["data"] = @array_merge($data["data"],
			array(
				"landscape" => $foto
			)
		);

		$berita = $this->M_Berita->daftar_umum();
		if ($berita["status"] === 200) {
			$data["data"] = @array_merge($data["data"],
				array(
					"berita" => $berita["keterangan"],
				)
			);
		} else {
			$data["data"] = @array_merge($data["data"],
				array(
					"berita" => ""
				)
			);
		}
		
		$this->load->view("umum/beranda", $data);
	}

	public function kontak() {
		$menu = array(
			"judul" => "Kontak"
		);
		$data			= $this->M_Pendahuluan->umum($menu);
		$data["api"] 	= base_url("..")."/pskhuinsuka.com.api";

		$this->load->view("umum/kontak", $data);
	}

	public function artikel($tahun="", $bulan="", $id="", $judul="") {
		$menu = array(
			"judul" => "Artikel"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		if(!empty($id) && is_numeric($id)){
			$artikel	= $this->M_Artikel->daftar_terbit($tahun, $bulan, $id);
		} elseif(!empty($bulan) && is_numeric($bulan)){
			$artikel	= $this->M_Artikel->daftar_terbit($tahun, $bulan, $id);
		} elseif(!empty($tahun) && is_numeric($tahun)){
			$artikel	= $this->M_Artikel->daftar_terbit($tahun, $bulan, $id);
		} else {
			$artikel	= $this->M_Artikel->daftar_terbit($tahun, $bulan, $id);
		}

		$data["data"] = @array_merge($data["data"], $artikel["keterangan"]);
		if (!empty($id) && is_numeric($id)) {
			$this->load->view("umum/artikel_lihat", $data);
		} else {
			$this->load->view("umum/artikel", $data);
		}
	}

	public function berita($tahun="", $bulan="", $id="", $judul="") {
		$menu = array(
			"judul" => "Berita"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		if(!empty($id) && is_numeric($id)){
			$berita	= $this->M_Berita->daftar_terbit($tahun, $bulan, $id);
		} elseif(!empty($bulan) && is_numeric($bulan)){
			$berita	= $this->M_Berita->daftar_terbit($tahun, $bulan, $id);
		} elseif(!empty($tahun) && is_numeric($tahun)){
			$berita	= $this->M_Berita->daftar_terbit($tahun, $bulan, $id);
		} else {
			$berita	= $this->M_Berita->daftar_terbit($tahun, $bulan, $id);
		}

		$data["data"] = @array_merge($data["data"], $berita["keterangan"]);
		if (!empty($id) && is_numeric($id)) {
			$this->load->view("umum/berita_lihat", $data);
		} else {
			$this->load->view("umum/berita", $data);
		}
	}

	public function kegiatan() {
		$menu = array(
			"judul" => "Kegiatan"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		$periode 	= $this->M_Organisasi->periode_terakhir();
		$kegiatan	= $this->M_Kegiatan->daftar($periode["keterangan"]);
		if ($periode["status"] === 200 && $kegiatan["status"] === 200) {
			$data["data"] = @array_merge($data["data"], $kegiatan["keterangan"]);
		} else {
			$data["data"] = @array_merge($data["data"], "");
		}

		$this->load->view("umum/kegiatan", $data);
	}

	public function galeri() {
		function curl_get($url)
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($curl);
			curl_close($curl);
			return json_decode($result, true);
		}

		$menu = array(
			"judul" => "Galeri"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		$periode	= $this->M_Organisasi->periode_terakhir();
		$galeri     = $this->M_Galeri->lihat($periode["keterangan"]);

		if ($periode["status"] === 200 && $galeri["status"] === 200) {
			$instagram_aksestoken	= $galeri["keterangan"]["instagram"];
			$instagram				= curl_get("https://api.instagram.com/v1/users/self/media/recent/?access_token=".$instagram_aksestoken);

			if ($instagram["meta"]["code"] === 200) {
				$data["data"] = @array_merge($data["data"], $instagram["data"]);
			} else {
				$data["data"] = @array_merge($data["data"], "");
			}
		} else {
			$data["data"] = @array_merge($data["data"], "");
		}

		$this->load->view("umum/galeri", $data);
	}

	public function berkas() {
		$menu = array(
			"judul" => "Berkas"
		);
		$data		= $this->M_Pendahuluan->umum($menu);
		$data["data"]	= array();

		$berkas	= $this->M_Berkas->daftar();
		if ($berkas["status"] === 200) {
			$data["data"] = @array_merge($data["data"], $berkas["keterangan"]);
		} else {
			$data["data"] = @array_merge($data["data"], "");
		}

		$this->load->view("umum/berkas", $data);
	}

	public function pendaftaran() {
		$this->load->library("form_validation");

		$menu = array(
			"judul" => "Pendaftaran"
		);
		$data		 	= $this->M_Pendahuluan->umum($menu);
		$data["api"] 	= base_url("..")."/pskhuinsuka.com.api";
		$data["data"]	= array();

		$periode		= $this->M_Organisasi->periode_terakhir();
		$pendaftaran	= $this->M_Organisasi->pendaftaran($periode["keterangan"]);
		if($periode["status"] === 200 && $pendaftaran["keterangan"] == 1) {
			$data["data"] = @array_merge($data["data"], array(
					"periode" => $periode["keterangan"]
				)
			);
	
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
	
			$this->load->view("umum/pendaftaran", $data);
		} else {
			redirect(base_url());
		}
	}
}
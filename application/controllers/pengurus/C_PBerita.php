<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PBerita extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Berita",
                "judul_sub" => "Daftar"
            );
            $data           = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $berita    = $this->M_Berita->daftar($data["pengguna"]["username"], $data["pengguna"]["jabatan"]);
            if ($berita["status"] === 200) {
                $data["data"] = @array_merge($data["data"], $berita["keterangan"]);
            } else {
                $data["data"] = @array_merge($data["data"], "");
            }

            $this->load->view("pengurus/berita", $data);
        } else {
            redirect("pengurus");
        }
    }

    public function tambah() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Berita",
                "judul_sub" => "Tambah"
            );
            $data           = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $divisi		= $this->M_Divisi->lihat($data["pengguna"]["divisi"]);
            if ($divisi["status"] === 200) {
                $data["data"] = @array_merge($data["data"], array(
                        "divisi" => $divisi["keterangan"]["keterangan"]
                    )
                );
            } else {
                redirect("pengurus/berita");
            }

            $this->load->view("pengurus/berita_pengaturan", $data);
        } else {
            redirect("pengurus/berita");
        }
    }

    public function perbarui($id) {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Berita",
                "judul_sub" => "Sunting"
            );
            $data           = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $berita    = $this->M_Berita->lihat($id);
            if ($berita["status"] === 200) {
                $data["data"] = @array_merge($data["data"], $berita["keterangan"]);
            } else {
                redirect("pengurus/berita/tambah");
            }

            $this->load->view("pengurus/berita_pengaturan", $data);
        } else {
            redirect("pengurus");
        }
    }
}
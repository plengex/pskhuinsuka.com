<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PArtikel extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
                "judul_sub" => "Daftar"
            );
            $data           = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $artikel    = $this->M_Artikel->daftar($data["pengguna"]["username"], $data["pengguna"]["jabatan"]);
            if ($artikel["status"] === 200) {
                $data["data"] = @array_merge($data["data"], $artikel["keterangan"]);
            } else {
                $data["data"] = @array_merge($data["data"], "");
            }

            $this->load->view("pengurus/artikel", $data);
        } else {
            redirect("pengurus");
        }
    }

    public function tambah() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
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
                redirect("pengurus/artikel");
            }

            $this->load->view("pengurus/artikel_pengaturan", $data);
        } else {
            redirect("pengurus/artikel");
        }
    }

    public function perbarui($id) {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
                "judul_sub" => "Sunting"
            );
            $data           = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $artikel    = $this->M_Artikel->lihat($id);
            if ($artikel["status"] === 200) {
                $data["data"] = @array_merge($data["data"], $artikel["keterangan"]);
            } else {
                redirect("pengurus/artikel/tambah");
            }

            $this->load->view("pengurus/artikel_pengaturan", $data);
        } else {
            redirect("pengurus");
        }
    }
}
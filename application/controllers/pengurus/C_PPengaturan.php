<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PPengaturan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Pengaturan",
                "judul_sub" => "Kepengurusan"
            );
            $data  = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

            $periode_daftar	= $this->M_Organisasi->periode_daftar();
			if ($periode_daftar["status"] === 200) {
                $data["data"] = @array_merge($data["data"],
                    array(
                        "daftar_periode" => $periode_daftar["keterangan"],
                        "periode" => $periode_daftar["keterangan"][count($periode_daftar["keterangan"])-1]["organisasi_periode"]
                    )
                );
			} else {
                $data["data"] = @array_merge($data["data"],
                    array(
                        "daftar_periode" => "",
                        "periode" => $periode["periode_keterangan"]
                    )
                );
            }

            $divisi		= $this->M_Divisi->lihat($data["pengguna"]["divisi"]);
            if ($divisi["status"] === 200) {
                $data["data"] = @array_merge($data["data"], array(
                        "divisi" => $divisi["keterangan"]["keterangan"]
                    )
                );
            } else {
                $data["data"] = @array_merge($data["data"], array(
                        "divisi" => ""
                    )
                );
            }

            $pendaftaran = $this->M_Organisasi->pendaftaran($periode_daftar["keterangan"][count($periode_daftar["keterangan"])-1]["organisasi_periode"]);
            if ($pendaftaran["status"] === 200) {
                $data["data"] = @array_merge($data["data"], array(
                        "pendaftaran" => $pendaftaran["keterangan"]
                    )
                );
            } else {
                $data["data"] = @array_merge($data["data"], array(
                        "pendaftaran" => 0
                    )
                );
            }

			$this->load->view("pengurus/pengaturan", $data);
        } else {
            redirect("pengurus");
        }
    }
}
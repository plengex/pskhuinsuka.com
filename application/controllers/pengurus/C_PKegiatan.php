<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PKegiatan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		pengurus();
    }

    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Kegiatan",
                "judul_sub" => "Daftar"
            );
            $data  			= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();

			$periode    = $this->M_Organisasi->periode_daftar();
			if ($periode["status"] === 200) {
                $kegiatan     = $this->M_Kegiatan->daftar($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"]);
                if ($kegiatan["status"] === 200) {
                    $data["data"] = @array_merge($data["data"],
                        array(
                            "daftar" => $kegiatan["keterangan"]
                        )
                    );
                } else {
                    $data["data"] = @array_merge($data["data"],
                        array(
                            "daftar" => ""
                        )
                    );
                }

                $data["data"] = @array_merge($data["data"],
                    array(
                        "daftar_periode" => $periode["keterangan"]
                    )
                );
			} else {
				$data["data"] = @array_merge($data["data"],
					array(
						"daftar_periode" => "",
                        "daftar" => "",
					)
				);
			}

			$this->load->view("pengurus/kegiatan", $data);
        } else {
            redirect("pengurus");
        }
    }
}
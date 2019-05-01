<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Kegiatan extends CI_Model {
    public function daftar($periode)
    {
        $query = $this->db->select("*")->from("kegiatan")->where("kegiatan_periode", $periode)->order_by("kegiatan_tanggal", "ASC")->get();
        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar kegiatan tidak ditemukan."
            );
        }
    }
}
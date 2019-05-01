<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Divisi extends CI_Model {
    public function daftar()
    {
        $query = $this->db->select("*")->from("divisi")->get();

        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar divisi tidak ditemukan."
            );
        }
    }

    public function lihat($id)
    {
        $query = $this->db->select("*")->from("divisi")->where("divisi_id", $id)->get();
        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => array (
                    "id" => $query->row()->divisi_id,
                    "keterangan" => $query->row()->divisi_keterangan,
                    "penjelasan" => $query->row()->divisi_penjelasan
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Divisi tidak ditemukan."
            );
        }
    }
}
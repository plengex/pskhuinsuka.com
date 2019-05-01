<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Keuangan extends CI_Model {
    public function daftar($periode, $bulan)
    {
        if (!empty($bulan) && is_numeric($bulan)) {
            $query = $this->db->select("bulan.bulan_keterangan, keuangan.*")->from("keuangan")
            ->join("bulan", "bulan.bulan_id=MONTH(keuangan.keuangan_tanggal)")
            ->where("keuangan_periode", $periode)
            ->where("MONTH(keuangan_tanggal)", $bulan)
            ->order_by("keuangan_tanggal", "ASC")
            ->get();
        } else {
            $query = $this->db->select("bulan.bulan_keterangan, keuangan.*")->from("keuangan")
            ->join("bulan", "bulan.bulan_id=MONTH(keuangan.keuangan_tanggal)")
            ->where("keuangan_periode", $periode)
            ->order_by("keuangan_tanggal", "ASC")
            ->get();
        }

        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Laporan tidak ditemukan."
            );
        }
    }

    public function bulan_daftar($periode) {
        $query = $this->db->select("keuangan.keuangan_tanggal, bulan.*")->from("keuangan")
        ->join("bulan", "bulan.bulan_id=MONTH(keuangan.keuangan_tanggal)")
        ->where("keuangan_periode", $periode)
        ->order_by("MONTH(keuangan.keuangan_tanggal)", "ASC")
        ->order_by("keuangan.keuangan_id", "ASC")
        ->get();

        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Data tidak ditemukan."
            );
        }
    }
}
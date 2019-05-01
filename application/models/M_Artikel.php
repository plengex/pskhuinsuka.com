<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Artikel extends CI_Model {
    public function daftar($username, $jabatan)
    {
        if ($jabatan === "1") {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->get();
        } else {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->where("artikel_penerbit", $username)
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
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }


    public function daftar_terbit($tahun, $bulan, $id)
    {
        if (!empty($id) && is_numeric($id)) {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul, artikel.artikel_isi")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->where("artikel_keterangan", "1")
            ->where("DATE_FORMAT(artikel_waktu,'%Y-%m')", "$tahun-$bulan")
            ->where("artikel_id", $id)
            ->order_by("artikel_waktu", "DESC")
            ->get();
        } elseif (!empty($bulan) && is_numeric($bulan)) {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul, artikel.artikel_isi")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->where("artikel_keterangan", "1")
            ->where("DATE_FORMAT(artikel_waktu,'%Y-%m')", "$tahun-$bulan")
            ->order_by("artikel_waktu", "DESC")
            ->get();
        } elseif (!empty($tahun) && is_numeric($tahun)) {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul, artikel.artikel_isi")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->where("artikel_keterangan", "1")
            ->where("DATE_FORMAT(artikel_waktu,'%Y')", "$tahun")
            ->order_by("artikel_waktu", "DESC")
            ->get();
        } else {
            $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul, artikel.artikel_isi")->from("artikel")
            ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
            ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
            ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
            ->where("artikel_keterangan", "1")
            ->order_by("artikel_waktu", "DESC")
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
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }

    public function daftar_draf()
    {
        $query = $this->db->select("keanggotaan_nama, divisi_keterangan, artikel_keterangan_keterangan, artikel.artikel_id, artikel.artikel_waktu, artikel.artikel_penerbit, artikel.artikel_judul")->from("artikel")
        ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
        ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
        ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
        ->where("artikel_keterangan", 2)
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
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }

    public function lihat($id)
    {
        $query = $this->db->select("keanggotaan_nama, keanggotaan_divisi, divisi_keterangan, artikel_keterangan_keterangan, artikel.*")->from("artikel")
        ->join("keanggotaan", "keanggotaan.keanggotaan_username=artikel.artikel_penerbit")
        ->join("divisi", "keanggotaan.keanggotaan_divisi=divisi.divisi_id")
        ->join("artikel_keterangan", "artikel_keterangan.artikel_keterangan_id=artikel.artikel_keterangan")
        ->where("artikel_id", $id)->get();

        if ($query->num_rows() > 0) {
            $query  = $query->row();

            if (!@is_file("./assets/gambar/keanggotaan/".$query->artikel_penerbit.".png")) {
                $foto	= base_url("assets/")."gambar/keanggotaan/_standar.png";
            } else {
                $foto	= base_url("assets/")."gambar/keanggotaan/".$query->artikel_penerbit.".png";
            }

            if (!@is_file("./assets/artikel/".$id.".png")) {
                $gambar	= "#";
            } else {
                $gambar	= base_url("assets/")."artikel/".$id.".png";
            }

            return array(
                "status" => 200,
                "keterangan" => array(
                    "id" => $query->artikel_id,
                    "keterangan" => $query->artikel_keterangan_keterangan,
                    "waktu" => $query->artikel_waktu,
                    "foto" => $foto,
                    "penerbit_nama" => $query->keanggotaan_nama,
                    "penerbit_divisi" => $query->divisi_keterangan,
                    "judul" => $query->artikel_judul,
                    "isi" => $query->artikel_isi,
                    "gambar" => $gambar
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }
}
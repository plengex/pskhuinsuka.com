<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Organisasi extends CI_Model {
    public function periode_daftar()
    {
        $periode = $this->db->select("organisasi_periode")->from("organisasi")->get();
        if ($periode->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($periode->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar periode tidak ditemukan."
            );
        }
    }

    public function periode_terakhir()
    {
        $periode = $this->db->select("organisasi_periode")->from("organisasi")->order_by("organisasi_periode","DESC")->limit(1)->get();
        if ($periode->num_rows() > 0) {
            $periode = $periode->row();
            return array(
                "status" => 200,
                "keterangan" => $periode->organisasi_periode
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar periode tidak ditemukan."
            );
        }
    }

    public function lihat($periode)
    {
        $query = $this->db->select("*")->from("organisasi")->where("organisasi_periode", $periode)->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$query->organisasi_periode."_logo.png")) {
                $logo	= "assets/gambar/organisasi/".$query->organisasi_periode."_logo.png";
            } else {
                $logo	= "assets/gambar/organisasi/_standar_logo.png";
            }

            return array(
                "status" => 200,
                "keterangan" => array(
                    "periode" => $query->organisasi_periode,
                    "logo" => $logo,
                    "nama_panjang" => $query->organisasi_nama_panjang,
                    "nama_pendek" => $query->organisasi_nama_pendek,
                    "visi" => $query->organisasi_visi,
                    "misi" => $query->organisasi_misi,
                    "deskripsi" => $query->organisasi_deskripsi,
                    "tentang" => $query->organisasi_tentang,
                    "sejarah" => $query->organisasi_sejarah,
                    "kontak" => array(
                        "alamat" => $query->organisasi_alamat,
                        "email" => $query->organisasi_email,
                        "telepon" => $query->organisasi_telepon,
                        "facebook" => $query->organisasi_facebook,
                        "twitter" => $query->organisasi_twitter,
                        "instagram" => $query->organisasi_instagram,
                        "youtube" => $query->organisasi_youtube,
                        "peta" => $query->organisasi_peta
                    )
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Profil organisasi tidak ditemukan."
            );
        }
    }

    public function pendaftaran($periode)
    {
        $pendaftaran = $this->db->select("organisasi_pendaftaran")->from("organisasi")->where("organisasi_periode", $periode)->get();
        if ($pendaftaran->num_rows() > 0) {
            $pendaftaran = $pendaftaran->row();
            return array(
                "status" => 200,
                "keterangan" => $pendaftaran->organisasi_pendaftaran
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "tidak ditemukan."
            );
        }
    }
}
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Keanggotaan extends CI_Model {
    public function daftar($periode)
    {
        $query = $this->db->select("akun.akun_keterangan, keanggotaan.*, divisi.divisi_keterangan, jabatan.jabatan_keterangan")->from("keanggotaan")
        ->join("akun", "akun.akun_username=keanggotaan.keanggotaan_username")
        ->join("jabatan", "jabatan.jabatan_id=keanggotaan.keanggotaan_jabatan")
        ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
        ->where("keanggotaan_periode", $periode)
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
                "keterangan" => "Daftar anggota tidak ditemukan."
            );
        }
    }

    public function lihat($username)
    {
        $query = $this->db->select("akun.akun_keterangan, keanggotaan.*, divisi.divisi_keterangan, jabatan.jabatan_keterangan")->from("keanggotaan")
        ->join("jabatan", "jabatan.jabatan_id=keanggotaan.keanggotaan_jabatan")
        ->join("divisi", "divisi.divisi_id=keanggotaan.keanggotaan_divisi")
        ->join("akun", "akun.akun_username=keanggotaan.keanggotaan_username")
        ->where("keanggotaan_username", $username)->get();

        if ($query->num_rows() > 0) {
            $query  = $query->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/keanggotaan/".$query->keanggotaan_username.".png")) {
                $foto	= "assets/gambar/keanggotaan/".$query->keanggotaan_username.".png";
            } else {
                $foto	= "assets/gambar/keanggotaan/_standar.png";
            }

            return array(
                "status" => 200,
                "keterangan" => array(
                    "keterangan" => $query->akun_keterangan,
                    "periode" => $query->keanggotaan_periode,
                    "foto" => $foto,
                    "username" => $query->keanggotaan_username,
                    "nama" => $query->keanggotaan_nama,
                    "angkatan" => $query->keanggotaan_angkatan,
                    "divisi" => $query->divisi_keterangan,
                    "jabatan" => $query->jabatan_keterangan,
                    "jabatan_x" => $query->keanggotaan_jabatan,
                    "email" => $query->keanggotaan_email,
                    "telepon" => $query->keanggotaan_telepon,
                    "motto" => $query->keanggotaan_motto
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Profil tidak ditemukan."
            );
        }
    }
}
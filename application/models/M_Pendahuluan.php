<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pendahuluan extends CI_Model {
    public function umum($menu) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"]
            )
        );

        $organisasi = $this->db->select("*")
        ->from("organisasi")->order_by("organisasi_periode", "desc")
        ->get();
        if ($organisasi->num_rows() > 0) {
            $organisasi = $organisasi->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png")) {
                $logo	= "assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png";
            } else {
                $logo	= "assets/gambar/organisasi/_standar_logo.png";
            }

            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "periode" => $organisasi->organisasi_periode,
                        "logo" => $logo,
                        "nama_panjang" => $organisasi->organisasi_nama_panjang,
                        "nama_pendek" => $organisasi->organisasi_nama_pendek,
                        "visi" => $organisasi->organisasi_visi,
                        "misi" => $organisasi->organisasi_misi,
                        "deskripsi" => $organisasi->organisasi_deskripsi,
                        "tentang" => $organisasi->organisasi_tentang,
                        "sejarah" => $organisasi->organisasi_sejarah,
                        "kontak" => array(
                            "alamat" => $organisasi->organisasi_alamat,
                            "email" => $organisasi->organisasi_email,
                            "telepon" => $organisasi->organisasi_telepon,
                            "facebook" => $organisasi->organisasi_facebook,
                            "twitter" => $organisasi->organisasi_twitter,
                            "instagram" => $organisasi->organisasi_instagram,
                            "youtube" => $organisasi->organisasi_youtube,
                            "peta" => $organisasi->organisasi_peta
                        )
                    )
                )
            );
        }
        else {
            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "periode" => "",
                        "logo" => "/assets/gambar/organisasi/_standar_logo.png",
                        "nama_lengkap" => "",
                        "nama_pendek" => "",
                        "visi" => "",
                        "misi" => "",
                        "deskripsi" => "",
                        "tentang" => "",
                        "sejarah" => "",
                        "kontak" => array(
                            "alamat" => "",
                            "email" => "",
                            "telepon" => "",
                            "facebook" => "",
                            "twitter" => "",
                            "instagram" => "",
                            "youtube" => "",
                            "peta" => ""
                        )
                    )
                )
            );
        }

        return $data;
    }

    public function pengurus($menu, $username) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"],
                "judul_sub" => $menu["judul_sub"]
            ),
            "api" => base_url("..")."/pskhuinsuka.com.api"
        );

        $organisasi = $this->db->select("organisasi_periode, organisasi_nama_panjang, organisasi_nama_pendek")->from("organisasi")->order_by("organisasi_periode", "desc")->get();

        if ($organisasi->num_rows() > 0) {
            $organisasi = $organisasi->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png")) {
                $logo	= "assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png";
            } else {
                $logo	= "assets/gambar/organisasi/_standar_logo.png";
            }

            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "logo" => $logo,
                        "nama_panjang" => $organisasi->organisasi_nama_panjang,
                        "nama_pendek" => $organisasi->organisasi_nama_pendek
                    )
                )
            );
        }
        else {
            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "logo" => "assets/gambar/organisasi/_standar_logo.png",
                        "nama_panjang" => "",
                        "nama_pendek" => ""
                    )
                )
            );
        }

        $keanggotaan = $this->db->select("keanggotaan_username, keanggotaan_nama, keanggotaan_divisi, keanggotaan_jabatan, akun_keterangan")->from("akun")
        ->join("keanggotaan","keanggotaan.keanggotaan_username=akun.akun_username")
        ->where("akun_username", $username)->get();
        if ($keanggotaan->num_rows() > 0) {
            $keanggotaan = $keanggotaan->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/keanggotaan/".$keanggotaan->keanggotaan_username.".png")) {
                $foto	= "assets/gambar/keanggotaan/".$keanggotaan->keanggotaan_username.".png";
            } else {
                $foto	= "assets/gambar/keanggotaan/_standar.png";
            }

            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "periode" => $keanggotaan->keanggotaan_periode,
                        "username" => $keanggotaan->keanggotaan_username,
                        "foto" => $foto,
                        "nama" => $keanggotaan->keanggotaan_nama,
                        "keterangan" => $keanggotaan->akun_keterangan,
                        "divisi" => $keanggotaan->keanggotaan_divisi,
                        "jabatan" => $keanggotaan->keanggotaan_jabatan
                    )
                )
            );
        } else {
            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "periode" => "",
                        "username" => "",
                        "foto" => "assets/gambar/keanggotaan/_standar.png",
                        "nama" => "",
                        "keterangan" => "",
                        "divisi" => "",
                        "jabatan" => ""
                    )
                )
            );
        }

        return $data;
    }

    public function masuk() {
        $data = array(
            "judul" => "Masuk",
            "api" => base_url("..")."/pskhuinsuka.com.api"
        );

        $organisasi = $this->db->select("organisasi_periode, organisasi_nama_panjang")->from("organisasi")->order_by("organisasi_periode", "desc")->get();
        if ($organisasi->num_rows() > 0) {
            $organisasi = $organisasi->row();

            if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png")) {
                $logo	= "assets/gambar/organisasi/".$organisasi->organisasi_periode."_logo.png";
            } else {
                $logo	= "assets/gambar/organisasi/_standar_logo.png";
            }

            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "logo" => $logo,
                        "nama_panjang" => $organisasi->organisasi_nama_panjang
                    )
                )
            );
        }
        else {
            $data = @array_merge($data,
                array(
                    "organisasi" => array(
                        "logo" => "assets/gambar/organisasi/_standar_logo.png",
                        "nama_panjang" => ""
                    )
                )
            );
        }

        return $data;
    }
}
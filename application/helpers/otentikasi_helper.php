<?php
function pengurus()
{
    $_this = get_instance();
    if (!$_this->session->userdata("username")) {
    	redirect("pengurus");
    } else {
        $username = $_this->session->userdata("username");
        $pengguna = $_this->db->select("keanggotaan_username, keanggotaan_nama, keanggotaan_divisi, keanggotaan_jabatan, akun_keterangan")->from("akun")
        ->join("keanggotaan","keanggotaan.keanggotaan_username=akun.akun_username")
        ->where("akun_username", $username)->get()->row_array();
        if ($pengguna["akun_keterangan"] === "1") {
            $menu = @strtolower($_this->uri->segment(2));
            // if (
            //     (
            //         $menu === "organisasi"
            //         && $pengguna["keanggotaan_jabatan"] === "1"
            //     )
            //     || (
            //         $menu === "keanggotaan"
            //         && (
            //             $pengguna["keanggotaan_jabatan"] === "1"
            //             || $pengguna["keanggotaan_jabatan"] === "2"
            //         )
            //     )
            //     || (
            //         $menu === "keuangan"
            //         && (
            //             $pengguna["keanggotaan_jabatan"] === "1"
            //             || $pengguna["keanggotaan_jabatan"] === "3"
            //         )
            //     )
            // ) {
            //     //no action
            // } else {
            //     $_menu = array(
            //         "judul" => "404 Not Found",
            //         "judul_sub" => ""
            //     );
                
            //     $data  = $_this->M_Pendahuluan->pengurus($_menu, $_this->session->userdata("username"));
    
            //     $_this->load->view("galat/pengurus", $data);
            // }

            if (
                (
                    $menu === "organisasi"
                    && $pengguna["keanggotaan_jabatan"] !== "1"
                )
                || (
                    $menu === "keanggotaan"
                    && (
                        $pengguna["keanggotaan_jabatan"] !== "1"
                        && $pengguna["keanggotaan_jabatan"] !== "2"
                    )
                )
                || (
                    $menu === "keuangan"
                    && (
                        $pengguna["keanggotaan_jabatan"] !== "1"
                        && $pengguna["keanggotaan_jabatan"] !== "3"
                    )
                )
                || (
                    $menu === "kegiatan"
                    && (
                        $pengguna["keanggotaan_jabatan"] !== "1"
                        && $pengguna["keanggotaan_jabatan"] !== "2"
                    )
                )
                || (
                    $menu === "berkas"
                    && (
                        $pengguna["keanggotaan_jabatan"] !== "1"
                        && $pengguna["keanggotaan_jabatan"] !== "2"
                    )
                )
                || (
                    $menu === "galeri"
                    && $pengguna["keanggotaan_jabatan"] !== "1"
                )
                || (
                    $menu === "pengaturan"
                    && $pengguna["keanggotaan_jabatan"] !== "1"
                )
            ) {
                $_menu = array(
                    "judul" => "404 Not Found",
                    "judul_sub" => ""
                );
                
                $data  = $_this->M_Pendahuluan->pengurus($_menu, $_this->session->userdata("username"));
    
                $_this->load->view("galat/pengurus", $data);
            }
        } else {
            $_this->session->unset_userdata("username");
            redirect("pengurus");
        }
    }
}
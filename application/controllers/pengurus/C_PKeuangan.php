<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PKeuangan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library("pdf");
		pengurus();
    }

    public function index() {
			if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Keuangan",
				"judul_sub" => "Laporan"
			);
			$data		= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$data["data"]	= array();
			
			$periode	= $this->M_Organisasi->periode_daftar();
			if ($periode["status"] === 200) {
				$bulan 			= $this->M_Keuangan->bulan_daftar($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"]);
				$keuangan		= $this->M_Keuangan->daftar($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"], date("n"));
				$keuangan_semua	= $this->M_Keuangan->daftar($periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"], "");
				if ($bulan["status"] === 200 && $keuangan["status"] === 200 && $keuangan_semua["status"] === 200) {
					if ($keuangan["status"] === 200) {
						$data["data"]	= @array_merge($data["data"],
							array(
								"daftar_periode" => $periode["keterangan"],
								"daftar_bulan" => $bulan["keterangan"],
								"periode" => $periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"],
								"daftar" => $keuangan["keterangan"],
								"daftar_semua" => $keuangan_semua["keterangan"]
							)
						);
					}
				} else {
					$data["data"]	= @array_merge($data["data"],
						array(
							"daftar_periode" => $periode["keterangan"],
							"daftar_bulan" => "",
							"periode" => $periode["keterangan"][count($periode["keterangan"])-1]["organisasi_periode"],
							"daftar" => "",
							"daftar_semua" => ""
						)
					);
				}
				
			} else {
				$data["data"]	= @array_merge($data["data"],
					array(
						"daftar_periode" => "",
						"daftar_bulan" => "",
						"periode" => "",
						"daftar" => "",
						"daftar_semua" => ""
					)
				);
			}
// print_r($data); exit;
			$this->load->view("pengurus/keuangan", $data);
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function cetak($periode, $bulan="") {
		if(
			$this->session->userdata("username")
			&& !empty($periode) && is_string($periode) === TRUE
		) {
			$keuangan	= $this->M_Keuangan->daftar($periode, $bulan);
			if ($keuangan["status"] === 200) {
				if (!empty($bulan) && is_numeric($bulan)) {
					$judul =  "Laporan Keuangan Periode ".@str_replace("-", "/", $keuangan["keterangan"]["0"]["keuangan_periode"])." (Bulan ".$keuangan["keterangan"]["0"]["bulan_keterangan"].")";
				} else {
					$judul = "Laporan Keuangan Periode ".@str_replace("-", "/", $keuangan["keterangan"]["0"]["keuangan_periode"])." (Semua Bulan)";
				}

				$menu = array(
					"judul" => $judul
				);
				$data		= $this->M_Pendahuluan->umum($menu);
	
				//membuat halaman baru
				$pdf = new FPDF("P", "mm", "A4");
				$pdf->SetMargins(10, 10, 10);
				$pdf->SetTitle($judul, true);
				$pdf->AddPage();
	
				//kop
				$pdf->Image($data["organisasi"]["logo"], 16, 10, 24);
				$pdf->SetFont("Times", "B", 12);
				$pdf->Cell(190, 5, "PUSAT STUDI DAN KONSULTASI HUKUM", 0, 1, "C");
				$pdf->SetFont("Times", "", 12);
				$pdf->Cell(190, 5, "FAKULTAS SYARI'AH DAN HUKUM", 0, 1, "C");
				$pdf->SetFont('Times','',12);
				$pdf->Cell(190, 5, "UNIVERSITAS ISLAM NEGERI SUNAN KALIJAGA", 0, 1, "C");
				$pdf->SetFont("Times", "B", 10);
				$pdf->Cell(190, 5, "Sekretariat: Jl. Marsda Adisucipto Gedung Student Center Lt. 2 No. 2.42", 0,1, "C");
				$pdf->SetFont("Times", "B", 10);
				$pdf->Cell(190, 5, "UIN Sunan Kalijaga Yogyakarta Telp. ". $data["organisasi"]["kontak"]["telepon"] .", Yogyakarta 55281", 0, 1, "C");
				$pdf->SetLineWidth(1);
				$pdf->Line(10, 35.5, 200, 35.5);
				$pdf->SetLineWidth(0);
				$pdf->Line(10, 36.5, 200, 36.5);
				$pdf->Ln(10);
	
				if ($keuangan["status"] === 200) {
					//judul
					$pdf->SetFont("Times", "B", 12);
					$pdf->Cell(190, 5, $judul, 0, 1, "C");
					$pdf->Ln(3);
	
					//table laporan
					$pdf->SetFont("Times", "B", 10);
					$pdf->Cell(25, 6, "Tanggal", 1, 0, "C");
					$pdf->Cell(69, 6, "Keterangan",1, 0, "C");
					$pdf->Cell(12, 6, "Qty", 1, 0, "C");
					$pdf->Cell(28, 6, "Debet",1, 0, "C");
					$pdf->Cell(28, 6, "Kredit",1, 0, "C");
					$pdf->Cell(28, 6, "Saldo", 1, 1, "C");
					$pdf->SetFont("Times", "", 10);
					$debet =$kredit = 0;
					foreach ($keuangan["keterangan"] as $daftar) {
						$pdf->Cell(25, 6, date("d", strtotime($daftar["keuangan_tanggal"]))." ".$daftar["bulan_keterangan"]." ".date("Y", strtotime($daftar["keuangan_tanggal"])), 1, 0, "C");
						$pdf->Cell(69, 6, $daftar["keuangan_judul"], 1, 0, "L");
						$pdf->Cell(12, 6, $daftar["keuangan_jumlah"] == 0 ? "" : $daftar["keuangan_jumlah"], 1, 0, "C");
						if($daftar["keuangan_keterangan"] === "1") {
							$pdf->Cell(28, 6, "Rp".number_format($daftar["keuangan_nominal"], 2, ',', '.'), 1, 0, "R");
							$pdf->Cell(28, 6, "", 1, 0, "C");
							$debet = $debet+$daftar["keuangan_nominal"];
						} else {
							$pdf->Cell(28, 6, "",1, 0, "C");
							$pdf->Cell(28, 6, "Rp".number_format($daftar["keuangan_nominal"], 2, ',', '.'), 1, 0, "R");
							$kredit = $kredit+$daftar["keuangan_nominal"];
						}
						$pdf->Cell(28, 6, "Rp".number_format($debet-$kredit, 2, ',', '.'), 1, 1, "R");
					}
					$pdf->SetFont("Times", "B", 10);
					$pdf->Cell(106, 6, "Total", 1, 0, "C");
					$pdf->Cell(28, 6, "Rp".number_format($debet, 2, ',', '.'), 1, 0, "R");
					$pdf->Cell(28, 6, "Rp".number_format($kredit, 2, ',', '.'),1, 0, "R");
					$pdf->Cell(28, 6, "Rp".number_format($debet-$kredit, 2, ',', '.'), 1, 1, "R");
					
					$pdf->Output("I", "Laporan_".$periode."_".$bulan.".pdf", true);
				} else {
					//judul
					$pdf->SetFont("Times", "B", 30);
					$pdf->SetTextColor(255, 0, 0);
					$pdf->Cell(190, 5, "Laporan tidak ditemukan.", 0, 1, "C");
	
					$pdf->Output("I", "Laporan.pdf", true);
				}
			} else {
				redirect(base_url("pengurus/")."keuangan");
			}
		} else {
			redirect(base_url("pengurus/")."keuangan");
		}
	}
}
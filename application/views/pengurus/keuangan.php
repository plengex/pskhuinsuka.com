<?php
    $debet = $kredit = $saldo = 0;
    if (!empty($data["daftar_semua"])) {
        foreach($data["daftar_semua"] as $keuangan){
            if($keuangan["keuangan_keterangan"] === "1") {
                $debet = $debet+$keuangan["keuangan_nominal"];
            } else {
                $kredit = $kredit+$keuangan["keuangan_nominal"];
            }
        }
    }

    $total = $debet-$kredit;
?>
<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>

        <style type="text/css">
            a,
            a.custom-card,
            a.custom-card:hover {
                color: inherit;
                text-decoration: none;
            }

            .panel
            {
                -webkit-transition: 0.1s ease-in-out;
                -moz-transition: 0.1s ease-in-out;
                -o-transition: 0.1s ease-in-out;
                transition: 0.1s ease-in-out;
            }

            .hover-effect:hover
            {
                -webkit-transform: scale(1.06);
                -moz-transform: scale(1.06);
                -o-transform: scale(1.06);
                -ms-transform: scale(1.06);
                transform: scale(1.06);
            }

                        
            .card-hover .info {
                visibility: hidden;
                opacity: 0;
                height: 0;
                padding: 0;
            }

            .card-hover:hover .info {
                height: 100%;
                visibility: visible;
                opacity: 10;
                padding: 5px;
                transition: opacity 0.001s ease;
            }

            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
            }

            input[type=number] {
                -moz-appearance: textfield;
            }
            
            .table td {
                vertical-align : middle;
            }

            tbody tr:hover {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }

            .focus {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }
        </style>
    </head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("pengurus/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("pengurus/_partials/navbar.php") ?>

                    <!-- /navbar -->

					<div class="main-content-container container-fluid px-4">
                        <!-- header -->
                        <?php $this->load->view("pengurus/_partials/header.php") ?>
                        
                        <!-- //header -->

                        <!-- field -->
						<div class="row">
                            <div class="m-0 row col-sm-12 text-center">
                                <div hidden="true">
                                    <form id="form-pengaturan">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="pengaturan_tanggal">Tanggal</label>
                                                <input type="text" class="form-control text-center" id="pengaturan_tanggal" name="pengaturan_tanggal" placeholder="Tanggal" value="">
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="pengaturan_judul">Keterangan</label>
                                                <input type="text" class="form-control" id="pengaturan_judul" name="pengaturan_judul" placeholder="Keterangan" value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3" id="fjumlah">
                                                <label for="pengaturan_jumlah">Qty</label>
                                                <input type="number" class="form-control text-center" id="pengaturan_jumlah" name="pengaturan_jumlah" placeholder="Qty" value="">
                                            </div>
                                            <div class="form-group col-md-4" id="fketerangan">
                                                <label for="pengaturan_keterangan">Jenis</label>
                                                <select id="pengaturan_keterangan" class="form-control">
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5" id="fnominal">
                                                <label for="pengaturan_nominal">Nominal</label>
                                                <input type="text" class="form-control text-right" id="pengaturan_nominal" name="pengaturan_nominal" placeholder="Nominal" value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-4">
                                    <a href="#tambah" class="custom-card" id="pemasukkan">
                                        <div class="stats-small stats-small--1 card card-small panel card-hover hover-effect">
                                            <div class="card-body p-0 d-flex">
                                                <div class="col-md-12 d-flex flex-column m-auto">
                                                    <div class="stats-small__data">
                                                        <span class="stats-small__label text-uppercase">Pemasukan</span>
                                                        <h6 class="stats-small__value count my-3"><?= "Rp".number_format($debet, 2, ',', '.'); ?></h6>
                                                    </div>
                                                    <div class="info">
                                                        <span class="col-md-12 p-2 btn btn-primary">Tambah Pemasukan</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-4 mb-4">
                                    <a href="#tambah" class="custom-card" id="pengeluaran">
                                        <div class="stats-small stats-small--1 card card-small panel card-hover hover-effect">
                                            <div class="card-body p-0 d-flex">
                                                <div class="col-md-12 d-flex flex-column m-auto">
                                                    <div class="stats-small__data">
                                                        <span class="stats-small__label text-uppercase">Pengeluaran</span>
                                                        <h6 class="stats-small__value count my-3"><?= "Rp".number_format($kredit, 2, ',', '.'); ?></h6>
                                                    </div>
                                                    <div class="info">
                                                        <span class="col-md-12 p-2 btn btn-primary">Tambah Pengeluaran</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-4">
                                    <div class="stats-small stats-small--1 card card-small">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="stats-small__data">
                                                <span class="stats-small__label text-uppercase">Saldo</span>
                                                <h6 class="stats-small__value count my-3"><?= "Rp".number_format($total, 2, ',', '.'); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row d-flex align-items-center">
                                            <div class="col-md-3 mt-2 mb-2">
                                                <h6 class="m-0">Laporan Keuangan</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <select id="periode" class="form-control">
                                                    <?php
                                                    for ($i=0; $i<count($data["daftar_periode"]); $i++) {
                                                        if ($i === count($data["daftar_periode"])-1) {
                                                            $selected = " selected";
                                                        }
                                                        else {
                                                            $selected = "";
                                                        }

                                                        echo "<option value=\"".$data["daftar_periode"][$i]["organisasi_periode"]."\"".$selected.">".@str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"])."</option>";
                                                    } ?>

                                                </select>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <select id="bulan" class="form-control" <?= !empty($data["daftar_bulan"]) ? "" : " disabled" ?>>
                                                    <option value="">Semua</option><?php
                                                    if(!empty($data["daftar_bulan"])) {
                                                        for ($i=0; $i<count($data["daftar_bulan"]); $i++) {
                                                            if ($data["daftar_bulan"][$i]["bulan_id"] === date("n")) {
                                                                $selected = " selected";
                                                            }
                                                            else {
                                                                $selected = "";
                                                            }

                                                            if (!empty($data["daftar_bulan"][$i+1]["bulan_id"]) && $data["daftar_bulan"][$i]["bulan_id"] !== $data["daftar_bulan"][$i+1]["bulan_id"]  ) {
                                                                echo "<option value=\"".$data["daftar_bulan"][$i]["bulan_id"]."\"".$selected.">".$data["daftar_bulan"][$i]["bulan_keterangan"]."</option>";
                                                            }
                                                            else if (!empty($data["daftar_bulan"][$i]["bulan_id"]) && empty($data["daftar_bulan"][$i+1]["bulan_id"]) ) {
                                                                echo "<option value=\"".$data["daftar_bulan"][$i]["bulan_id"]."\"".$selected.">".$data["daftar_bulan"][$i]["bulan_keterangan"]."</option>";
                                                            }
                                                        } 
                                                    } else {
                                                        echo "<option value=\"\">Bulan tidak ditemukan.</option>";
                                                    } ?>

                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-accent col-md-12" id="cetak">
                                                    <i class="fas fa-download fa-md text-white-50"></i>
                                                    Cetak Laporan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-4 text-center">
                                        <table class="table mb-0" id="table"<?= !empty($data["daftar"]) ? "" : " hidden"?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">Tanggal</th>
                                                    <th scope="col" class="border-0">Keterangan</th>
                                                    <th scope="col" class="border-0">Qty</th>
                                                    <th scope="col" class="border-0">Debet</th>
                                                    <th scope="col" class="border-0">Kredit</th>
                                                    <th scope="col" class="border-0">Saldo</th>
                                                    <th scope="col" class="border-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"><?php
                                            if (!empty($data["daftar"])) {
                                            $debet = $kredit = 0;
                                            foreach($data["daftar"] as $keuangan) :  ?>

                                                <tr id="<?= $keuangan['keuangan_id']; ?>">
                                                    <td><?= date("d/m/Y", strtotime($keuangan["keuangan_tanggal"])); ?></td>
                                                    <td class="text-left"><?= $keuangan["keuangan_judul"] ?></td>
                                                    <td><?= $keuangan["keuangan_jumlah"] ?></td><?php if($keuangan["keuangan_keterangan"] === "1") { ?>

                                                    <td class="text-right"><?= "Rp".number_format($keuangan["keuangan_nominal"], 2, ',', '.'); ?></td>
                                                    <td></td><?php } else { ?>

                                                    <td></td>
                                                    <td class="text-right"><?= "Rp".number_format($keuangan["keuangan_nominal"], 2, ',', '.'); ?></td><?php } ?><?php 
                                                        if($keuangan["keuangan_keterangan"] === "1") {
                                                            $debet = $debet+$keuangan["keuangan_nominal"];
                                                        } else {
                                                            $kredit = $kredit+$keuangan["keuangan_nominal"];
                                                        } ?>

                                                    <td class="text-right"><?= "Rp".number_format($debet-$kredit, 2, ',', '.'); ?></td>
                                                    <td class="text-nowrap">
                                                        <button class="btn btn-sm btn-outline-info mr-1" onclick="sunting(`<?= $keuangan['keuangan_id']; ?>`)">
                                                            <i class="fas fa-pencil-alt mr-1"></i>
                                                            Sunting
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger mr-1" onclick="hapus(`<?= $keuangan['keuangan_id']; ?>`)">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr><?php endforeach; } ?>

                                            </tbody>
                                            <tfoot class="bg-light mb-0">
                                                <tr>
                                                    <th colspan="3">Total</th>
                                                    <th class="text-right">
                                                        <span id="debet"><?= "Rp" . number_format($debet, 2, ',' , '.'); ?></span>
                                                    </th>
                                                    <th class="text-right">
                                                        <span id="kredit"><?= "Rp" . number_format($kredit, 2, ',', '.'); ?></span>
                                                    </th>
                                                    <th colspan="2">
                                                        <span id="total"><?= "Rp" . number_format($debet-$kredit, 2, ',' , '.'); ?></span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                                        
                                        <div id="keterangan" class="row"<?= !empty($data["daftar"]) ? " hidden" : "" ?>>
                                            <div class="col-md-12 text-center pt-4">
                                                <label>Laporan keuangan tidak ditemukan.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>	
                    </div>
					<!-- //field -->
                    
                    <!-- footer -->
                    <?php $this->load->view("pengurus/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
        </div>

        <!-- javascript -->
        <?php $this->load->view("pengurus/_partials/javascript.php") ?>

        <!-- //javascript -->
        <script type="text/javascript">
            var site_api = `<?= $api ?>`;

            $(document).ready(function () {
                $("#pengaturan_tanggal").datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true
                });

                $("#pemasukkan").click(function () {
                    $("input[id=pengaturan_tanggal]").val("");
                    $("input[id=pengaturan_judul]").val("");
                    $("input[id=pengaturan_jumlah]").val("");
                    $("input[id=pengaturan_nominal]").val("");

                    $("#fjumlah").attr("class", "form-group col-md-5");
                    $("#fnominal").attr("class", "form-group col-md-7");
                    $("#fketerangan").attr("hidden", "true");

                    swal({
                        title: "Tambah Pemasukkan",
                        icon: "warning",
                        content: $("#form-pengaturan")[0],
                        buttons: [
                            true,
                            {
                                text: "Tambah",
                                closeModal: false,
                            }
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/keuangan/tambah",
                                dataType: "json",
                                type: "POST",
                                data : {
                                    "periode": `<?= $data["periode"] ?>`,
                                    "tanggal": $("#pengaturan_tanggal").val(),
                                    "judul": $("#pengaturan_judul").val(),
                                    "jumlah": $("#pengaturan_jumlah").val(),
                                    "keterangan": 1,
                                    "nominal": $("#pengaturan_nominal").val()
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Pemasukkan berhasil ditambahkan.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Pemasukkan gagal ditambahkan.",
                                            text: response.keterangan,
                                            icon: "error",
                                            button: "Tutup"
                                        });
                                    }
                                },
                                error: function (jqXHR, exception) {
                                    if (jqXHR.status === 0) {
                                        keterangan = "Not connect (verify network).";
                                    } else if (jqXHR.status == 404) {
                                        keterangan = "Requested page not found.";
                                    } else if (jqXHR.status == 500) {
                                        keterangan = "Internal Server Error.";
                                    } else if (exception === "parsererror") {
                                        keterangan = "Requested JSON parse failed.";
                                    } else if (exception === "timeout") {
                                        keterangan = "Time out error.";
                                    } else if (exception === "abort") {
                                        keterangan = "Ajax request aborted.";
                                    } else {
                                        keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                    }
                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+keterangan+`</strong>
                                    </div>`);
                                }
                            });
                        }
                    });
                });

                $("#pengeluaran").click(function () {
                    $("input[id=pengaturan_tanggal]").val("");
                    $("input[id=pengaturan_judul]").val("");
                    $("input[id=pengaturan_jumlah]").val("");
                    $("input[id=pengaturan_nominal]").val("");

                    $("#fjumlah").attr("class", "form-group col-md-5");
                    $("#fnominal").attr("class", "form-group col-md-7");
                    $("#fketerangan").attr("hidden", "true");

                    swal({
                        title: "Tambah Pengeluaran",
                        icon: "warning",
                        content: $("#form-pengaturan")[0],
                        buttons: [
                            true,
                            {
                                text: "Tambah",
                                closeModal: false,
                            }
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/keuangan/tambah",
                                dataType: "json",
                                type: "POST",
                                data : {
                                    "periode": `<?= $data["periode"] ?>`,
                                    "tanggal": $("#pengaturan_tanggal").val(),
                                    "judul": $("#pengaturan_judul").val(),
                                    "jumlah": $("#pengaturan_jumlah").val(),
                                    "keterangan": 2,
                                    "nominal": $("#pengaturan_nominal").val()
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Pengeluaran berhasil ditambahkan.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Pengeluaran gagal ditambahkan.",
                                            text: response.keterangan,
                                            icon: "error",
                                            button: "Tutup"
                                        });
                                    }
                                },
                                error: function (jqXHR, exception) {
                                    if (jqXHR.status === 0) {
                                        keterangan = "Not connect (verify network).";
                                    } else if (jqXHR.status == 404) {
                                        keterangan = "Requested page not found.";
                                    } else if (jqXHR.status == 500) {
                                        keterangan = "Internal Server Error.";
                                    } else if (exception === "parsererror") {
                                        keterangan = "Requested JSON parse failed.";
                                    } else if (exception === "timeout") {
                                        keterangan = "Time out error.";
                                    } else if (exception === "abort") {
                                        keterangan = "Ajax request aborted.";
                                    } else {
                                        keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                    }
                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+keterangan+`</strong>
                                    </div>`);
                                }
                            });
                        }
                    });
                });

                $("#periode").change(function() {
                    var periode = $("#periode").val();

                    var periode = $(this).find(":selected").attr("value");

                    if (periode === `<?= $data["daftar_periode"][count($data["daftar_periode"])-1]["organisasi_periode"]; ?>`) {
                        $("#tambah").removeAttr("disabled");
                    } else {
                        $("#tambah").attr("disabled", "true");
                    }

                    $.ajax({
                        url     : site_api+"/keuangan/bulan/"+periode,
                        dataType: "json",
                        type    : "GET",
                        success : function(response) {
                            var bulan = response.keterangan;
                            if (response.status === 200) {
                                $("#bulan").removeAttr("disabled");
                                $("#bulan").empty();
                                $("#bulan").append(new Option("Semua", ""));
                                for (const index in bulan) {
                                    if ((parseInt(index)+1) < bulan.length) {
                                        if (bulan[index].bulan_id !== bulan[(parseInt(index)+1)].bulan_id) {
                                            var option = new Option(bulan[index].bulan_keterangan, bulan[index].bulan_id);
                                            $("#bulan").append(option);
                                        }
                                    } else if (parseInt(index) < bulan.length) {
                                        var option = new Option(bulan[index].bulan_keterangan, bulan[index].bulan_id);
                                        $("#bulan").append(option);
                                    }
                                }

                                $("#bulan").change();
                            } else {
                                $("#table").attr("hidden", "true");
                                $("#keterangan").removeAttr("hidden");
                            }
                        },
                        error : function (jqXHR, exception) {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (Verify Network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                });

                $("#bulan").change(function () {
                    var periode = $("#periode").val();
                    var bulan   = $("#bulan").val();

                    $.ajax({
                        url         : site_api + "/keuangan/" + periode + "/" + bulan,
                        dataType    : "json",
                        type        : "GET",
                        success : function(response) {
                            if (response.status === 200) {
                                $("#status").html(``);
                                $("#table").removeAttr("hidden");
                                $("#keterangan").attr("hidden", "true");
                                $("#tbody").html(``);

                                var keuangan = response.keterangan;
                                var debet = kredit = saldo = 0;
                                for (const index in keuangan) {
                                    var date    = new Date(keuangan[index].keuangan_tanggal),
                                        year    = date.getFullYear(),
                                        month   = date.getMonth()+1 < 10 ? "0"+(Number(date.getMonth())+1) : date.getMonth()+1,
                                        day     = date.getDate()  < 10 ? "0"+date.getDate() : date.getDate(),
                                        tanggal = day+"/"+month+"/"+year;

                                    if (periode === `<?= $data["daftar_periode"][count($data["daftar_periode"])-1]["organisasi_periode"]; ?>`) {
                                        var tombol = `
                                                <button class="btn btn-sm btn-outline-info mr-1" onclick="sunting(\``+keuangan[index].keuangan_id+`\`)">
                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                    Sunting
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger mr-1" onclick="hapus(\``+keuangan[index].keuangan_id+`\`)">
                                                    <i class="fas fa-trash-alt mr-1"></i>
                                                    Hapus
                                                </button>`;
                                    } else {
                                        var tombol = `&mdash;`;
                                    }

                                    if(keuangan[index].keuangan_keterangan === "1") {
                                        debet   = debet+Number(keuangan[index].keuangan_nominal);
                                    } else {
                                        kredit  = kredit+Number(keuangan[index].keuangan_nominal);
                                    }

                                    $("#table tbody").append(`<tr id="`+keuangan[index].keuangan_id+`">
                                        <td>`+tanggal+`</td>
                                        <td class="text-left">`+keuangan[index].keuangan_judul+`</td>
                                        <td>`+keuangan[index].keuangan_jumlah+`</td>`
                                        +(keuangan[index].keuangan_keterangan === "1" ? `<td class="text-right">Rp`+number_format(keuangan[index].keuangan_nominal, 2, ',', '.')+`</td><td></td>` : `<td></td><td class="text-right">Rp`+number_format(keuangan[index].keuangan_nominal, 2, ',', '.')+`</td>`)+`
                                        <td class="text-right">Rp`+number_format(debet-kredit, 2, ',', '.')+`</td>
                                        <td class="text-nowrap">`+tombol+`</td>
                                    </tr>`);
                                }

                                var total = debet-kredit;
                                $("#debet").html("Rp"+number_format(debet, 2, ',', '.'));
                                $("#kredit").html("Rp"+number_format(kredit, 2, ',', '.'));
                                $("#total").html("Rp"+number_format(total, 2, ',', '.'));

                            } else {
                                $("#table").attr("hidden", "true");
                                $("#keterangan").removeAttr("hidden");
                            }
                        },
                        error : function (jqXHR, exception) {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (Verify Network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                });

                $("#cetak").click(function () {
                    if ($("#bulan").val() !== "") {
                        var text_lanjutan = " (bulan "+$("#bulan option:selected").text()+")";
                    } else {
                        var text_lanjutan = " (semua bulan)";
                    }

                    swal({
                        title: "Apakah anda yakin?",
                        icon: "warning",
                        text: "Anda akan mencetak laporan pada periode "+$("#periode").text().trim()+text_lanjutan,
                        buttons: true
                    })
                    .then((yes) => {
                        if (yes) {
                            window.open(`<?= base_url("pengurus/")."keuangan/" ?>`+$("#periode").val()+"/"+$("#bulan").val());
                        }
                    });
                });
            });

            function sunting(id) {
                $("#"+id).addClass("focus");

                $.ajax({
                    url: site_api+"/keuangan/lihat/"+id,
                    dataType: "json",
                    type: "GET",
                    success: function(response) {
                        if (response.status === 200) {
                            $("#fjumlah").attr("class", "form-group col-md-3");
                            $("#fnominal").attr("class", "form-group col-md-5");
                            $("#fketerangan").removeAttr("hidden");

                            var keuangan = response.keterangan;
                            $("input[id=pengaturan_tanggal]").val(keuangan.tanggal);
                            $("input[id=pengaturan_judul]").val(keuangan.judul);
                            $("input[id=pengaturan_jumlah]").val(keuangan.jumlah);
                            $("input[id=pengaturan_nominal]").val(keuangan.nominal);

                            if (keuangan.keterangan === "1") {
                                $("#pengaturan_keterangan").html(`<option value="1" selected>Pemasukan</option>
                                <option value="2">Pengeluaran</option>`);   
                            } else if (keuangan.keterangan === "2") {
                                $("#pengaturan_keterangan").html(`<option value="1">Pemasukan</option>
                                <option value="2" selected>Pengeluaran</option>`);
                            } else {
                                $("#pengaturan_keterangan").html(`<option value="">Pilih</option>
                                <option value="1">Pemasukan</option>
                                <option value="2">Pengeluaran</option>`);
                            }

                            swal({
                                title: "Sunting",
                                icon: "warning",
                                content: $("#form-pengaturan")[0],
                                buttons: [
                                    true,
                                    {
                                        text: "Simpan",
                                        closeModal: false,
                                    }
                                ],
                            })
                            .then((yes) => {
                                if (yes) {
                                    $.ajax({
                                        url: site_api+"/keuangan/perbarui",
                                        dataType: "json",
                                        type: "POST",
                                        data : {
                                            "id": id,
                                            "tanggal": $("#pengaturan_tanggal").val(),
                                            "judul": $("#pengaturan_judul").val(),
                                            "jumlah": $("#pengaturan_jumlah").val(),
                                            "keterangan": $("#pengaturan_keterangan").val(),
                                            "nominal": $("#pengaturan_nominal").val()
                                        },
                                        success: function(response) {
                                            if (response.status === 200) {
                                                swal({
                                                    title: "Data berhasil diperbarui.",
                                                    icon: "success",
                                                    button: "Tutup"
                                                })
                                                .then((yes) => {
                                                    location.reload();
                                                });
                                            } else {
                                                swal({
                                                    title: "Data gagal diperbarui.",
                                                    text: response.keterangan,
                                                    icon: "error",
                                                    button: "Tutup"
                                                });

                                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <i class="fa fa-info mx-2"></i>
                                                    <strong>`+response.keterangan+`</strong>
                                                </div>`);
                                            }
                                        },
                                        error: function (jqXHR, exception) {
                                            if (jqXHR.status === 0) {
                                                keterangan = "Not connect (verify network).";
                                            } else if (jqXHR.status == 404) {
                                                keterangan = "Requested page not found.";
                                            } else if (jqXHR.status == 500) {
                                                keterangan = "Internal Server Error.";
                                            } else if (exception === "parsererror") {
                                                keterangan = "Requested JSON parse failed.";
                                            } else if (exception === "timeout") {
                                                keterangan = "Time out error.";
                                            } else if (exception === "abort") {
                                                keterangan = "Ajax request aborted.";
                                            } else {
                                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                            }
                                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <i class="fa fa-info mx-2"></i>
                                                <strong>`+keterangan+`</strong>
                                            </div>`);
                                        }
                                    });
                                }

                                $("#"+id).removeClass("focus");
                            });
                        } else {
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+response.keterangan+`</strong>
                            </div>`);

                            $("#"+id).removeClass("focus");
                        }
                    },
                    error: function (jqXHR, exception) {
                        if (jqXHR.status === 0) {
                            keterangan = "Not connect (verify network).";
                        } else if (jqXHR.status == 404) {
                            keterangan = "Requested page not found.";
                        } else if (jqXHR.status == 500) {
                            keterangan = "Internal Server Error.";
                        } else if (exception === "parsererror") {
                            keterangan = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            keterangan = "Time out error.";
                        } else if (exception === "abort") {
                            keterangan = "Ajax request aborted.";
                        } else {
                            keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                        }
                        $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="fa fa-info mx-2"></i>
                            <strong>`+keterangan+`</strong>
                        </div>`);
                        
                        $("#"+id).removeClass("focus");
                    }
                });
            }

            function hapus(id) {
                $("#"+id).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan data keuangan ini.",
                    icon: "warning",
                    dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Hapus",
                            closeModal: false,
                        }
                    ],
                })
                .then((yes) => {
                    if (yes) {
                        $.ajax({
					        url: site_api+"/keuangan/hapus/"+id,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Data berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    })
                                    .then((yes) => {
                                        location.reload();
                                    });
                                } else {
                                    swal({
                                        title: "Data gagal dihapus.",
                                        text: response.keterangan,
                                        icon: "error",
                                        button: "Tutup"
                                    })
                                    .then((yes) => {
                                        $("#"+id).removeClass("focus");
                                    });

                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+response.keterangan+`</strong>
                                    </div>`);
                                }
                            },
                            error: function (jqXHR, exception) {
                                if (jqXHR.status === 0) {
                                    keterangan = "Not connect (verify network).";
                                } else if (jqXHR.status == 404) {
                                    keterangan = "Requested page not found.";
                                } else if (jqXHR.status == 500) {
                                    keterangan = "Internal Server Error.";
                                } else if (exception === "parsererror") {
                                    keterangan = "Requested JSON parse failed.";
                                } else if (exception === "timeout") {
                                    keterangan = "Time out error.";
                                } else if (exception === "abort") {
                                    keterangan = "Ajax request aborted.";
                                } else {
                                    keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                }
                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+keterangan+`</strong>
                                </div>`);

                                $("#"+id).removeClass("focus");
                            }
                        });
                    }
                    else {
                        $("#"+id).removeClass("focus");
                    }
                });
            }

            function number_format (number, decimals, decPoint, thousandsSep) {
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
                var n = !isFinite(+number) ? 0 : +number
                var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
                var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
                var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
                var s = ''

                var toFixedFix = function (n, prec) {
                    if (('' + n).indexOf('e') === -1) {
                        return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
                    } else {
                        var arr = ('' + n).split('e')
                        var sig = ''
                    if (+arr[1] + prec > 0) {
                        sig = '+'
                    }
                    
                    return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
                    }
                }

                s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || ''
                    s[1] += new Array(prec - s[1].length + 1).join('0')
                }

                return s.join(dec)
            }
        </script>
	</body>
</html>
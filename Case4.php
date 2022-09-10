<?php

countCutiPribadi(7, "2021-01-05", "2021-12-18", 3);

function countCutiPribadi($cutiBersama, $tanggalJoin, $tanggalRencana, $durasi)
{
    $cutiKantor = 14;
    $tanggalJoin =  date("Y-m-d", strtotime($tanggalJoin));
    $tahun =  date("Y", strtotime($tanggalJoin));
    $akhirTahun = date("Y-m-d", strtotime($tahun . '-12-31'));
    $tanggalRencana =  date("Y-m-d", strtotime($tanggalRencana));
    $tanggalBisaCuti =  date("Y-m-d", strtotime($tanggalJoin . '+ 180 days'));
    $cutiPribadi = $cutiKantor - $cutiBersama;
    $jumlahCuti = round(dateDiffInDays($tanggalBisaCuti, $akhirTahun) / 365 * $cutiPribadi);

    if ($tanggalRencana < $tanggalBisaCuti) {
        echo "False <br> Alasan: Karena belum 180 hari sejak
        tanggal join karyawan";
    } else {
        if ($durasi > $jumlahCuti) {
            echo "False <br> Alasan: Karena hanya boleh mengambil
            $jumlahCuti hari cuti";
        } else {
            echo "True";
        }
    }
}

function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);

    return abs(round($diff / 86400));
}

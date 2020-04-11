<?php

function hitungJmlKehadiran($nip,$periode)
{
    $sql = "select count(*) as jml_kehadiran from kehadiran where nip='$nip' and left(cast(tanggal_masuk as text),7)='$periode'";
    $jmlKehadiran = \DB::select($sql);
    return $jmlKehadiran[0]->jml_kehadiran;
}

// function hitungJmlKehadiran ($nip, $periode)
// {
//     $sql = "select count(*) as jml_kehadiran from kehadiran where nip='$nip' and left(cast(tanggal_masuk as text) 7)=$periode'";
//     $jlmKehadiran = \DB::select($sql);
//     return $jlmKehadiran[0]->jml_kehadiran;
// }

function chekkehadiran($nip, $tanggal)
{
    $kehadiran = \DB::table('kehadiran')
                ->where('nip', $nip)
                ->whereRaw("cast(tanggal_masuk as date)='".$tanggal."'")
                ->first();
    if (isset($kehadiran))
    {
        return $kehadiran->kode_status_kehadiran;
    }else{
        return '-';
    }
}

function chekLembur($nip, $tanggal)
{
    $lembur = \DB::table('lembur')
            ->where('nip', $nip)
            ->whereRaw("cast(tanggal_masuk as date)='".$tanggal."'")
            ->first();
    if (isset($lembur))
    {
        return $lembur->durasi_lembur;
    }else{
        return '-';
}
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>
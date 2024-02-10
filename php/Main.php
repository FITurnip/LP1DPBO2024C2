<?php

require_once "DPR.php";

$dpr = new DPR();
$toAdd1 = new AnggotaDPR(1, "Aaa", "Aaa", "Aaa", "./presidenri.jpeg");
$toAdd2 = new AnggotaDPR(2, "Aaa", "Aaa", "Aaa", "./presidenri.jpeg");
$toEdit1 = new AnggotaDPR(1, "BBB", "BBB", "BBB", "./presidenri.jpeg");
$idToDel = 2;

$dpr->tambahAnggota($toAdd1);
$dpr->tambahAnggota($toAdd2);
echo "tambah anggota<br/>";
$dpr->tampilkan();

$dpr->ubahDataAnggota($toEdit1->ambilId(), $toEdit1);
echo "<br/>ubah data anggota 1<br/>";
$dpr->tampilkan();

$dpr->hapusDataAnggota($idToDel);

$dpr->ubahDataAnggota($toEdit1->ambilId(), $toEdit1);
echo "<br/>hapus data anggota 2<br/>";
$dpr->tampilkan();
?>

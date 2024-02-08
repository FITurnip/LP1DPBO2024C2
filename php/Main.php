<?php

require_once "DPR.php";

$dpr = new DPR();
$fiturDipilih;
$id;
$nama;
$bidang;
$partai;
$temp = new AnggotaDPR();
$endProgram = false;

echo "No. Menu\n";
echo "1.  Tambah Anggota\n";
echo "2.  Ubah Anggota\n";
echo "3.  Hapus Anggota\n";
echo "4.  Tampilkan Anggota\n";
echo "5.  Matikan Aplikasi\n";

while (!$endProgram) {
    echo "FITUR > ";
    $fiturDipilih = (int)readline();

    switch ($fiturDipilih) {
        case 1: // tambah anggota
            echo "id     : "; $id = (int)readline();
            $temp->setId($id);

            echo "nama   : "; $nama = readline();
            $temp->setNama($nama);

            echo "bidang : "; $bidang = readline();
            $temp->setBidang($bidang);

            echo "partai : "; $partai = readline();
            $temp->setPartai($partai);

            $dpr->tambahAnggota($temp);

            $temp = new AnggotaDPR();
            break;

        case 2: // ubah data
            echo "id     : "; $id = (int)readline();

            echo "nama   : "; $nama = readline();
            $temp->setNama($nama);

            echo "bidang : "; $bidang = readline();
            $temp->setBidang($bidang);

            echo "partai : "; $partai = readline();
            $temp->setPartai($partai);

            $dpr->ubahDataAnggota($id, $temp);
            
            $temp = new AnggotaDPR();
            break;

        case 3: // hapus data
            echo "id    : "; $id = (int)readline();
            $dpr->hapusDataAnggota($id);
            break;

        case 4:
            $dpr->tampilkan();
            break;

        case 5:
            $endProgram = true;
            break;

        default:
            echo "tidak valid\n";
            break;
    }
}

?>

<?php

require_once "AnggotaDPR.php";

class DPR {
    private $daftarAnggotaDPR;

    public function __construct() {
        $this->daftarAnggotaDPR = array();
    }

    public function setDaftarAnggotaDPR(array $daftarAnggotaDPR) {
        $this->daftarAnggotaDPR = $daftarAnggotaDPR;
    }

    public function tambahAnggota(AnggotaDPR $anggotaBaru) {
        // pastikan tidak ada id yang sama
        $indexAnggotaDPRDicari = $this->cariAnggota($anggotaBaru->ambilId());
        if ($indexAnggotaDPRDicari == count($this->daftarAnggotaDPR)) {
            $this->daftarAnggotaDPR[] = $anggotaBaru;
        } else {
            echo "ditemukan id sama\n";
        }
    }

    public function cariAnggota(int $idAnggota) {
        // cari terlebih dahulu anggota berdasarkan id
        $indeks = 0;
        $banyakAnggota = count($this->daftarAnggotaDPR);
        $ditemukan = false;

        while ($indeks < $banyakAnggota && !$ditemukan) {
            if ($this->daftarAnggotaDPR[$indeks]->ambilId() == $idAnggota) {
                $ditemukan = true;
            } else {
                $indeks++;
            }
        }

        return $indeks;
    }

    public function ubahDataAnggota(int $idAnggota, AnggotaDPR $dataAnggota) {
        // cari terlebih dahulu anggota berdasarkan id
        $indexAnggotaDPRDicari = $this->cariAnggota($idAnggota);

        // jika ditemukan, perbarui data anggota
        if ($indexAnggotaDPRDicari != count($this->daftarAnggotaDPR)) {
            $this->daftarAnggotaDPR[$indexAnggotaDPRDicari]->setNama($dataAnggota->ambilNama());
            $this->daftarAnggotaDPR[$indexAnggotaDPRDicari]->setBidang($dataAnggota->ambilBidang());
            $this->daftarAnggotaDPR[$indexAnggotaDPRDicari]->setPartai($dataAnggota->ambilPartai());
        } else {
            echo "tidak ditemukan id sama\n";
        }
    }

    public function hapusDataAnggota(int $idAnggota) {
        // cari terlebih dahulu anggota berdasarkan id
        $indexAnggotaDPRDicari = $this->cariAnggota($idAnggota);

        // jika ditemukan, hapus data anggota
        if ($indexAnggotaDPRDicari != count($this->daftarAnggotaDPR)) {
            array_splice($this->daftarAnggotaDPR, $indexAnggotaDPRDicari, 1);
        } else {
            echo "tidak ditemukan id sama\n";
        }
    }

    public function tampilkan() {
        echo "<table>";

        // tampilkan header
        echo "<tr>
                <th>id</th>
                <th>nama</th>
                <th>bidang</th>
                <th>partai</th>
                <th>photo</th>
            </tr>";

        // tampilkan data
        foreach ($this->daftarAnggotaDPR as $anggota) {
            echo "<tr>
                    <td>" . $anggota->ambilId() . "</td>
                    <td>" . $anggota->ambilNama() . "</td>
                    <td>" . $anggota->ambilBidang() . "</td>
                    <td>" . $anggota->ambilPartai() . "</td>
                    <td><img src='" . $anggota->ambilPhotoUrl() . "' width='100' height='100'/></td>
            </tr>";
        }
        
        echo "</table>";
    }
}

?>
<?php

require_once "AnggotaDPR.php";

class DPR {
    private int $maksLebarId;
    private int $maksLebarNama;
    private int $maksLebarBidang;
    private int $maksLebarPartai;
    private int $indexFiturYangDilih;
    private $daftarAnggotaDPR;

    public function __construct() {
        $this->maksLebarId = 3;
        $this->maksLebarNama = 5;
        $this->maksLebarBidang = 7;
        $this->maksLebarPartai = 7;
        $this->indexFiturYangDilih = 0;
        $this->daftarAnggotaDPR = array();
    }

    public function setMaksLebarId(int $maksLebarId) {
        $this->maksLebarId = $maksLebarId;
    }

    public function setMaksLebarNama(int $maksLebarNama) {
        $this->maksLebarNama = $maksLebarNama;
    }

    public function setMaksLebarBidang(int $maksLebarBidang) {
        $this->maksLebarBidang = $maksLebarBidang;
    }

    public function setMaksLebarPartai(int $maksLebarPartai) {
        $this->maksLebarPartai = $maksLebarPartai;
    }

    public function setIndexFiturYangDilih(int $indexFiturYangDilih) {
        $this->indexFiturYangDilih = $indexFiturYangDilih;
    }

    public function setDaftarAnggotaDPR(array $daftarAnggotaDPR) {
        $this->daftarAnggotaDPR = $daftarAnggotaDPR;
    }

    public function ambilMaksLebarId() {
        return $this->maksLebarId;
    }

    public function ambilMaksLebarNama() {
        return $this->maksLebarNama;
    }

    public function ambilMaksLebarBidang() {
        return $this->maksLebarBidang;
    }

    public function ambilMaksLebarPartai() {
        return $this->maksLebarPartai;
    }

    public function ambilDaftarAnggotaDPR() {
        return $this->daftarAnggotaDPR;
    }

    public function konfigurasiTabel(AnggotaDPR $anggotaBaru) {
        $this->setMaksLebarNama(max($this->ambilMaksLebarNama(), strlen($anggotaBaru->ambilNama()) + 1));
        $this->setMaksLebarBidang(max($this->ambilMaksLebarBidang(), strlen($anggotaBaru->ambilBidang()) + 1));
        $this->setMaksLebarPartai(max($this->ambilMaksLebarPartai(), strlen($anggotaBaru->ambilPartai()) + 1));
    }

    public function tambahAnggota(AnggotaDPR $anggotaBaru) {
        // pastikan tidak ada id yang sama
        $indexAnggotaDPRDicari = $this->cariAnggota($anggotaBaru->ambilId());
        if ($indexAnggotaDPRDicari == count($this->daftarAnggotaDPR)) {
            $this->daftarAnggotaDPR[] = $anggotaBaru;

            $this->setMaksLebarId(max($this->ambilMaksLebarId(), strlen((string)$anggotaBaru->ambilId()) + 1));
            $this->konfigurasiTabel($anggotaBaru);
        } else {
            echo "ditemukan id sama\n";
        }
    }

    public function maksimum(int $a, int $b) {
        return ($b > $a) ? $b : $a;
    }

    public function hitungPanjangUnsignedInt(int $bil) {
        return ($bil == 0) ? 1 : strlen((string)$bil);
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

            $this->konfigurasiTabel($dataAnggota);
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

            // perbarui maksimum dengan mengecek keseluruhan
            $this->maksLebarId = 3;
            $this->maksLebarNama = 5;
            $this->maksLebarBidang = 7;
            $this->maksLebarPartai = 7;

            foreach ($this->daftarAnggotaDPR as $anggota) {
                $this->setMaksLebarId($this->maksimum($this->ambilMaksLebarId(), $this->hitungPanjangUnsignedInt($anggota->ambilId()) + 1));
                $this->konfigurasiTabel($anggota);
            }
        } else {
            echo "tidak ditemukan id sama\n";
        }
    }

    public function tampilkan() {
        // tampilkan header
        echo sprintf("%-{$this->maksLebarId}s%-{$this->maksLebarNama}s%-{$this->maksLebarBidang}s%-{$this->maksLebarPartai}s\n", "id", "nama", "bidang", "partai");

        // tampilkan data
        foreach ($this->daftarAnggotaDPR as $anggota) {
            echo sprintf("%-{$this->maksLebarId}s%-{$this->maksLebarNama}s%-{$this->maksLebarBidang}s%-{$this->maksLebarPartai}s\n", $anggota->ambilId(), $anggota->ambilNama(), $anggota->ambilBidang(), $anggota->ambilPartai());
        }
        echo "\n";
    }
}

?>

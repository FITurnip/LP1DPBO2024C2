<?php

class AnggotaDPR {
    private int $id;
    private string $nama;
    private string $bidang;
    private string $partai;

    public function __construct(int $id = 0, string $nama = "", string $bidang = "", string $partai = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->bidang = $bidang;
        $this->partai = $partai;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setNama(string $nama) {
        $this->nama = $nama;
    }

    public function setBidang(string $bidang) {
        $this->bidang = $bidang;
    }

    public function setPartai(string $partai) {
        $this->partai = $partai;
    }

    public function ambilId() {
        return $this->id;
    }

    public function ambilNama() {
        return $this->nama;
    }

    public function ambilBidang() {
        return $this->bidang;
    }

    public function ambilPartai() {
        return $this->partai;
    }
}

?>

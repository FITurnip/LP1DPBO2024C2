#include <iostream>
#include <iomanip>
#include "DPR.hpp"

using namespace std;

DPR::DPR() {
    this->maksLebarId = 3;
    this->maksLebarNama = 5;
    this->maksLebarBidang = 7;
    this->maksLebarPartai = 7;
}

DPR::~DPR() {
}

void DPR::setMaksLebarId(unsigned int maksLebarId) {
    this->maksLebarId = maksLebarId;
}

void DPR::setMaksLebarNama(unsigned int maksLebarNama) {
    this->maksLebarNama = maksLebarNama;
}

void DPR::setMaksLebarBidang(unsigned int maksLebarBidang) {
    this->maksLebarBidang = maksLebarBidang;
}

void DPR::setMaksLebarPartai(unsigned int maksLebarPartai) {
    this->maksLebarPartai = maksLebarPartai;
}

void DPR::setDaftarAnggotaDPR(vector<AnggotaDPR> daftarAnggotaDPR) {
    this->daftarAnggotaDPR = daftarAnggotaDPR;
}

unsigned int DPR::ambilMaksLebarId() {
    return this->maksLebarId;
}

unsigned int DPR::ambilMaksLebarNama() {
    return this->maksLebarNama;
}

unsigned int DPR::ambilMaksLebarBidang() {
    return this->maksLebarBidang;
}

unsigned int DPR::ambilMaksLebarPartai() {
    return this->maksLebarPartai;
}

vector<AnggotaDPR> DPR::ambilDaftarAnggotaDPR() {
    return daftarAnggotaDPR;
}

void DPR::konfigurasiTabel(AnggotaDPR anggotaBaru) {
    setMaksLebarNama(maksimum(this->ambilMaksLebarNama(), anggotaBaru.ambilNama().size() + 1));
    setMaksLebarBidang(maksimum(this->ambilMaksLebarBidang(), anggotaBaru.ambilBidang().size() + 1));
    setMaksLebarPartai(maksimum(this->ambilMaksLebarPartai(), anggotaBaru.ambilPartai().size() + 1));
}

void DPR::tambahAnggota(AnggotaDPR anggotaBaru) {
    // pastikan tidak ada id yang sama
    unsigned int indexAnggotaDPRDicari = cariAnggota(anggotaBaru.ambilId());
    if(indexAnggotaDPRDicari == daftarAnggotaDPR.size()) {
        this->daftarAnggotaDPR.push_back(anggotaBaru);

        setMaksLebarId(maksimum(this->ambilMaksLebarId(), hitungPanjangUnsignedInt(anggotaBaru.ambilId()) + 1));
        konfigurasiTabel(anggotaBaru);
    } else {
        cout << "ditemukan id sama\n";
    }
}

unsigned int DPR::maksimum(unsigned int a, unsigned int b) {
    return (a > b ? a : b);
}

unsigned int DPR::hitungPanjangUnsignedInt(unsigned int bil) {
    unsigned int totalDigit = 0;
    if(bil == 0) totalDigit = 1;
    else {
        while(bil != 0) {
            bil /= 10;
            totalDigit++;
        }
    }

    return totalDigit;
};

unsigned int DPR::cariAnggota(unsigned int idAnggota) {
    // cari terlebih dahulu anggota berdasarkan id
    unsigned int idDitunjuk;
    int indeks = 0, banyakAnggota = daftarAnggotaDPR.size();
    bool ditemukan = 0;

    while(indeks < banyakAnggota && !ditemukan) {
        if(daftarAnggotaDPR[indeks].ambilId() == idAnggota) {
            ditemukan = 1;
        } else {
            indeks++;
        }
    }

    return indeks;
}

void DPR::ubahDataAnggota(unsigned int idAnggota, AnggotaDPR dataAnggota) {
    // cari terlebih dahulu anggota berdasarkan id
    unsigned int indexAnggotaDPRDicari = cariAnggota(idAnggota);

    // jika ditemukan, perbarui data anggota
    if(indexAnggotaDPRDicari != daftarAnggotaDPR.size()) {
        daftarAnggotaDPR[indexAnggotaDPRDicari].setNama(dataAnggota.ambilNama());
        daftarAnggotaDPR[indexAnggotaDPRDicari].setBidang(dataAnggota.ambilBidang());
        daftarAnggotaDPR[indexAnggotaDPRDicari].setPartai(dataAnggota.ambilPartai());

        konfigurasiTabel(dataAnggota);
    } else {
        cout << "tidak ditemukan id sama\n";
    }
}

void DPR::hapusDataAnggota(unsigned int idAnggota) {
    // cari terlebih dahulu anggota berdasarkan id
    unsigned int indexAnggotaDPRDicari = cariAnggota(idAnggota);

    // jika ditemukan, hapus data anggota
    if(indexAnggotaDPRDicari != daftarAnggotaDPR.size()) {
        daftarAnggotaDPR.erase(daftarAnggotaDPR.begin() + indexAnggotaDPRDicari);

        // perbarui maksimum dengan mengecek keseluruhan
        this->maksLebarId = 3;
        this->maksLebarNama = 5;
        this->maksLebarBidang = 7;
        this->maksLebarPartai = 7;

        for(AnggotaDPR anggota: daftarAnggotaDPR) {
            setMaksLebarId(maksimum(this->ambilMaksLebarId(), hitungPanjangUnsignedInt(anggota.ambilId()) + 1));
            konfigurasiTabel(anggota);
        }
    } else {
        cout << "tidak ditemukan id sama\n";
    }
}

void DPR::printGarisPendek(unsigned int panjang, bool prefix, bool postfix) {
    if(prefix) cout << "+";
    for(unsigned int i = 0; i < panjang; i++) cout << "-";
    if(postfix) cout << "+\n";
}

void DPR::printGaris() {
    printGarisPendek(maksLebarId + 1, 1, 0);
    printGarisPendek(maksLebarNama + 1, 1, 0);
    printGarisPendek(maksLebarBidang + 1, 1, 0);
    printGarisPendek(maksLebarPartai + 1, 1, 1);
}

void DPR::tampilkan() {
    // tampilkan header
    printGaris();
    cout << left << setw(maksLebarId) << "| id "
                    << setw(maksLebarNama) << "| nama "
                    << setw(maksLebarBidang) << "| bidang "
                    << setw(maksLebarPartai) << "| partai |\n";
    printGaris();

    // tampilkan data
    for(AnggotaDPR anggota: daftarAnggotaDPR) {
        cout << left << "| " << setw(maksLebarId) << anggota.ambilId()
                            << "| " << setw(maksLebarNama) << anggota.ambilNama()
                            << "| " << setw(maksLebarBidang) << anggota.ambilBidang()
                            << "| " << setw(maksLebarPartai) << anggota.ambilPartai() << "|\n";
    }

    if(!daftarAnggotaDPR.empty()) printGaris();
    cout << endl;
}
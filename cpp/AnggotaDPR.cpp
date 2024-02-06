#include "AnggotaDPR.hpp"

AnggotaDPR::AnggotaDPR(unsigned int id, string nama, string bidang, string partai) {
    this->id = id;
    this->nama = nama;
    this->bidang = bidang;
    this->partai = partai;
}

AnggotaDPR::AnggotaDPR() {
    this->id = 0;
    this->nama = "";
    this->bidang = "";
    this->partai = "";
}

AnggotaDPR::~AnggotaDPR() {
}

void AnggotaDPR::setId(unsigned int id) {
    this->id = id;
}

void AnggotaDPR::setNama(string nama) {
    this->nama = nama;
}

void AnggotaDPR::setBidang(string bidang) {
    this->bidang = bidang;
}

void AnggotaDPR::setPartai(string partai) {
    this->partai = partai;
}

unsigned int AnggotaDPR::ambilId() {
    return id;
}

string AnggotaDPR::ambilNama() {
    return nama;
}

string AnggotaDPR::ambilBidang() {
    return bidang;
}

string AnggotaDPR::ambilPartai() {
    return partai;
}
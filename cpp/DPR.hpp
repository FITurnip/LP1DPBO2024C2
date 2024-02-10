#include <vector>
#include <string>
#include "AnggotaDPR.hpp"
using namespace std;

class DPR {
private:
    unsigned int maksLebarId, maksLebarNama, maksLebarBidang, maksLebarPartai;
    vector<AnggotaDPR> daftarAnggotaDPR;

public:
    DPR();
    ~DPR();

    void setMaksLebarId(unsigned int);
    void setMaksLebarNama(unsigned int);
    void setMaksLebarBidang(unsigned int);
    void setMaksLebarPartai(unsigned int);
    void setDaftarAnggotaDPR(vector<AnggotaDPR>);

    unsigned int ambilMaksLebarId();
    unsigned int ambilMaksLebarNama();
    unsigned int ambilMaksLebarBidang();
    unsigned int ambilMaksLebarPartai();
    vector<AnggotaDPR> ambilDaftarAnggotaDPR();

    void konfigurasiTabel(AnggotaDPR);

    unsigned int maksimum(unsigned int, unsigned int);
    unsigned int hitungPanjangUnsignedInt(unsigned int);
    
    unsigned int cariAnggota(unsigned int);
    void tambahAnggota(AnggotaDPR);
    void ubahDataAnggota(unsigned int, AnggotaDPR);
    void hapusDataAnggota(unsigned int);

    void printGarisPendek(unsigned int, bool, bool);
    void printGaris();
    void tampilkan();
};
#include <iostream>
#include "DPR.hpp"

using namespace std;

int main() {
    DPR dpr;
    unsigned int fiturDipilih;
    unsigned int id;
    string nama, bidang, partai;
    AnggotaDPR temp;
    bool endProgram = 0;

    cout << "No. Menu\n";
    cout << "1.  Tambah Anggota\n";
    cout << "2.  Ubah Anggota\n";
    cout << "3.  Hapus Anggota\n";
    cout << "4.  Tampilkan Anggota\n";
    cout << "5.  Matikan Aplikasi\n";

    while(!endProgram) {
        cout << "FITUR > ";
        cin >> fiturDipilih;

        switch (fiturDipilih) {
            case 1: // tambah anggota
                cout << "id     : "; cin >> id;
                temp.setId(id);

                cout << "nama   : "; cin >> nama;
                temp.setNama(nama);

                cout << "bidang : "; cin >> bidang;
                temp.setBidang(bidang);

                cout << "partai : "; cin >> partai;
                temp.setPartai(partai);

                dpr.tambahAnggota(temp);
            break;

            case 2: // ubah data
                cout << "id     : "; cin >> id;

                cout << "nama   : "; cin >> nama;
                temp.setNama(nama);

                cout << "bidang : "; cin >> bidang;
                temp.setBidang(bidang);

                cout << "partai : "; cin >> partai;
                temp.setPartai(partai);

                dpr.ubahDataAnggota(id, temp);
            break;
        
            case 3: // hapus data
                cout << "id    : "; cin >> id;
                dpr.hapusDataAnggota(id);
            break;

            case 4:
                dpr.tampilkan();
            break;

            case 5:
                endProgram = 1;
            break;
        
            default:
                cout << "tidak valid\n";
            break;
        }
    }

    return 0;
}
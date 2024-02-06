from DPR import DPR
from AnggotaDPR import AnggotaDPR

class Main:
    dpr = DPR()
    end_program = False

    print("No. Menu")
    print("1.  Tambah Anggota")
    print("2.  Ubah Anggota")
    print("3.  Hapus Anggota")
    print("4.  Tampilkan Anggota")
    print("5.  Matikan Aplikasi")

    while not end_program:
        fitur_dipilih = int(input("FITUR > "))

        if fitur_dipilih == 1:  # tambah anggota
            id_anggota = int(input("id     : "))
            nama = input("nama   : ")
            bidang = input("bidang : ")
            partai = input("partai : ")
            temp = AnggotaDPR(id_anggota, nama, bidang, partai)
            dpr.tambahAnggota(temp)
        elif fitur_dipilih == 2:  # ubah data
            id_anggota = int(input("id     : "))
            nama = input("nama   : ")
            bidang = input("bidang : ")
            partai = input("partai : ")
            temp = AnggotaDPR(id_anggota, nama, bidang, partai)
            dpr.ubahDataAnggota(id_anggota, temp)
        elif fitur_dipilih == 3:  # hapus data
            id_anggota = int(input("id    : "))
            dpr.hapusDataAnggota(id_anggota)
        elif fitur_dipilih == 4:
            dpr.tampilkan()
        elif fitur_dipilih == 5:
            end_program = True
        else:
            print("tidak valid")

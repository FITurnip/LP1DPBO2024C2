from AnggotaDPR import AnggotaDPR

class DPR:
    def __init__(self):
        self.maksLebarId = 3
        self.maksLebarNama = 5
        self.maksLebarBidang = 7
        self.maksLebarPartai = 7
        self.daftarAnggotaDPR = []

    def setMaksLebarId(self, maksLebarId):
        self.maksLebarId = maksLebarId

    def setMaksLebarNama(self, maksLebarNama):
        self.maksLebarNama = maksLebarNama

    def setMaksLebarBidang(self, maksLebarBidang):
        self.maksLebarBidang = maksLebarBidang

    def setMaksLebarPartai(self, maksLebarPartai):
        self.maksLebarPartai = maksLebarPartai

    def setDaftarAnggotaDPR(self, daftarAnggotaDPR):
        self.daftarAnggotaDPR = daftarAnggotaDPR

    def ambilMaksLebarId(self):
        return self.maksLebarId

    def ambilMaksLebarNama(self):
        return self.maksLebarNama

    def ambilMaksLebarBidang(self):
        return self.maksLebarBidang

    def ambilMaksLebarPartai(self):
        return self.maksLebarPartai

    def ambilDaftarAnggotaDPR(self):
        return self.daftarAnggotaDPR

    def konfigurasiTabel(self, anggotaBaru: AnggotaDPR):
        self.setMaksLebarNama(max(self.ambilMaksLebarNama(), len(anggotaBaru.ambilNama()) + 1))
        self.setMaksLebarBidang(max(self.ambilMaksLebarBidang(), len(anggotaBaru.ambilBidang()) + 1))
        self.setMaksLebarPartai(max(self.ambilMaksLebarPartai(), len(anggotaBaru.ambilPartai()) + 1))

    def tambahAnggota(self, anggotaBaru: AnggotaDPR):
        # pastikan tidak ada id yang sama
        if anggotaBaru.ambilId() not in [anggota.ambilId() for anggota in self.daftarAnggotaDPR]:
            self.daftarAnggotaDPR.append(anggotaBaru)
            self.setMaksLebarId(max(self.ambilMaksLebarId(), len(str(anggotaBaru.ambilId())) + 1))
            self.konfigurasiTabel(anggotaBaru)
        else:
            print("ditemukan id sama")

    def cariAnggota(self, idAnggota: int):
        index = 0
        for anggota in self.daftarAnggotaDPR:
            if anggota.ambilId() == idAnggota:
                return index
            index += 1
        return len(self.daftarAnggotaDPR)

    def ubahDataAnggota(self, idAnggota: int, dataAnggota: AnggotaDPR):
        indexAnggotaDPRDicari = self.cariAnggota(idAnggota)
        if indexAnggotaDPRDicari != len(self.daftarAnggotaDPR):
            self.daftarAnggotaDPR[indexAnggotaDPRDicari].setNama(dataAnggota.ambilNama())
            self.daftarAnggotaDPR[indexAnggotaDPRDicari].setBidang(dataAnggota.ambilBidang())
            self.daftarAnggotaDPR[indexAnggotaDPRDicari].setPartai(dataAnggota.ambilPartai())
            self.konfigurasiTabel(dataAnggota)
        else:
            print("tidak ditemukan id sama")

    def hapusDataAnggota(self, idAnggota: int):
        indexAnggotaDPRDicari = self.cariAnggota(idAnggota)
        if indexAnggotaDPRDicari != len(self.daftarAnggotaDPR):
            del self.daftarAnggotaDPR[indexAnggotaDPRDicari]
            self.maksLebarId = 3
            self.maksLebarNama = 5
            self.maksLebarBidang = 7
            self.maksLebarPartai = 7
            for anggota in self.daftarAnggotaDPR:
                self.setMaksLebarId(max(self.ambilMaksLebarId(), len(str(anggota.ambilId())) + 1))
                self.konfigurasiTabel(anggota)
        else:
            print("tidak ditemukan id sama")

    def tampilkan(self):
        print("{:<{}} {:<{}} {:<{}} {:<{}}".format("id", self.maksLebarId, "nama", self.maksLebarNama,
                                                    "bidang", self.maksLebarBidang, "partai", self.maksLebarPartai))
        for anggota in self.daftarAnggotaDPR:
            print("{:<{}} {:<{}} {:<{}} {:<{}}".format(anggota.ambilId(), self.maksLebarId, anggota.ambilNama(),
                                                        self.maksLebarNama, anggota.ambilBidang(), self.maksLebarBidang,
                                                        anggota.ambilPartai(), self.maksLebarPartai))
        print()

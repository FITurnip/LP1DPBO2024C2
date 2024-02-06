class AnggotaDPR:
    def __init__(self, id=0, nama="", bidang="", partai=""):
        self.id = id
        self.nama = nama
        self.bidang = bidang
        self.partai = partai

    def setId(self, id):
        self.id = id

    def setNama(self, nama):
        self.nama = nama

    def setBidang(self, bidang):
        self.bidang = bidang

    def setPartai(self, partai):
        self.partai = partai

    def ambilId(self):
        return self.id

    def ambilNama(self):
        return self.nama

    def ambilBidang(self):
        return self.bidang

    def ambilPartai(self):
        return self.partai

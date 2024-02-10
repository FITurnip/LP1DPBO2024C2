import java.util.ArrayList;
import java.util.List;

public class DPR {
    private int maksLebarId;
    private int maksLebarNama;
    private int maksLebarBidang;
    private int maksLebarPartai;
    private List<AnggotaDPR> daftarAnggotaDPR;

    public DPR() {
        this.maksLebarId = 3;
        this.maksLebarNama = 5;
        this.maksLebarBidang = 7;
        this.maksLebarPartai = 7;
        this.daftarAnggotaDPR = new ArrayList<>();
    }

    public void setMaksLebarId(int maksLebarId) {
        this.maksLebarId = maksLebarId;
    }

    public void setMaksLebarNama(int maksLebarNama) {
        this.maksLebarNama = maksLebarNama;
    }

    public void setMaksLebarBidang(int maksLebarBidang) {
        this.maksLebarBidang = maksLebarBidang;
    }

    public void setMaksLebarPartai(int maksLebarPartai) {
        this.maksLebarPartai = maksLebarPartai;
    }

    public void setDaftarAnggotaDPR(List<AnggotaDPR> daftarAnggotaDPR) {
        this.daftarAnggotaDPR = daftarAnggotaDPR;
    }

    public int ambilMaksLebarId() {
        return this.maksLebarId;
    }

    public int ambilMaksLebarNama() {
        return this.maksLebarNama;
    }

    public int ambilMaksLebarBidang() {
        return this.maksLebarBidang;
    }

    public int ambilMaksLebarPartai() {
        return this.maksLebarPartai;
    }

    public List<AnggotaDPR> ambilDaftarAnggotaDPR() {
        return this.daftarAnggotaDPR;
    }

    public void konfigurasiTabel(AnggotaDPR anggotaBaru) {
        setMaksLebarNama(Math.max(this.ambilMaksLebarNama(), anggotaBaru.ambilNama().length() + 1));
        setMaksLebarBidang(Math.max(this.ambilMaksLebarBidang(), anggotaBaru.ambilBidang().length() + 1));
        setMaksLebarPartai(Math.max(this.ambilMaksLebarPartai(), anggotaBaru.ambilPartai().length() + 1));
    }

    public void tambahAnggota(AnggotaDPR anggotaBaru) {
        int indexAnggotaDPRDicari = cariAnggota(anggotaBaru.ambilId());
        if(indexAnggotaDPRDicari == daftarAnggotaDPR.size()) {
            this.daftarAnggotaDPR.add(anggotaBaru);

            setMaksLebarId(Math.max(this.ambilMaksLebarId(), String.valueOf(anggotaBaru.ambilId()).length() + 1));
            konfigurasiTabel(anggotaBaru);
        } else {
            System.out.println("ditemukan id sama");
        }
    }

    private int cariAnggota(int idAnggota) {
        for (int i = 0; i < daftarAnggotaDPR.size(); i++) {
            if (daftarAnggotaDPR.get(i).ambilId() == idAnggota) {
                return i;
            }
        }
        return daftarAnggotaDPR.size();
    }

    public void ubahDataAnggota(int idAnggota, AnggotaDPR dataAnggota) {
        int indexAnggotaDPRDicari = cariAnggota(idAnggota);
        if (indexAnggotaDPRDicari != daftarAnggotaDPR.size()) {
            daftarAnggotaDPR.get(indexAnggotaDPRDicari).setNama(dataAnggota.ambilNama());
            daftarAnggotaDPR.get(indexAnggotaDPRDicari).setBidang(dataAnggota.ambilBidang());
            daftarAnggotaDPR.get(indexAnggotaDPRDicari).setPartai(dataAnggota.ambilPartai());

            konfigurasiTabel(dataAnggota);
        } else {
            System.out.println("tidak ditemukan id sama");
        }
    }

    public void hapusDataAnggota(int idAnggota) {
        int indexAnggotaDPRDicari = cariAnggota(idAnggota);
        if (indexAnggotaDPRDicari != daftarAnggotaDPR.size()) {
            daftarAnggotaDPR.remove(indexAnggotaDPRDicari);

            this.maksLebarId = 3;
            this.maksLebarNama = 5;
            this.maksLebarBidang = 7;
            this.maksLebarPartai = 7;

            for(AnggotaDPR anggota: daftarAnggotaDPR) {
                setMaksLebarId(Math.max(this.ambilMaksLebarId(), String.valueOf(anggota.ambilId()).length() + 1));
                konfigurasiTabel(anggota);
            }
        } else {
            System.out.println("tidak ditemukan id sama");
        }
    }

    public void printGarisPendek(int panjang, boolean prefix, boolean postfix) {
        if (prefix) System.out.print("+");
        for (int i = 0; i < panjang; i++) System.out.print("-");
        if (postfix) System.out.println("+");
    }

    public void printGaris() {
        printGarisPendek(maksLebarId + 1, true, false);
        printGarisPendek(maksLebarNama + 1, true, false);
        printGarisPendek(maksLebarBidang + 1, true, false);
        printGarisPendek(maksLebarPartai + 1, true, true);
    }

    public void tampilkan() {
        // tampilkan header
        printGaris();
        System.out.printf("| %-"+ maksLebarId +"s| %-"+ maksLebarNama +"s| %-"+ maksLebarBidang +"s| %-"+ maksLebarPartai +"s|\n",
                "id", "nama", "bidang", "partai");
        printGaris();

        // tampilkan data
        for (AnggotaDPR anggota : daftarAnggotaDPR) {
            System.out.printf("| %-"+ maksLebarId +"s| %-"+ maksLebarNama +"s| %-"+ maksLebarBidang +"s| %-"+ maksLebarPartai +"s|\n",
                    anggota.ambilId(), anggota.ambilNama(), anggota.ambilBidang(), anggota.ambilPartai());
        }

        if (!daftarAnggotaDPR.isEmpty()) printGaris();
        System.out.println();
    }
}

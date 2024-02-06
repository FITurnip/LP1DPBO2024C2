public class AnggotaDPR {
    private int id;
    private String nama;
    private String bidang;
    private String partai;

    public AnggotaDPR(int id, String nama, String bidang, String partai) {
        this.id = id;
        this.nama = nama;
        this.bidang = bidang;
        this.partai = partai;
    }

    public AnggotaDPR() {
        this.id = 0;
        this.nama = "";
        this.bidang = "";
        this.partai = "";
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setBidang(String bidang) {
        this.bidang = bidang;
    }

    public void setPartai(String partai) {
        this.partai = partai;
    }

    public int ambilId() {
        return id;
    }

    public String ambilNama() {
        return nama;
    }

    public String ambilBidang() {
        return bidang;
    }

    public String ambilPartai() {
        return partai;
    }
}

import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        DPR dpr = new DPR();
        int fiturDipilih;
        int id;
        String nama, bidang, partai;
        AnggotaDPR temp;
        boolean endProgram = false;

        System.out.println("No. Menu");
        System.out.println("1. Tambah Anggota");
        System.out.println("2. Ubah Anggota");
        System.out.println("3. Hapus Anggota");
        System.out.println("4. Tampilkan Anggota");
        System.out.println("5. Matikan Aplikasi");

        while (!endProgram) {
            System.out.print("FITUR > ");
            fiturDipilih = scanner.nextInt();

            switch (fiturDipilih) {
                case 1: // tambah anggota
                    System.out.print("id     : "); id = scanner.nextInt();
                    temp = new AnggotaDPR(id, "", "", "");

                    System.out.print("nama   : "); nama = scanner.next();
                    temp.setNama(nama);

                    System.out.print("bidang : "); bidang = scanner.next();
                    temp.setBidang(bidang);

                    System.out.print("partai : "); partai = scanner.next();
                    temp.setPartai(partai);

                    dpr.tambahAnggota(temp);
                    break;

                case 2: // ubah data
                    System.out.print("id     : "); id = scanner.nextInt();

                    System.out.print("nama   : "); nama = scanner.next();
                    temp = new AnggotaDPR(0, nama, "", "");

                    System.out.print("bidang : "); bidang = scanner.next();
                    temp.setBidang(bidang);

                    System.out.print("partai : "); partai = scanner.next();
                    temp.setPartai(partai);

                    dpr.ubahDataAnggota(id, temp);
                    break;

                case 3: // hapus data
                    System.out.print("id    : "); id = scanner.nextInt();
                    dpr.hapusDataAnggota(id);
                    break;

                case 4:
                    dpr.tampilkan();
                    break;

                case 5:
                    endProgram = true;
                    break;

                default:
                    System.out.println("tidak valid");
                    break;
            }
        }

        scanner.close();
    }
}

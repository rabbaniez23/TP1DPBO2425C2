import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static Scanner input = new Scanner(System.in);

    // Tambah gadget
    public static void tambahGadget(ArrayList<GudangGadget> gudang) {
        System.out.println("\n* Tambah Gadget Baru");
        System.out.print("ID Gudang   : ");
        String id = input.nextLine();
        System.out.print("Nama Gadget : ");
        String nama = input.nextLine();
        System.out.print("Harga (Rp)  : ");
        double harga = Double.parseDouble(input.nextLine());
        System.out.print("Stok        : ");
        int stok = Integer.parseInt(input.nextLine());
        System.out.print("Kategori    : ");
        String kategori = input.nextLine();
        System.out.print("Garansi (bulan) : ");
        int garansi = Integer.parseInt(input.nextLine());
        System.out.print("Kondisi (Baru/Bekas/Refurbished): ");
        String kondisi = input.nextLine();

        gudang.add(new GudangGadget(id, nama, harga, stok, kategori, garansi, kondisi));
        System.out.println("* Gadget berhasil ditambahkan!");
    }

    // Tampilkan semua
    public static void tampilkanSemua(ArrayList<GudangGadget> gudang) {
        System.out.println("\n* Daftar Gadget");
        if (gudang.isEmpty()) {
            System.out.println("Belum ada gadget.");
            return;
        }
        int i = 1;
        for (GudangGadget g : gudang) {
            System.out.println("\nGadget #" + i++);
            g.tampilkanInfo();
        }
    }

    // Hapus gadget
    public static void hapusGadget(ArrayList<GudangGadget> gudang) {
        System.out.print("\n* Hapus Gadget\nMasukkan ID Gadget: ");
        String id = input.nextLine();
        for (int i = 0; i < gudang.size(); i++) {
            if (gudang.get(i).getIdGudang().equals(id)) {
                gudang.remove(i);
                System.out.println("* Gadget berhasil dihapus!");
                return;
            }
        }
        System.out.println("* Gadget tidak ditemukan!");
    }

    // Update gadget
    public static void updateGadget(ArrayList<GudangGadget> gudang) {
        System.out.print("\n* Update Gadget\nMasukkan ID Gadget: ");
        String id = input.nextLine();
        for (GudangGadget g : gudang) {
            if (g.getIdGudang().equals(id)) {
                System.out.println("\n1. Ubah Nama\n2. Ubah Harga\n3. Ubah Stok\n4. Ubah Kategori\n5. Ubah Garansi\n6. Ubah Kondisi");
                System.out.print("Pilih: ");
                int pilihan = Integer.parseInt(input.nextLine());

                switch (pilihan) {
                    case 1 -> { System.out.print("Nama baru: "); g.setNamaGadget(input.nextLine()); }
                    case 2 -> { System.out.print("Harga baru: "); g.setHarga(Double.parseDouble(input.nextLine())); }
                    case 3 -> { System.out.print("Stok baru: "); g.setJumlahStok(Integer.parseInt(input.nextLine())); }
                    case 4 -> { System.out.print("Kategori baru: "); g.setKategoriTeknologi(input.nextLine()); }
                    case 5 -> { System.out.print("Garansi baru (bulan): "); g.setGaransiBulan(Integer.parseInt(input.nextLine())); }
                    case 6 -> { System.out.print("Kondisi baru: "); g.setKondisi(input.nextLine()); }
                    default -> { System.out.println("Pilihan tidak valid!"); return; }
                }
                System.out.println("* Data gadget berhasil diperbarui!");
                return;
            }
        }
        System.out.println("* Gadget tidak ditemukan!");
    }

    // Cari gadget
    public static void cariGadget(ArrayList<GudangGadget> gudang) {
        if (gudang.isEmpty()) {
            System.out.println("\n* Data gudang kosong!");
            return;
        }
        System.out.println("\n* Cari Gadget\n1. Berdasarkan ID\n2. Berdasarkan Nama");
        System.out.print("Pilih: ");
        int pilihan = Integer.parseInt(input.nextLine());

        if (pilihan == 1) {
            System.out.print("Masukkan ID Gadget: ");
            String id = input.nextLine();
            for (GudangGadget g : gudang) {
                if (g.getIdGudang().equals(id)) {
                    System.out.println("\n* Data ditemukan:");
                    g.tampilkanInfo();
                    return;
                }
            }
            System.out.println("* Gadget dengan ID " + id + " tidak ditemukan!");
        } else if (pilihan == 2) {
            System.out.print("Masukkan Nama Gadget: ");
            String nama = input.nextLine();
            for (GudangGadget g : gudang) {
                if (g.getNamaGadget().equalsIgnoreCase(nama)) {
                    System.out.println("\n* Data ditemukan:");
                    g.tampilkanInfo();
                    return;
                }
            }
            System.out.println("* Gadget dengan nama \"" + nama + "\" tidak ditemukan!");
        } else {
            System.out.println("* Pilihan tidak valid!");
        }
    }

    // Program utama
    public static void main(String[] args) {
        ArrayList<GudangGadget> gudang = new ArrayList<>();
        int pilihan;

        do {
            System.out.println("\n=== MENU GUDANG GADGET ===");
            System.out.println("1. Tambah Gadget");
            System.out.println("2. Tampilkan Semua");
            System.out.println("3. Hapus Gadget");
            System.out.println("4. Update Gadget");
            System.out.println("5. Cari Gadget");
            System.out.println("6. Keluar");
            System.out.print("Pilih: ");
            pilihan = Integer.parseInt(input.nextLine());

            switch (pilihan) {
                case 1 -> tambahGadget(gudang);
                case 2 -> tampilkanSemua(gudang);
                case 3 -> hapusGadget(gudang);
                case 4 -> updateGadget(gudang);
                case 5 -> cariGadget(gudang);
                case 6 -> System.out.println("* Terima kasih!");
                default -> System.out.println("* Pilihan tidak valid!");
            }
        } while (pilihan != 6);
    }
}

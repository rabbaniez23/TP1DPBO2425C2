public class GudangGadget {
    private String idGudang;
    private String namaGadget;
    private double harga;
    private int jumlahStok;
    private String kategoriTeknologi;
    private int garansiBulan;
    private String kondisi;

    // Konstruktor
    public GudangGadget(String id, String nama, double hrg, int stok, String kategori, int garansi, String kond) {
        this.idGudang = id;
        this.namaGadget = nama;
        this.harga = hrg;
        this.jumlahStok = stok;
        this.kategoriTeknologi = kategori;
        this.garansiBulan = garansi;
        this.kondisi = kond;
    }

    // Getter
    public String getIdGudang() { return idGudang; }
    public String getNamaGadget() { return namaGadget; }
    public double getHarga() { return harga; }
    public int getJumlahStok() { return jumlahStok; }
    public String getKategoriTeknologi() { return kategoriTeknologi; }
    public int getGaransiBulan() { return garansiBulan; }
    public String getKondisi() { return kondisi; }

    // Setter
    public void setNamaGadget(String nama) { this.namaGadget = nama; }
    public void setHarga(double hrg) { this.harga = hrg; }
    public void setJumlahStok(int stok) { this.jumlahStok = stok; }
    public void setKategoriTeknologi(String kategori) { this.kategoriTeknologi = kategori; }
    public void setGaransiBulan(int garansi) { this.garansiBulan = garansi; }
    public void setKondisi(String kond) { this.kondisi = kond; }

    // Method tampilkan info
    public void tampilkanInfo() {
        System.out.println("*******************************");
        System.out.println("* ID Gudang     : " + idGudang);
        System.out.println("* Nama Gadget   : " + namaGadget);
        System.out.printf("* Harga         : Rp %.2f%n", harga);
        System.out.println("* Jumlah Stok   : " + jumlahStok);
        System.out.println("* Kategori      : " + kategoriTeknologi);
        System.out.println("* Garansi       : " + garansiBulan + " bulan");
        System.out.println("* Kondisi       : " + kondisi);
        System.out.println("*******************************");
    }
}

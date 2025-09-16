class GudangGadget:
    def __init__(self, id_gudang, nama, harga, stok, kategori, garansi, kondisi):
        self.id_gudang = id_gudang
        self.nama_gadget = nama
        self.harga = harga
        self.jumlah_stok = stok
        self.kategori_teknologi = kategori
        self.garansi_bulan = garansi
        self.kondisi = kondisi

    # Getter
    def get_id_gudang(self):
        return self.id_gudang

    def get_nama_gadget(self):
        return self.nama_gadget

    def get_harga(self):
        return self.harga

    def get_jumlah_stok(self):
        return self.jumlah_stok

    def get_kategori_teknologi(self):
        return self.kategori_teknologi

    def get_garansi_bulan(self):
        return self.garansi_bulan

    def get_kondisi(self):
        return self.kondisi

    # Setter
    def set_nama_gadget(self, nama):
        self.nama_gadget = nama

    def set_harga(self, harga):
        self.harga = harga

    def set_jumlah_stok(self, stok):
        self.jumlah_stok = stok

    def set_kategori_teknologi(self, kategori):
        self.kategori_teknologi = kategori

    def set_garansi_bulan(self, garansi):
        self.garansi_bulan = garansi

    def set_kondisi(self, kondisi):
        self.kondisi = kondisi

    # Method tampilkan info
    def tampilkan_info(self):
        print("*******************************")
        print(f"* ID Gudang     : {self.id_gudang}")
        print(f"* Nama Gadget   : {self.nama_gadget}")
        print(f"* Harga         : Rp {self.harga:.2f}")
        print(f"* Jumlah Stok   : {self.jumlah_stok}")
        print(f"* Kategori      : {self.kategori_teknologi}")
        print(f"* Garansi       : {self.garansi_bulan} bulan")
        print(f"* Kondisi       : {self.kondisi}")
        print("*******************************")

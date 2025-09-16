from GudangGadget import GudangGadget

# Tambah gadget
def tambah_gadget(gudang):
    print("\n* Tambah Gadget Baru")
    id_gudang = input("ID Gudang   : ")
    nama = input("Nama Gadget : ")
    harga = float(input("Harga (Rp)  : "))
    stok = int(input("Stok        : "))
    kategori = input("Kategori    : ")
    garansi = int(input("Garansi (bulan) : "))
    kondisi = input("Kondisi (Baru/Bekas/Refurbished): ")

    gudang.append(GudangGadget(id_gudang, nama, harga, stok, kategori, garansi, kondisi))
    print("* Gadget berhasil ditambahkan!")


# Tampilkan semua gadget
def tampilkan_semua(gudang):
    print("\n* Daftar Gadget")
    if not gudang:
        print("Belum ada gadget.")
        return
    for i, g in enumerate(gudang, start=1):
        print(f"\nGadget #{i}")
        g.tampilkan_info()


# Hapus gadget
def hapus_gadget(gudang):
    print("\n* Hapus Gadget")
    id_gudang = input("Masukkan ID Gadget: ")
    for g in gudang:
        if g.get_id_gudang() == id_gudang:
            gudang.remove(g)
            print("* Gadget berhasil dihapus!")
            return
    print("* Gadget tidak ditemukan!")


# Update gadget
def update_gadget(gudang):
    print("\n* Update Gadget")
    id_gudang = input("Masukkan ID Gadget: ")
    for g in gudang:
        if g.get_id_gudang() == id_gudang:
            print("\n1. Ubah Nama\n2. Ubah Harga\n3. Ubah Stok\n4. Ubah Kategori\n5. Ubah Garansi\n6. Ubah Kondisi")
            pilihan = int(input("Pilih: "))

            if pilihan == 1:
                g.set_nama_gadget(input("Nama baru: "))
            elif pilihan == 2:
                g.set_harga(float(input("Harga baru: ")))
            elif pilihan == 3:
                g.set_jumlah_stok(int(input("Stok baru: ")))
            elif pilihan == 4:
                g.set_kategori_teknologi(input("Kategori baru: "))
            elif pilihan == 5:
                g.set_garansi_bulan(int(input("Garansi baru (bulan): "))
                )
            elif pilihan == 6:
                g.set_kondisi(input("Kondisi baru: "))
            else:
                print("Pilihan tidak valid!")
                return
            print("* Data gadget berhasil diperbarui!")
            return
    print("* Gadget tidak ditemukan!")


# Cari gadget
def cari_gadget(gudang):
    if not gudang:
        print("\n* Data gudang kosong!")
        return

    print("\n* Cari Gadget")
    print("1. Berdasarkan ID")
    print("2. Berdasarkan Nama")
    pilihan = int(input("Pilih: "))

    if pilihan == 1:
        id_gudang = input("Masukkan ID Gadget: ")
        for g in gudang:
            if g.get_id_gudang() == id_gudang:
                print("\n* Data ditemukan:")
                g.tampilkan_info()
                return
        print(f"* Gadget dengan ID {id_gudang} tidak ditemukan!")

    elif pilihan == 2:
        nama = input("Masukkan Nama Gadget: ")
        for g in gudang:
            if g.get_nama_gadget() == nama:
                print("\n* Data ditemukan:")
                g.tampilkan_info()
                return
        print(f"* Gadget dengan nama \"{nama}\" tidak ditemukan!")

    else:
        print("* Pilihan tidak valid!")


# === Program utama ===
def main():
    gudang = []
    while True:
        print("\n=== MENU GUDANG GADGET ===")
        print("1. Tambah Gadget")
        print("2. Tampilkan Semua")
        print("3. Hapus Gadget")
        print("4. Update Gadget")
        print("5. Cari Gadget")
        print("6. Keluar")
        pilihan = int(input("Pilih: "))

        if pilihan == 1:
            tambah_gadget(gudang)
        elif pilihan == 2:
            tampilkan_semua(gudang)
        elif pilihan == 3:
            hapus_gadget(gudang)
        elif pilihan == 4:
            update_gadget(gudang)
        elif pilihan == 5:
            cari_gadget(gudang)
        elif pilihan == 6:
            print("* Terima kasih!")
            break
        else:
            print("* Pilihan tidak valid!")


if __name__ == "__main__":
    main()

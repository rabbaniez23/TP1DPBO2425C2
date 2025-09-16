#include <iostream>
#include <vector>
#include <string>
#include "GudangGadget.cpp" 
using namespace std;

// Tambah gadget
void tambahGadget(vector<GudangGadget>& gudang) {
    string id, nama, kategori, kondisi;
    double harga;
    int stok, garansi;

    cout << "\n* Tambah Gadget Baru\n";
    cout << "ID Gudang   : ";
    cin >> id;
    cin.ignore();
    cout << "Nama Gadget : ";
    getline(cin, nama);
    cout << "Harga (Rp)  : ";
    cin >> harga;
    cout << "Stok        : ";
    cin >> stok;
    cin.ignore();
    cout << "Kategori    : ";
    getline(cin, kategori);
    cout << "Garansi (bulan) : ";
    cin >> garansi;
    cin.ignore();
    cout << "Kondisi (Baru/Bekas/Refurbished): ";
    getline(cin, kondisi);

    gudang.push_back(GudangGadget(id, nama, harga, stok, kategori, garansi, kondisi));
    cout << "* Gadget berhasil ditambahkan!\n";
}

// Tampilkan semua gadget
void tampilkanSemua(const vector<GudangGadget>& gudang) {
    cout << "\n* Daftar Gadget\n";
    if (gudang.empty()) {
        cout << "Belum ada gadget.\n";
        return;
    }
    for (size_t i = 0; i < gudang.size(); i++) {
        cout << "\nGadget #" << i + 1 << endl;
        gudang[i].tampilkanInfo();
    }
}

// Hapus gadget
void hapusGadget(vector<GudangGadget>& gudang) {
    string id;
    cout << "\n* Hapus Gadget\nMasukkan ID Gadget: ";
    cin >> id;

    for (auto it = gudang.begin(); it != gudang.end(); ++it) {
        if (it->getIdGudang() == id) {
            gudang.erase(it);
            cout << "* Gadget berhasil dihapus!\n";
            return;
        }
    }
    cout << "* Gadget tidak ditemukan!\n";
}

// Update gadget
void updateGadget(vector<GudangGadget>& gudang) {
    string id;
    cout << "\n* Update Gadget\nMasukkan ID Gadget: ";
    cin >> id;

    for (auto& g : gudang) {
        if (g.getIdGudang() == id) {
            int pilihan;
            cout << "\n1. Ubah Nama\n2. Ubah Harga\n3. Ubah Stok\n4. Ubah Kategori\n5. Ubah Garansi\n6. Ubah Kondisi\nPilih: ";
            cin >> pilihan;

            if (pilihan == 1) {
                string namaBaru;
                cin.ignore();
                cout << "Nama baru: ";
                getline(cin, namaBaru);
                g.setNamaGadget(namaBaru);
            } else if (pilihan == 2) {
                double hargaBaru;
                cout << "Harga baru: ";
                cin >> hargaBaru;
                g.setHarga(hargaBaru);
            } else if (pilihan == 3) {
                int stokBaru;
                cout << "Stok baru: ";
                cin >> stokBaru;
                g.setJumlahStok(stokBaru);
            } else if (pilihan == 4) {
                string kategoriBaru;
                cin.ignore();
                cout << "Kategori baru: ";
                getline(cin, kategoriBaru);
                g.setKategoriTeknologi(kategoriBaru);
            } else if (pilihan == 5) {
                int garansiBaru;
                cout << "Garansi baru (bulan): ";
                cin >> garansiBaru;
                g.setGaransiBulan(garansiBaru);
            } else if (pilihan == 6) {
                string kondisiBaru;
                cin.ignore();
                cout << "Kondisi baru: ";
                getline(cin, kondisiBaru);
                g.setKondisi(kondisiBaru);
            } else {
                cout << "Pilihan tidak valid!\n";
                return;
            }
            cout << "* Data gadget berhasil diperbarui!\n";
            return;
        }
    }
    cout << "* Gadget tidak ditemukan!\n";
}

// Cari gadget
// Cari gadget
void cariGadget(const vector<GudangGadget>& gudang) {
    if (gudang.empty()) {
        cout << "\n* Data gudang kosong!\n";
        return;
    }

    int pilihanCari;
    cout << "\n* Cari Gadget\n";
    cout << "1. Berdasarkan ID\n";
    cout << "2. Berdasarkan Nama\n";
    cout << "Pilih: ";
    cin >> pilihanCari;
    cin.ignore();

    if (pilihanCari == 1) {
        string id;
        cout << "Masukkan ID Gadget: ";
        getline(cin, id);

        for (const auto& g : gudang) {
            if (g.getIdGudang() == id) {
                cout << "\n* Data ditemukan:\n";
                g.tampilkanInfo();
                return;
            }
        }
        cout << "* Gadget dengan ID " << id << " tidak ditemukan!\n";

    } else if (pilihanCari == 2) {
        string nama;
        cout << "Masukkan Nama Gadget: ";
        getline(cin, nama);

        for (const auto& g : gudang) {
            if (g.getNamaGadget() == nama) {
                cout << "\n* Data ditemukan:\n";
                g.tampilkanInfo();
                return;
            }
        }
        cout << "* Gadget dengan nama \"" << nama << "\" tidak ditemukan!\n";

    } else {
        cout << "* Pilihan tidak valid!\n";
    }
}


int main() {
    vector<GudangGadget> gudang;
    int pilihan;

    do {
        cout << "\n=== MENU GUDANG GADGET ===\n";
        cout << "1. Tambah Gadget\n";
        cout << "2. Tampilkan Semua\n";
        cout << "3. Hapus Gadget\n";
        cout << "4. Update Gadget\n";
        cout << "5. Cari Gadget\n";
        cout << "6. Keluar\n";
        cout << "Pilih: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: tambahGadget(gudang); break;
            case 2: tampilkanSemua(gudang); break;
            case 3: hapusGadget(gudang); break;
            case 4: updateGadget(gudang); break;
            case 5: cariGadget(gudang); break;
            case 6: cout << "* Terima kasih!\n"; break;
            default: cout << "* Pilihan tidak valid!\n";
        }

    } while (pilihan != 6);

    return 0;
}

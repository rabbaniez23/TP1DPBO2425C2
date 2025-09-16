#include <iostream>
#include <iomanip>
#include <string>
using namespace std;

class GudangGadget {
private:
    string idGudang;
    string namaGadget;
    double harga;
    int jumlahStok;
    string kategoriTeknologi;
    int garansiBulan;
    string kondisi;

public:
    // Konstruktor
    GudangGadget(string id, string nama, double hrg, int stok,string kategori, int garansi, string kond) {
        this -> idGudang = id;
        this -> namaGadget = nama;
        this ->harga = hrg;
        this ->jumlahStok = stok;
        this ->kategoriTeknologi = kategori;
        this ->garansiBulan = garansi;
        this ->kondisi = kond;
    }

    // Getter
    string getIdGudang() const{

     return idGudang;
     
    }
    string getNamaGadget()const{

       return namaGadget;
    }
    double getHarga(){

       return harga; 
    } 
    int getJumlahStok() {

     return jumlahStok;
    }
    string getKategoriTeknologi(){

        return kategoriTeknologi; 
    } 
    int getGaransiBulan() {

        return garansiBulan; 
    }
    string getKondisi() {

        return kondisi; 
    }

    // Setter
    void setNamaGadget(string nama) { 
        this -> namaGadget = nama;
     }
    void setHarga(double hrg) {
        this-> harga = hrg; 
    }
    void setJumlahStok(int stok) {
        this-> jumlahStok = stok;
     }
    void setKategoriTeknologi(string kategori) { 
        this -> kategoriTeknologi = kategori; 
    }
    void setGaransiBulan(int garansi) {
        this -> garansiBulan = garansi;
     }
    void setKondisi(string kond) { 
        this -> kondisi = kond;
     }

    // Method tampilkan info
    void tampilkanInfo() const {
        cout << "*******************************" << endl;
        cout << "* ID Gudang     : " << idGudang << endl;
        cout << "* Nama Gadget   : " << namaGadget << endl;
        cout << "* Harga         : Rp " << fixed << setprecision(2) << harga << endl;
        cout << "* Jumlah Stok   : " << jumlahStok << endl;
        cout << "* Kategori      : " << kategoriTeknologi << endl;
        cout << "* Garansi       : " << garansiBulan << " bulan" << endl;
        cout << "* Kondisi       : " << kondisi << endl;
        cout << "*******************************" << endl;
    }
};

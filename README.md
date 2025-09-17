# TP1DPBO2425C2

**janji**

/*Saya Naufal rizki rabbani dengan NIM 2410946
mengerjakan tugas praktikum DPBO dalam mata kuliah
Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya
maka saya tidak akan melakukan kecurangan seperti
yang telah di spesifikasikan Aamiin.*/


**Desain Program**

Program ini menggunakan Object-Oriented Programming (OOP) dengan konsep Class.
Class GudangGadget → merepresentasikan 1 buah gadget. Di dalamnya ada data seperti:

-ID Gudang
-Nama Gadget
-Harga
-Jumlah Stok
-Kategori Teknologi
-Garansi (dalam bulan)
-Kondisi (Baru/Bekas/Refurbished)
Class ini juga punya method untuk menampilkan informasi, serta setter dan getter untuk mengubah dan mengambil data.

File main.cpp → menjadi program utama. Di sini ada menu :
-Menambah data gadget
-Menampilkan semua gadget
-Menghapus gadget
-Mengupdate data gadget
-Mencari gadget (berdasarkan ID atau Nama)
-Keluar dari program

Semua data disimpan dalam vector<GudangGadget>, sehingga jumlah gadget bisa fleksibel (dinamis, tidak perlu tentukan jumlah di awal).

**Alur Jalannya Program (Flow)**
Saat dijalankan, program menampilkan menu utama.
User memilih menu (1–6).
Jika pilih:
1.(Tambah Gadget) → user mengisi data gadget baru, lalu disimpan ke vector.
2.(Tampilkan Semua) → program mencetak semua gadget yang sudah ada.
3.(Hapus Gadget) → user masukkan ID gadget, lalu gadget dihapus dari vector.
4.(Update Gadget) → user pilih ID gadget, lalu memilih field yang mau diubah (nama, harga, stok, dll).
5.(Cari Gadget) → user bisa cari gadget berdasarkan ID atau Nama. Jika ketemu, info gadget ditampilkan.
6.(Keluar) → program berhenti dengan ucapan terima kasih.
Setelah selesai, program kembali ke menu sampai user memilih Keluar.

**dokumentasi**
<img width="403" height="623" alt="Screenshot 2025-09-16 230538" src="https://github.com/user-attachments/assets/9e0b61be-b511-4605-b2c1-67fc9c3a7970" />
<img width="461" height="765" alt="Screenshot 2025-09-16 230529" src="https://github.com/user-attachments/assets/02cb9f92-f33e-4ade-854d-9fe463b000c1" />
<img width="625" height="596" alt="Screenshot 2025-09-16 230517" src="https://github.com/user-attachments/assets/4fc402c6-a2ef-4a6b-b7e2-9be135a4e850" />
<img width="834" height="777" alt="Screenshot 2025-09-16 230459" src="https://github.com/user-attachments/assets/a407ca3a-757a-4cc8-9735-8893ddbadfbd" />






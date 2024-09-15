# NAMA APLIAKSI : Sistem Pembayaran Lab

> [!NOTE]
> As'syahrin Nanda - 13020200318

### Deskripsi Aplikasi

- Di Lab FIKOM ini proses pembayaran Lab seringkali melibatkan proses manual yang memakan waktu dan berpotensi menyebabkan kesalahan administrasi
- Tujuan utama dari pengembangan aplikasi Sistem Pembayaran Lab adalah untuk meningkatkan efisiensi administrasi seperti Mengurangi risiko kesalahan administrasi seperti pencatatan ganda atau kehilangan data dan Memungkinkan Mahasiswa dan Administrator untuk dengan mudah melacak status pembayaran Lab Mahasiswa
- Teknologi yang digunakan : Jquery Version 3.3.1, Bootstrap Version 5.3, PHP Version 8.1.25, DataTable-JavaScript

### Fitur MVP Aplikasi

ADMIN:

- Usermana Management (CRUD)
- Data Mahasiswa (CRUD)
- Data Matakuliah (CRUD)
- Pembayaran (CRUD)

KEPALA LAB

- Data Mahasiswa (Read)
- Data Matakuliah (Read)
- Pembayaran (Read)

MAHASISWA

- Check Pembayaran (No Login)

### Penjelasan Mengenai Arsitektur MVC

MODEL:

- Definisi: Model digunakan untuk mengelola data di dalam database.
- Peran Utama: Bertanggung jawab atas manipulasi data di dalam database, termasuk operasi pembacaan, penulisan, pembaruan, dan penghapusan data.
- Operasi Dalam: Perintah SQL dilaksanakan di dalam MODEL untuk berinteraksi dengan database.

CONTROLLER:

- Definisi: Controller berfungsi sebagai perantara antara MODEL dan VIEW.
- Peran Utama: Menerima data dari VIEW dan meneruskannya ke MODEL, dan sebaliknya, mengambil data dari MODEL dan menyajikannya kembali ke VIEW.
- Koordinasi Tugas: Mengatur alur logika dan kontrol dari aplikasi, menjembatani komunikasi antara pengguna (melalui VIEW) dan database (melalui MODEL).

VIEW:

- Definisi: VIEW adalah bagian dari aplikasi yang menangani tampilan atau antarmuka pengguna (UI).
- Peran Utama: Menyimpan semua elemen visual dan tampilan halaman, termasuk elemen- elemen HTML, CSS, dan interaksi pengguna.
- Tampilan Terpisah: Dalam arsitektur MVC, VIEW terpisah dari logika bisnis (MODEL dan CONTROLLER), fokus pada presentasi data kepada pengguna.

### LINK UML [Click here](https://drive.google.com/file/d/16Fs4rWuqPuVX3DMz9bBPWSB_-ZVO6LEX/view?usp=sharing)

### LINK ERD [Click here](https://drive.google.com/file/d/1EhTbzTVDDOujF91sDIwnerPsufnwQXME/view?usp=sharing)

### LINK UI/UX [Click here](https://www.figma.com/file/zw47oWnf2mJPOIEQ2ReHJF/SIPEMLA?type=design&t=6oC3R2qf856RMBFp-6)

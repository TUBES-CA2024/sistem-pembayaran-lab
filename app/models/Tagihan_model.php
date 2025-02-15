<?php
// models/Matakuliah_model.php

class Tagihan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertTagihanFromExcel($excelData)
    {
        // Cek apakah stambuk ada di tabel mahasiswa
        $query = "SELECT * FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $excelData['stambuk']);
        $result = $this->db->single();

        // Jika tidak ada data mahasiswa dengan stambuk tersebut, kembalikan false
        if (!$result) {
            return false; // Stambuk tidak valid
        }
        // Menyimpan data dari Excel ke dalam tabel tagihan
        $query = "INSERT INTO tagihan (stambuk, jumlah_tagihan, angkatan, tahun_akademik, semester, matakuliah)
                  VALUES (:stambuk, :jumlah_tagihan, :angkatan, :tahun_akademik, :semester, :matakuliah)";

        $this->db->query($query);
        $this->db->bind('stambuk', $excelData['stambuk']);
        $this->db->bind('jumlah_tagihan', $excelData['jumlah_tagihan']);
        $this->db->bind('angkatan', $excelData['angkatan']);
        $this->db->bind('tahun_akademik', $excelData['tahun_akademik']);
        $this->db->bind('semester', $excelData['semester']);
        $this->db->bind('matakuliah', $excelData['matakuliah']);

        return $this->db->execute();
    }

    public function processExcelFile($filePath)
    {
        require_once 'vendor/autoload.php';
        try {
            // Membaca file Excel
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = [];

            // Loop untuk mengambil data dari setiap baris di sheet
            foreach ($sheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);
                $excelData = [];

                foreach ($cellIterator as $cell) {
                    $excelData[] = $cell->getValue();
                }

                // Masukkan data ke array untuk digunakan
                $data[] = [
                    'stambuk' => $excelData[0],
                    'jumlah_tagihan' => $excelData[1],
                    'angkatan' => $excelData[2],
                    'tahun_akademik' => $excelData[3],
                    'semester' => $excelData[4],
                    'matakuliah' => $excelData[5]
                ];
            }

            return $data;
        } catch (Exception $e) {
            // Menangani error jika ada
            error_log($e->getMessage());
            return false;
        }
    }
    public function cekTagihan($id)
    {
        $this->db->query("SELECT COUNT(idtagihan) AS jumlah FROM tagihan WHERE stambuk = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return isset($result['jumlah']) ? $result['jumlah'] : 0;
    }

    public function tampil()
    {
        $query = "SELECT * FROM tagihan"; // Query untuk mengambil semua data tagihan
        $this->db->query($query);
        return $this->db->resultSet(); // Mengembalikan data dalam bentuk array
    }
    // public function tampilById($id)
    // {
    //     $query = "SELECT * FROM tagihan WHERE idtagihan = :idtagihan"; // Query untuk mengambil semua data tagihan
    //     $this->db->query($query);
    //     $this->db->bind('idtagihan', $id);
    //     return $this->db->single(); // Mengembalikan data dalam bentuk array
    // }
    public function hapus($id)
    {
        $query = "DELETE FROM tagihan WHERE idtagihan = :idtagihan"; // Query untuk menghapus tagihan berdasarkan id
        $this->db->query($query);
        $this->db->bind('idtagihan', $id);
        $this->db->execute(); // Mengembalikan hasil eksekusi query
        return $this->db->rowCount();
    }
    public function updateTagihan($id, $data)
    {
        $query = "UPDATE tagihan SET 
                stambuk = :stambuk, 
                jumlah_tagihan = :jumlah_tagihan, 
                angkatan = :angkatan, 
                tahun_akademik = :tahun_akademik, 
                semester = :semester, 
                matakuliah = :matakuliah 
              WHERE idtagihan = :idtagihan";

        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('jumlah_tagihan', $data['jumlah_tagihan']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('tahun_akademik', $data['tahun_akademik']);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('matakuliah', $data['matakuliah']);
        $this->db->bind('idtagihan', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan Di Beranda
    public function countTagihan()
    {
        $this->db->query("SELECT COUNT(idtagihan) AS jumlahTagihan FROM tagihan");
        return $this->db->single();
    }
    public function getPembayaranStambuk($stambuk)
    {
        $this->db->query("
        SELECT 
            mahasiswa.stambuk,
            mahasiswa.nama,
            tagihan.angkatan,
            tagihan.semester,
            tagihan.matakuliah,
            tagihan.jumlah_tagihan,
            tagihan.tahun_akademik,
            pembayaran.tanggal_pembayaran,
            pembayaran.jumlah_pembayaran,
            pembayaran.status
        FROM pembayaran
        JOIN tagihan ON tagihan.idtagihan = pembayaran.idtagihan
        JOIN mahasiswa ON mahasiswa.stambuk = tagihan.stambuk
        WHERE mahasiswa.stambuk = :stambuk
        ORDER BY pembayaran.tanggal_pembayaran DESC");

        $this->db->bind(':stambuk', $stambuk);
        // $this->db->bind(':angkatan', $angkatan);
        return $this->db->resultSet();
    }
}

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

    public function tampil()
    {
        $query = "SELECT * FROM tagihan"; // Query untuk mengambil semua data tagihan
        $this->db->query($query);
        return $this->db->resultSet(); // Mengembalikan data dalam bentuk array
    }
    public function hapus($id)
    {
        $query = "DELETE FROM tagihan WHERE idtagihan = :idtagihan"; // Query untuk menghapus tagihan berdasarkan id
        $this->db->query($query);
        $this->db->bind('idtagihan', $id);
        $this->db->execute(); // Mengembalikan hasil eksekusi query
        return $this->db->rowCount();
    }
    public function getStambukByIdTagihan($idtagihan)
    {
        // Query untuk mengambil stambuk berdasarkan idtagihan
        $query = "SELECT stambuk FROM tagihan WHERE idtagihan = :idtagihan";

        $this->db->query($query);

        // Bind parameter idtagihan
        $this->db->bind(':idtagihan', $idtagihan);

        // Mengambil hasilnya
        $result = $this->db->single(); // Mengambil satu hasil

        // Mengembalikan stambuk jika ditemukan, atau null jika tidak ada
        return $result ? $result['stambuk'] : null;
    }
}

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

    // public function tambah($data, $file)
    // {
    //     // Jika ada file yang diupload, proses file Excel
    //     if ($file && isset($file['excel_file']) && $file['excel_file']['error'] == 0) {
    //         // Menggunakan library PhpSpreadsheet
    //         require_once 'vendor/autoload.php';

    //         try {
    //             // Membaca file Excel
    //             $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file['excel_file']['tmp_name']);
    //             $sheet = $spreadsheet->getActiveSheet();

    //             // Loop setiap baris di sheet
    //             foreach ($sheet->getRowIterator() as $row) {
    //                 $cellIterator = $row->getCellIterator();
    //                 $cellIterator->setIterateOnlyExistingCells(false);
    //                 $excelData = [];

    //                 // Menyusun data dari setiap sel
    //                 foreach ($cellIterator as $cell) {
    //                     $excelData[] = $cell->getValue();
    //                 }

    //                 // Menyimpan data dari file Excel ke dalam tabel tagihan
    //                 // $this->insert_data($excelData);  // Memasukkan data langsung dari file Excel
    //             }
    //         } catch (Exception $e) {
    //             // Menangani error jika ada
    //             error_log($e->getMessage());
    //             return false;
    //         }
    //     } else {
    //         // Proses data manual jika tidak ada file Excel
    //         $query = "INSERT INTO tagihan (stambuk, jumlah_tagihan, angkatan, tahun_akademik, semester) 
    //               VALUES (:stambuk, :jumlah_tagihan, :angkatan, :tahun_akademik, :semester)";

    //         // Query untuk menyimpan data manual
    //         $this->db->query($query);
    //         $this->db->bind('stambuk', $data['stambuk']);
    //         $this->db->bind('jumlah_tagihan', $data['jumlah_tagihan']);
    //         $this->db->bind('angkatan', $data['angkatan']);
    //         $this->db->bind('tahun_akademik', $data['tahun_akademik']);
    //         $this->db->bind('semester', $data['semester']);
    //         $this->db->execute();
    //     }

    //     return $this->db->rowCount();
    // }
}

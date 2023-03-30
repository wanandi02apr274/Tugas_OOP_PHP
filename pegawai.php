<?php

class Pegawai {
    private $nip;
    private $nama;
    private $jabatan;
    private $agama;
    private $status;
    private $gajiPokok;
  
    public function __construct($nip, $nama, $jabatan, $agama, $status, $gajiPokok) {
      $this->nip = $nip;
      $this->nama = $nama;
      $this->jabatan = $jabatan;
      $this->agama = $agama;
      $this->status = $status;
      $this->gajiPokok = $gajiPokok;
    }
  
    public function setTunjab() {
      return 0.2 * $this->gajiPokok;
    }
  
    public function setTunkel() {
      return ($this->status === "menikah") ? (0.1 * $this->gajiPokok) : 0;
    }
  
    public function setZakatProfesi() {
      return ($this->agama === "muslim" && $this->gajiKotor() >= 6000000) ? (0.025 * $this->gajiPokok) : 0;
    }
  
    public function gajiKotor() {
      return $this->gajiPokok + $this->setTunjab() + $this->setTunkel();
    }
  
    public function gajiBersih() {
      return $this->gajiKotor() - $this->setZakatProfesi();
    }
  
    public function cetakGaji() {
      printf("%-10s %-15s %-15s %-10s %-10s %-10s %-10s %-10s %-10s %-10s\n", 
      $this->nip, 
      $this->nama, 
      $this->jabatan,
      $this->agama,
      $this->status, 
      $this->gajiPokok, 
      $this->setTunjab(), 
      $this->setTunkel(), 
      $this->setZakatProfesi(), 
      $this->gajiBersih());
    }
  }

// Membuat instance object pegawai
$pegawai1 = new Pegawai("<br> 123456", "Andi", "Manager", "muslim", "menikah", 15000000);
$pegawai2 = new Pegawai("<br> 234567", "Budi", "Asisten Manager", "non-muslim", "belum menikah", 10000000);
$pegawai3 = new Pegawai("<br> 345678", "Cindy", "Kepala Bagian", "muslim", "belum menikah", 7000000);
$pegawai4 = new Pegawai("<br> 456789", "Dedi", "Staff", "muslim", "menikah", 5000000);
$pegawai5 = new Pegawai("<br> 567890", "Eka", "Supervisor", "non-muslim", "menikah", 8000000);

// Mencetak struktur gaji pegawai
printf("%-10s %-15s %-15s %-10s %-10s %-10s %-10s %-10s %-10s %-10s\n", "<br> NIP", "Nama", "Jabatan", "Agama", "Status", "Gaji Pokok", "Tunj Jab", "Tunkel", "Zakat", "Gaji Bersih");
echo "<br>==================================================================================\n";
$pegawai1->cetakGaji();
$pegawai2->cetakGaji();
$pegawai3->cetakGaji();
$pegawai4->cetakGaji();
$pegawai5->cetakGaji();
?>
# 🏥 Sistem Rekam Medis dengan Metode CRM (Customer Relationship Management)

Sistem rekam medis digital yang dilengkapi dengan pendekatan **CRM (Customer Relationship Management)** untuk meningkatkan kualitas pelayanan terhadap pasien. Sistem ini mendukung multi-role, pengelolaan data medis lengkap, serta tracking riwayat pelayanan pasien.

---

## 🚀 Teknologi yang Digunakan

* **Backend:** CodeIgniter 3
* **Database:** MySQL
* **Frontend:** HTML, CSS, JavaScript, Bootstrap
* **Metode:** Customer Relationship Management (CRM)

---

## 👥 Role Pengguna

### 1. **Resepsionis**

* Registrasi pasien
* Input data kunjungan
* Pengaturan jadwal konsultasi

### 2. **Dokter**

* Melihat daftar pasien
* Menginput diagnosa
* Rekam medis lengkap
* Resep obat

### 3. **Apoteker**

* Melihat resep dari dokter
* Menyerahkan obat ke pasien
* Update stok obat

### 4. **Asisten Dokter (Asdok)**

* Membantu input pemeriksaan awal
* Manajemen data layanan

### 5. **Pasien**

* Melihat riwayat kunjungan
* Informasi obat & resep
* Informasi jadwal konsultasi

---

## 🧩 Fitur Utama

### 📋 **Manajemen Pasien**

* Registrasi & data lengkap pasien
* Nomor rekam medis otomatis

### 🩺 **Rekam Medis Lengkap**

* Data diagnosa
* Tindakan
* Resep obat
* Riwayat penyakit

### 💊 **Manajemen Obat**

* Stok obat
* Resep dari dokter
* Pengambilan obat oleh apoteker

### 📅 **Jadwal Konsultasi**

* Penjadwalan dokter
* Notifikasi ke pasien (opsional)

### 🤝 **CRM — Customer Relationship Management**

* Pemantauan kepuasan pasien
* Histori pelayanan
* Segmentasi pasien
* Pelacakan kebutuhan layanan berkala

### 📊 **Laporan**

* Laporan kunjungan
* Laporan obat masuk/keluar
* Laporan tindakan
* Laporan resep

---

## 📂 Struktur Direktori

```
rekam-medis-crm/
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   ├── config/
│   └── libraries/
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── system/
└── database.sql
```

---

## 🛠️ Instalasi & Setup

### 1. Clone Repository

```
git clone https://github.com/username/rekam-medis-crm.git
```

### 2. Import Database

* Buat database baru
* Import `database.sql`

### 3. Konfigurasi CodeIgniter

Ubah `application/config/config.php`:

```
$config['base_url'] = 'http://localhost/rekam-medis-crm/';
```

Ubah `application/config/database.php`:

```
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'rekam_medis',
```

### 4. Jalankan Project

Akses di browser:

```
http://localhost/rekam-medis-crm/
```

---

## 🔐 Login Default (opsional)

```
Resepsionis : resepsionis / 12345
Dokter      : dokter / 12345
Apoteker    : apoteker / 12345
Asdok       : asdok / 12345
Pasien      : pasien / 12345
```

---

## 📝 Lisensi

Private / Open Source — sesuaikan kebutuhan.

---

## 💬 Kontak

Hubungi developer untuk pengembangan modul tambahan.

---

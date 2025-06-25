Berikut adalah daftar **command `artisan` Laravel** dengan opsi `-mfs` (`--migration`, `--factory`, `--seeder`) berdasarkan struktur tabel yang sudah kita bahas.

Gunakan ini di terminal pada root project Laravel kamu.

---

### 🧑 Manajemen Pengguna

```bash
php artisan make:model User -mfs
php artisan make:model UserProfile -mfs
php artisan make:model Role -mfs
php artisan make:model ContactChannel -mfs
```

---

### 📘 Sistem Pembelajaran

```bash
php artisan make:model Course -mfs
php artisan make:model CourseModule -mfs
php artisan make:model ModuleType -mfs
php artisan make:model Enrollment -mfs
php artisan make:model UserProgress -mfs
```

---

### 🧪 Penilaian

```bash
php artisan make:model Assessment -mfs
php artisan make:model AssessmentQuestion -mfs
php artisan make:model AssessmentAttempt -mfs
```

---

### 📅 Sesi Sinkron (Live)

```bash
php artisan make:model Session -mfs
php artisan make:model SessionAttendance -mfs
```

---

### 🎓 Sertifikat & Keterampilan

```bash
php artisan make:model Certificate -mfs
php artisan make:model Skill -mfs
php artisan make:model UserSkill -mfs
```

---

### 💬 Dukungan & Feedback

```bash
php artisan make:model SupportTicket -mfs
php artisan make:model TicketMessage -mfs
```

---

### 🏢 Kelembagaan (Opsional)

```bash
php artisan make:model Organization -mfs
php artisan make:model OrganizationUser -mfs
```

---

### 📢 Komunikasi & Logging

```bash
php artisan make:model Notification -mfs
php artisan make:model AuditLog -mfs
php artisan make:model ActivityLog -mfs
```

---

### 📝 Tips:

* Gunakan `php artisan migrate` setelah selesai membuat dan menyesuaikan file migration.
* Untuk membuat seluruh struktur secara otomatis (misal saat awal development), kamu bisa tulis semua command ini di dalam 1 shell script (`init-models.sh`), lalu jalankan sekaligus.

Kalau kamu ingin saya bantu buatkan *file ERD*, isi migration-nya, atau seeder contoh (dummy data), tinggal beri tahu saja bagian mana yang mau diprioritaskan.

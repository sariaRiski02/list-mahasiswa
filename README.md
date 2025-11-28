Siap! Aku buatkan **README.md** yang rapi, modern, dan cocok untuk API Laravel Mahasiswa dengan Sanctum.
Kamu bisa langsung copy–paste ke GitHub.

---

# 📄 **README.md**

```md
# 🎓 API Mahasiswa – Laravel (Sanctum)

Proyek ini adalah REST API sederhana untuk mengelola data mahasiswa menggunakan **Laravel terbaru** dan **Laravel Sanctum** untuk autentikasi.

## 🚀 Fitur
- Get semua data mahasiswa
- Get detail mahasiswa berdasarkan ID
- Create data mahasiswa
- Update data mahasiswa
- Delete data mahasiswa
- Autentikasi menggunakan Laravel Sanctum

---

## 📁 Struktur Endpoint

Semua endpoint berada di bawah prefix:  

```

/api

````

### 🔐 Auth (Sanctum)
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/user` | Get data user login (harus login Sanctum) |

---

### 🎓 Mahasiswa API

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/mahasiswa` | Ambil semua data mahasiswa |
| GET | `/api/mahasiswa/{id}` | Ambil data 1 mahasiswa |
| POST | `/api/mahasiswa` | Tambah data mahasiswa baru |
| PUT | `/api/mahasiswa/{id}` | Update data mahasiswa |
| DELETE | `/api/mahasiswa/{id}` | Hapus data mahasiswa |

---

## 🛠️ Instalasi

### 1️⃣ Clone Repository
```bash
git clone https://github.com/username/repo.git
cd repo
````

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Copy .env

```bash
cp .env.example .env
```

### 4️⃣ Generate Key

```bash
php artisan key:generate
```

### 5️⃣ Migration Database

```bash
php artisan migrate
```

---

## 🔑 Instalasi Laravel Sanctum

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

Tambahkan ke `app/Http/Kernel.php`:

```php
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

---

## 🔧 Routes (routes/api.php)

```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mahasiswa', [mahasiswaController::class, 'allMahasiswa']);
Route::get('/mahasiswa/{id}', [mahasiswaController::class, 'getMahasiswa']);
Route::post('/mahasiswa', [mahasiswaController::class, 'createMahasiswa']);
Route::put('/mahasiswa/{id}', [mahasiswaController::class, 'updateMahasiswa']);
Route::delete('/mahasiswa/{id}', [mahasiswaController::class, 'deleteMahasiswa']);
```

---

## 📬 Contoh Request (Postman)

### ➤ POST /api/mahasiswa

```
{
    "nama": "Budi",
    "nim": "12345678",
    "jurusan": "Informatika"
}
```

---

## ▶️ Menjalankan Server

```bash
php artisan serve
```

Akses API:

```
http://127.0.0.1:8000/api/mahasiswa
```

---

## 🧪 Cek Route

```bash
php artisan route:list
```

---


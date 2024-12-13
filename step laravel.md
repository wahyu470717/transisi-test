Baik, saya akan membangun aplikasi Laravel sesuai dengan ketentuan yang Anda berikan. Berikut adalah langkah-langkah yang dapat saya lakukan:

1. **Persiapan Proyek Laravel**:
   - Buat proyek baru menggunakan Laravel:
     ```
     composer create-project laravel/laravel nama-aplikasi
     ```
   - Masuk ke direktori proyek dan jalankan server development:
     ```
     cd nama-aplikasi
     php artisan serve
     ```

2. **Konfigurasi Database dan Migrasi**:
   - Atur konfigurasi database di file `.env`.
   - Buat migrasi untuk tabel `companies` dan `employees`:
     ```
     php artisan make:migration create_companies_table
     php artisan make:migration create_employees_table
     ```
   - Isi migrasi dengan skema yang dibutuhkan sesuai dengan ketentuan.
   - Jalankan migrasi:
     ```
     php artisan migrate
     ```

3. **Autentikasi**:
   - Jalankan perintah untuk menginstall dan konfigurasi autentikasi:
     ```
     composer require laravel/ui
     php artisan ui vue --auth
     npm install && npm run dev
     ```
   - Buat seeder untuk admin user:
     ```
     php artisan make:seeder AdminUserSeeder
     ```
   - Isi seeder dengan data admin user sesuai ketentuan.
   - Jalankan seeder:
     ```
     php artisan db:seed --class=AdminUserSeeder
     ```

4. **Pengelolaan Data Companies dan Employees**:
   - Buat controller untuk Companies dan Employees menggunakan resource controller:
     ```
     php artisan make:controller CompanyController --resource
     php artisan make:controller EmployeeController --resource
     ```
   - Isi controller dengan method CRUD sesuai kebutuhan.
   - Buat request validation class untuk Companies dan Employees:
     ```
     php artisan make:request StoreCompanyRequest
     php artisan make:request StoreEmployeeRequest
     ```
   - Isi request class dengan validasi sesuai ketentuan.
   - Buat repository class untuk Companies dan Employees:
     ```
     php artisan make:repository CompanyRepository
     php artisan make:repository EmployeeRepository
     ```
   - Isi repository class dengan logic CRUD.
   - Buat route dan view untuk Companies dan Employees.

5. **Integrasi Laravel UI**:
   - Sesuaikan tampilan aplikasi menggunakan Laravel UI.
   - Buat layout, header, footer, dan pages yang dibutuhkan.

6. **Fitur Export PDF**:
   - Install paket `barryvdh/laravel-snappy`:
     ```
     composer require barryvdh/laravel-snappy
     ```
   - Konfigurasi paket di file `config/snappy.php`.
   - Buat controller method untuk export PDF.

7. **Fitur Import Excel**:
   - Install paket `maatwebsite/excel`:
     ```
     composer require maatwebsite/excel
     ```
   - Buat import class untuk menangani impor data Excel.
   - Buat controller method untuk proses impor.

8. **Integrasi Select2**:
   - Install paket `select2/select2`:
     ```
     npm install select2 --save-dev
     ```
   - Integrasikan Select2 di halaman tambah/edit employee.
   - Buat controller method untuk mengambil data perusahaan menggunakan AJAX.

Metode yang dibutuhkan dalam controller:

**CompanyController**:
- `index()`: Menampilkan daftar perusahaan dengan pagination.
- `create()`: Menampilkan form untuk menambah perusahaan baru.
- `store(StoreCompanyRequest $request)`: Memproses penyimpanan data perusahaan baru.
- `edit($id)`: Menampilkan form untuk mengedit perusahaan.
- `update(StoreCompanyRequest $request, $id)`: Memproses pembaruan data perusahaan.
- `destroy($id)`: Menghapus data perusahaan.

**EmployeeController**:
- `index()`: Menampilkan daftar karyawan dengan pagination.
- `create()`: Menampilkan form untuk menambah karyawan baru.
- `store(StoreEmployeeRequest $request)`: Memproses penyimpanan data karyawan baru.
- `edit($id)`: Menampilkan form untuk mengedit karyawan.
- `update(StoreEmployeeRequest $request, $id)`: Memproses pembaruan data karyawan.
- `destroy($id)`: Menghapus data karyawan.
- `exportPdf($companyId)`: Mengekspor data karyawan dalam format PDF berdasarkan ID perusahaan.
- `importExcel()`: Menampilkan form untuk mengimpor data karyawan dari Excel.
- `storeImportedExcel(Request $request)`: Memproses impor data karyawan dari Excel.

Semoga informasi ini membantu Anda dalam membangun aplikasi Laravel sesuai dengan ketentuan yang diberikan. Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menanyakannya.
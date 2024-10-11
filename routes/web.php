<?php

use Illuminate\Support\Facades\Route;
use Subfission\Cas\Facades\Cas; // Jangan lupa untuk import Facade CAS
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Route GET untuk menampilkan form upload
Route::get('/upload', function () {
    return view('upload');
});

// Route POST untuk menangani proses upload file tanpa membatasi jenis file
Route::post('/upload', function(Request $request) {
    // Validasi apakah file diupload dan memastikan bucket yang valid
    $request->validate([
        'file' => 'required|file|max:10000', // Maksimal 10MB
        'bucket' => 'required|string|in:sekolah1,sekolah2,sekolah3' // Memastikan bucket valid
    ]);

    // Ambil file dan bucket dari request
    $file = $request->file('file');
    $bucket = $request->input('bucket');

    // Ambil nama asli file
    $originalFilename = $file->getClientOriginalName();

    // Cek apakah file dengan nama yang sama sudah ada di bucket
    $disk = Storage::disk('s3_' . $bucket);
    $filename = pathinfo($originalFilename, PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $newFilename = $originalFilename;
    $counter = 1;

    // Jika file dengan nama yang sama sudah ada, tambahkan angka di belakang nama file
    while ($disk->exists('uploads/' . $newFilename)) {
        $newFilename = $filename . '(' . $counter . ').' . $extension;
        $counter++;
    }

    // Simpan file dengan nama yang sudah ditentukan ke bucket yang dipilih
    $path = $file->storeAs('uploads', $newFilename, 's3_' . $bucket);

    return response()->json([
        'message' => 'File uploaded successfully',
        'path' => $path,
    ]);
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Berikut adalah definisi route web untuk aplikasi Anda. Route di sini
| akan dilindungi oleh middleware CAS atau tidak, sesuai kebutuhan Anda.
|--------------------------------------------------------------------------
*/

// Halaman utama (tidak dilindungi oleh CAS)
Route::get('/', function () {
    return view('welcome'); // Pastikan view 'welcome' ada di resources/views
});

// Route untuk login menggunakan CAS
Route::get('/cas-login', function () {
    // Arahkan pengguna ke halaman login CAS
    return Cas::authenticate()->to('https://192.168.150.40:8443/cas/login');
});

// Route untuk logout CAS
Route::get('/cas-logout', function () {
    Cas::logout(); // Arahkan pengguna untuk logout melalui CAS
});

// Route untuk memeriksa apakah user sudah login via CAS (opsional)
//Route::get('/check-cas', function () {
//    if (Cas::isAuthenticated()) {
//        return 'User berhasil login melalui CAS: ' . Cas::user();
 //   } else {
 //       return 'User belum login melalui CAS.';
 //   }
//});

// Group route yang dilindungi oleh middleware CAS
//Route::group(['middleware' => 'cas.auth'], function () {
    // Route untuk dashboard (dilindungi oleh CAS)
//    Route::get('/dashboard', function () {
        // Pastikan view 'dashboard' ada di resources/views
 //       return view('dashboard');
   // });

    // Route untuk profil pengguna (dilindungi oleh CAS)
   // Route::get('/profile', function () {
        // Pastikan view 'profile' ada di resources/views
    //    return view('profile');
  //  });
//});

//require_once 'vendor/autoload.php';

//phpCAS::client(CAS_VERSION_2_0, '192.168.150.40', 8443, '/cas');

// Nonaktifkan validasi SSL jika menggunakan sertifikat self-signed
//phpCAS::setNoCasServerValidation();

// Arahkan pengguna untuk login ke CAS
//phpCAS::forceAuthentication();

// Setelah login, dapatkan nama pengguna
//echo phpCAS::getUser();
?>

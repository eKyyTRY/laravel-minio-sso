<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class FileUploadController extends Controller
{
    // Method untuk menampilkan form upload
    public function showUploadForm()
    {
        return view('upload'); // Mengarahkan ke form upload
    }

    // Method untuk menangani proses upload file
    public function uploadAdmin(Request $request)
    {
        // Validasi bahwa file harus ada
//	if ($request->user()->role !=='admin') {
//	    return response('Unauthorized', 403);}
        $request->validate([
           'file' => 'required|file|mimes:jpg,jpeg,png,exe,gif,mp4,mkv,avi,doc,docx,pdf,zip,xlsx,pkt'
        ]);

        // Ambil file dari request
        $file = $request->file('file');

	$filePath = 'uploads/admin' . $file->getClientOriginalName();

//	$originalName = $file->getClientOriginalName();

	$fileName = Str::uuid () . '_' . $filePath;

        // Upload file ke MinIO (disk s3)
        $path = Storage::disk('minio-admin')->putFileAs('server-files',$file,$fileName);

	$disk = 'minio-admin';
	if ($request->user()->role === 'admin') {
	    $disk = 'minio-admin';
}
        // Mendapatkan URL publik file
        $url = Storage::disk('minio-admin')->url($path);

        // Kembalikan URL file yang bisa diklik
        return 'File uploaded to: <a href="' . $url . '" target="_blank">' . $url . '</a>';
    }


    public function uploadUser1(Request $request)
    {
	if ($request->user()->role !=='user1') {
	    return response('Unauthorized', 403);}
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,exe,gif,mp4,mkv,avi,doc,docx,pdf,zip,xlsx,pkt'
        ]);

        $file = $request->file('file');

	$filePath = 'uploads/user1' . $file->getClientOriginalName();

//        $originalName = $file->getClientOriginalName();

        $fileName = Str::uuid () . '_' . $filePath;

        $path = Storage::disk('minio-user1')->putFileAs('user1',$file,$fileName);

        $url = Storage::disk('minio-user1')->url($path);

        return 'File uploaded to: <a href="' . $url . '" target="_blank">' . $url . '</a>';
    }


    public function uploadUser2(Request $request)
    {
	if ($request->user()->role !=='user2') {
	    return response('Unauthorized', 403);}
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,exe,gif,mp4,mkv,avi,doc,docx,pdf,zip,xlsx,pkt'
        ]);

        $file = $request->file('file');

	$filePath = 'uploads/user2' . $file->getClientOriginalName();

//        $originalName = $file->getClientOriginalName();

        $fileName = Str::uuid () . '_' . $filePath;

        $path = Storage::disk('minio-user2')->putFileAs('user2',$file,$fileName);

        $url = Storage::disk('minio-user2')->url($path);

        return 'File uploaded to: <a href="' . $url . '" target="_blank">' . $url . '</a>';
    }


    public function uploadUser3(Request $request)
    {
	if ($request->user()->role !=='user3') {
	    return response('Unauthorized', 403);}
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,exe,gif,mp4,mkv,avi,doc,docx,pdf,zip,xlsx,pkt' //BERAGAM .FILE
        ]);

        $file = $request->file('file');

	$filePath = 'uploads/user3' . $file->getClientOriginalName();

//        $originalName = $file->getClientOriginalName(); //NO ENKRIPSI

        $fileName = Str::uuid () . '_' . $filePath;
//        $fileName = Str::uuid () . '_' . $originalName; //UNIQUE NAME BIAR BISA POST FILE YG SAMA

        $path = Storage::disk('minio-user3')->putFileAs('user3',$file,$fileName);

        $url = Storage::disk('minio-user3')->url($path);

        return 'File uploaded to: <a href="' . $url . '" target="_blank">' . $url . '</a>';
    }
}

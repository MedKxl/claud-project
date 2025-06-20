<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Google\Cloud\Storage\StorageClient;
use Smalot\PdfParser\Parser as PDFReader;
use App\Helpers\Classifier;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf|max:20480',
        ]);

        $file = $request->file('document');
        $newName = time() . '_' . $file->getClientOriginalName();
        $fileSize = round($file->getSize() / 1024);

        try {
            $parser = new PDFReader();
            $pdf = $parser->parseFile($file->getRealPath());
            $text = $pdf->getText();

            $title = Str::limit(trim(explode("\n", $text)[0] ?? 'Untitled'), 255);

            $category = Classifier::classify($text);

            $storage = new StorageClient([
                'keyFilePath' => base_path(env('GOOGLE_CLOUD_KEY_FILE')),
            ]);
            $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));

            if (!$bucket->exists()) {
                return back()->with('error', 'Bucket does not exist');
            }

            $bucket->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'documents/' . $newName
            ]);

            DB::table('documents')->insert([
                'file_name'   => $newName,
                'title'       => $title,
                'text'        => $text,
                'category'    => $category,
                'size_kb'     => $fileSize,
                'uploaded_at' => Carbon::now(),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);

            return back()->with('success', 'Uploaded successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Upload failed: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $docs = DB::table('documents')->orderByDesc('uploaded_at')->get();

        foreach ($docs as $doc) {
            $doc->public_url = 'https://storage.googleapis.com/' . env('GOOGLE_CLOUD_STORAGE_BUCKET') . '/documents/' . $doc->file_name;
        }

        return view('documents', ['documents' => $docs]);
    }

    public function performSearch(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $term = $request->input('query');

        $matches = DB::table('documents')
            ->where('title', 'like', "%$term%")
            ->orWhere('text', 'like', "%$term%")
            ->limit(10)
            ->get();

        return view('search', [
            'results' => $matches,
            'query' => $term
        ]);
    }

    public function showSearchForm()
    {
        return view('search');
    }
}

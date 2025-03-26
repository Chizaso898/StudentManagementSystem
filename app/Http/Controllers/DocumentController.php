<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    // Function to upload a document
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $filePath = $request->file('file')->store('documents', 'public');

        $document = new Document();
        $document->file_path = $filePath;
        $document->user_id = auth()->id();
        $document->save();

        return back()->with('success', 'Document uploaded successfully!');
    }

    // Function to preview documents
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return response()->file(storage_path('app/public/' . $document->file_path));
    }
}

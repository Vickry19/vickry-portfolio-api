<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'admin.certificates.index',
            compact('certificates')
        );
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'issuer' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'credential_id' => ['nullable', 'string', 'max:255'],
            'credential_url' => ['nullable', 'url', 'max:2048'],

            /*
             * File sudah di-upload langsung ke Vercel Blob.
             */
            'file' => ['nullable', 'url', 'max:2048'],

            'file_type' => [
                'nullable',
                'string',
                'max:10',
            ],

            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Visibility
        |--------------------------------------------------------------------------
        */

        $validated['is_visible'] = $request->boolean('is_visible');

        /*
        |--------------------------------------------------------------------------
        | File URL
        |--------------------------------------------------------------------------
        |
        | URL sudah berasal dari Vercel Blob.
        |
        */

        $validated['file'] = $request->input('file');

        /*
        |--------------------------------------------------------------------------
        | Create Certificate
        |--------------------------------------------------------------------------
        */

        Certificate::create($validated);

        return redirect()
            ->route('admin.certificates.index')
            ->with(
                'success',
                'Certificate created successfully.'
            );
    }

    public function edit(Certificate $certificate)
    {
        return view(
            'admin.certificates.edit',
            compact('certificate')
        );
    }

    public function update(
        Request $request,
        Certificate $certificate
    ) {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'issuer' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'credential_id' => ['nullable', 'string', 'max:255'],
            'credential_url' => ['nullable', 'url', 'max:2048'],

            /*
             * File baru berupa URL Vercel Blob.
             */
            'file' => ['nullable', 'url', 'max:2048'],

            'file_type' => [
                'nullable',
                'string',
                'max:10',
            ],

            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Visibility
        |--------------------------------------------------------------------------
        */

        $validated['is_visible'] = $request->boolean('is_visible');

        /*
        |--------------------------------------------------------------------------
        | Replace File
        |--------------------------------------------------------------------------
        |
        | Jika ada file baru:
        | - file sudah berada di Vercel Blob
        | - database diperbarui dengan URL baru
        |
        | File lama yang masih menggunakan Laravel Storage akan
        | tetap dihapus.
        |
        */

        if ($request->filled('file')) {
            $oldFile = $certificate->file;

            $validated['file'] = $request->input('file');

            /*
             * Hapus hanya file legacy Laravel Storage.
             */
            if (
                $oldFile &&
                !Str::startsWith(
                    $oldFile,
                    ['http://', 'https://']
                )
            ) {
                Storage::disk('public')->delete($oldFile);
            }
        } else {
            /*
             * Jika tidak upload file baru,
             * pertahankan file lama.
             */
            unset($validated['file']);
            unset($validated['file_type']);
        }

        /*
        |--------------------------------------------------------------------------
        | Update Certificate
        |--------------------------------------------------------------------------
        */

        $certificate->update($validated);

        return redirect()
            ->route('admin.certificates.index')
            ->with(
                'success',
                'Certificate updated successfully.'
            );
    }

    public function destroy(Certificate $certificate)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete File
        |--------------------------------------------------------------------------
        |
        | Hanya file legacy Laravel Storage yang dihapus.
        | URL Vercel Blob tidak diproses dengan Storage.
        |
        */

        if (
            $certificate->file &&
            !Str::startsWith(
                $certificate->file,
                ['http://', 'https://']
            )
        ) {
            Storage::disk('public')->delete(
                $certificate->file
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Database Record
        |--------------------------------------------------------------------------
        */

        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with(
                'success',
                'Certificate deleted successfully.'
            );
    }
}
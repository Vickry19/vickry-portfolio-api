<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.certificates.index', compact('certificates'));
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
            'file' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:10240',
            ],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $validated['file'] = $file->store(
                'certificates',
                'public'
            );

            $validated['file_type'] = $file->getClientOriginalExtension();
        }

        $validated['is_visible'] = $request->boolean('is_visible');

        Certificate::create($validated);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
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
            'file' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:10240',
            ],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            if ($certificate->file) {
                Storage::disk('public')->delete(
                    $certificate->file
                );
            }

            $file = $request->file('file');

            $validated['file'] = $file->store(
                'certificates',
                'public'
            );

            $validated['file_type'] = $file->getClientOriginalExtension();
        }

        $validated['is_visible'] = $request->boolean('is_visible');

        $certificate->update($validated);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file) {
            Storage::disk('public')->delete(
                $certificate->file
            );
        }

        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}
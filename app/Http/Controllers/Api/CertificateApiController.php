<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;

class CertificateApiController extends Controller
{
    public function index()
    {
        $certificates = Certificate::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $certificates->map(function ($certificate) {
                return [
                    'id' => $certificate->id,
                    'title' => $certificate->title,
                    'issuer' => $certificate->issuer,
                    'issuedAt' => $certificate->issued_at,
                    'credentialId' => $certificate->credential_id,
                    'credentialUrl' => $certificate->credential_url,
                    'file' => $certificate->file
                        ? asset('storage/' . $certificate->file)
                        : null,
                    'fileType' => $certificate->file_type,
                    'description' => $certificate->description,
                ];
            })->values(),
        ]);
    }
}
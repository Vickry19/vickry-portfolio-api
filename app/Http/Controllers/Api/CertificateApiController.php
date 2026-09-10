<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Support\Str;

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

                    'file' => $this->assetUrl(
                        $certificate->file
                    ),

                    'fileType' => $certificate->file_type,
                    'description' => $certificate->description,
                ];
            })->values(),
        ]);
    }

    /**
     * Convert storage path to URL.
     *
     * Keep Vercel Blob URLs unchanged.
     */
    private function assetUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Vercel Blob / External URL
        |--------------------------------------------------------------------------
        */

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        /*
        |--------------------------------------------------------------------------
        | Legacy Laravel Storage
        |--------------------------------------------------------------------------
        */

        return asset('storage/' . $path);
    }
}
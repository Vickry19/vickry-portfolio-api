<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectImageController extends Controller
{
    /**
     * Delete project gallery image.
     */
    public function destroy(ProjectImage $projectImage): RedirectResponse
    {
        $project = $projectImage->project;

        /*
        |--------------------------------------------------------------------------
        | Delete physical file
        |--------------------------------------------------------------------------
        |
        | Jika image masih menggunakan Laravel local storage,
        | hapus file dari storage/public.
        |
        | Jika image sudah berupa Vercel Blob URL,
        | jangan gunakan Storage::disk('public')->delete()
        | karena file tersebut tidak berada di local storage Laravel.
        |
        */

        if ($projectImage->image) {
            $image = $projectImage->image;

            // Hanya hapus dari Laravel Storage jika bukan URL.
            if (!Str::startsWith($image, ['http://', 'https://'])) {
                Storage::disk('public')->delete($image);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete database record
        |--------------------------------------------------------------------------
        */

        $projectImage->delete();

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'Gambar gallery berhasil dihapus.');
    }
}
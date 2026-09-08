<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    /**
     * Delete project gallery image.
     */
    public function destroy(ProjectImage $projectImage): RedirectResponse
    {
        $project = $projectImage->project;

        if ($projectImage->image) {
            Storage::disk('public')->delete(
                $projectImage->image
            );
        }

        $projectImage->delete();

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'Gambar gallery berhasil dihapus.');
    }
}
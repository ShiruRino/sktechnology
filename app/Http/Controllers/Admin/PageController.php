<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    // Menampilkan form edit berdasarkan slug
    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('admin.pages.edit', compact('page'));
    }

    // Menyimpan perubahan konten
    public function update(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'galleries.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Untuk Slider
            'clients.*' => 'image|mimes:jpeg,png,jpg,svg,gif|max:2048' // Untuk Partner/Client Logos (mendukung SVG/GIF)
        ]);

        $page = Page::where('slug', $slug)->firstOrFail();
        $page->content = $request->content;

        // 1. Update Background Image Utama (type: 'background')
        if ($request->hasFile('image')) {
            $bgGallery = PageGallery::where('page_id', $page->id)->where('type', 'background')->first();
            
            if ($bgGallery) {
                if (!str_starts_with($bgGallery->image, 'images/')) {
                    Storage::disk('public')->delete($bgGallery->image);
                }
                $bgGallery->update([
                    'image' => $request->file('image')->store('pages/background', 'public')
                ]);
            } else {
                PageGallery::create([
                    'page_id' => $page->id,
                    'type' => 'background',
                    'image' => $request->file('image')->store('pages/background', 'public')
                ]);
            }
        }

        $page->save();

        // 2. Simpan Multiple Image (Untuk Carousel/Slider di Timor Leste, type: 'slider')
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $path = $file->store('pages/gallery', 'public');
                PageGallery::create([
                    'page_id' => $page->id,
                    'type' => 'slider',
                    'image' => $path
                ]);
            }
        }

        // 3. Simpan Multiple Image (Untuk Strategic Partners di Company Overview, type: 'client')
        if ($request->hasFile('clients')) {
            foreach ($request->file('clients') as $file) {
                $path = $file->store('pages/clients', 'public');
                PageGallery::create([
                    'page_id' => $page->id,
                    'type' => 'client', // Disimpan sebagai client
                    'image' => $path
                ]);
            }
        }
        if ($request->has('client_links')) {
            foreach ($request->client_links as $id => $link) {
                $gallery = PageGallery::find($id);
                if ($gallery) {
                    // Jika dikosongkan, kembalikan ke '#'
                    $gallery->update(['link' => $link ? $link : '#']);
                }
            }
        }

        return back()->with('success', 'Content updated successfully!');
    }

    // Fungsi hapus ini otomatis berlaku untuk background, slider, maupun client!
    public function deleteGallery($id)
    {
        $gallery = PageGallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return back()->with('success', 'Image removed successfully!');
    }
}
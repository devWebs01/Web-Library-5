<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 'title','image','category_id','isbn','author','year_published','publisher','synopsis','book_count'
     * url: https://www.dbooks.org/api/recent
     * url: https://www.dbooks.org/api/book/{id}
     */
    public function run()
    {

        $recentBooks = Http::get('https://www.dbooks.org/api/search/primary-school')->json();

        if (isset($recentBooks['books'])) {
            foreach ($recentBooks['books'] as $book) {
                if (isset($book['id'])) {
                    $bookDetails = Http::get('https://www.dbooks.org/api/book/'.$book['id'])->json();

                    if (isset($bookDetails['image'])) {
                        $category = Category::all()->random();
                        $imageName = basename($bookDetails['image']);

                        $translator = new GoogleTranslate('id'); // 'id' untuk bahasa Indonesia

                        try {
                            $title = $translator->translate($bookDetails['title']);
                        } catch (\Exception $e) {
                            $this->command->warn('Gagal menerjemahkan judul: '.$e->getMessage());
                            $title = $bookDetails['title']; // Gunakan teks asli jika gagal
                        }

                        try {
                            $synopsis = $translator->translate($bookDetails['description']);
                        } catch (\Exception $e) {
                            $this->command->warn('Gagal menerjemahkan deskripsi: '.$e->getMessage());
                            $synopsis = $bookDetails['description']; // Gunakan teks asli jika gagal
                        }

                        $bookData = [
                            'title' => $title,
                            'image' => 'images/'.$imageName,
                            'category_id' => $category->id,
                            'isbn' => $bookDetails['id'],
                            'author' => $bookDetails['authors'],
                            'year_published' => $bookDetails['year'],
                            'publisher' => $bookDetails['publisher'],
                            'synopsis' => $synopsis,
                            'book_count' => rand(1, 100),
                            'source' => 'Data BOSS',
                            'bookshelf' => 'Rak 1',
                            'type' => Arr::random(['Umum', 'Paket']),
                            'price' => rand(25, 90). 0000,
                        ];

                        $bookModel = Book::create($bookData);

                        // Simpan gambar ke storage
                        $imageUrl = $bookDetails['image'];
                        $imageData = file_get_contents($imageUrl);
                        Storage::put('public/images/'.$imageName, $imageData);

                        $this->command->info('Buku ditambahkan: '.$bookModel->title);
                    } else {
                        $this->command->error('Struktur bookDetails tidak valid: gambar hilang');
                    }
                } else {
                    $this->command->error('Struktur buku tidak valid: ID hilang');
                }
            }
        } else {
            $this->command->error('Struktur recentBooks tidak valid: daftar buku hilang');
        }

        $this->command->info('Seeder finished.');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GoogleBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar kategori dalam bahasa Indonesia
        $categories = [
            'Matematika SMK' => 'Matematika+SMK',
            'Bahasa Inggris SMK' => 'Bahasa+Inggris+SMK',
            'Sejarah SMK' => 'Sejarah+SMK',
            'Pelajaran SMK' => 'Pelajaran+SMK',
            'Teknik Komputer & Jaringan' => 'Teknik+Komputer+Jaringan+SMK',
            'Akuntansi SMK' => 'Akuntansi+SMK',
            'Tata Boga SMK' => 'Tata+Boga+SMK',
            'Desain Grafis SMK' => 'Desain+Grafis+SMK',
        ];

        foreach ($categories as $categoryName => $query) {
            // Ambil data dari Google Books API
            $response = Http::get("https://www.googleapis.com/books/v1/volumes?q={$query}&maxResults=10");

            if ($response->failed()) {
                Log::error("Gagal mengambil data dari Google Books API untuk kategori: $categoryName");

                continue;
            }

            $books = $response->json()['items'] ?? [];

            foreach ($books as $book) {
                $volumeInfo = $book['volumeInfo'] ?? [];

                // Ambil data buku yang diperlukan
                $title = $volumeInfo['title'] ?? null;
                $imageUrl = $volumeInfo['imageLinks']['thumbnail'] ?? null;
                $isbn = isset($volumeInfo['industryIdentifiers'][0]) ? $volumeInfo['industryIdentifiers'][0]['identifier'] : null;
                $author = isset($volumeInfo['authors']) ? implode(', ', $volumeInfo['authors']) : null;
                $yearPublished = isset($volumeInfo['publishedDate']) ? substr($volumeInfo['publishedDate'], 0, 4) : null;
                $publisher = $volumeInfo['publisher'] ?? null;
                $synopsis = $volumeInfo['description'] ?? 'Tidak ada sinopsis.';
                $price = rand(50000, 300000); // Set harga acak jika tidak tersedia
                $bookCount = rand(1, 10); // Jumlah stok acak

                // Pastikan data yang penting tidak kosong, jika kosong maka skip
                if (! $yearPublished || ! $title || ! $isbn || ! $author) {
                    Log::warning('Skipping book due to missing data: '.json_encode($book));

                    continue;
                }

                // Simpan kategori atau ambil ID jika sudah ada
                $category = Category::firstOrCreate(['name' => $categoryName]);

                // Simpan gambar ke storage jika tersedia
                $imagePath = null;
                if ($imageUrl) {
                    $imageName = 'book_'.time().'_'.uniqid().'.jpg';
                    $imageData = file_get_contents($imageUrl);
                    Storage::put('public/images/'.$imageName, $imageData);
                    $imagePath = 'images/'.$imageName;
                }

                try {
                    // Simpan ke database
                    $bookModel = Book::create([
                        'title' => $title,
                        'image' => $imagePath,
                        'category_id' => $category->id,
                        'isbn' => $isbn,
                        'author' => $author,
                        'year_published' => $yearPublished,
                        'publisher' => $publisher,
                        'synopsis' => $synopsis,
                        'book_count' => $bookCount,
                        'source' => 'Google Books API',
                        'bookshelf' => 'Rak 1',
                        'type' => 'Umum',
                        'price' => $price,
                    ]);

                    // Menampilkan info ke terminal
                    $this->command->info('Buku ditambahkan: '.$bookModel->title.' - Kategori: '.$category->name);
                } catch (\Exception $e) {
                    Log::error("Gagal menyimpan buku: {$title}. Error: ".$e->getMessage());

                    continue;
                }
            }
        }
    }
}

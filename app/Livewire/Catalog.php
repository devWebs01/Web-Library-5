<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Catalog extends Component
{
    use WithPagination;

    public $search = '';

    public $category_id = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // Dapatkan semua buku jika tidak ada search dan category

        if (! $this->search && ! $this->category_id) {
            $books = Book::latest()->get();
        }

        // Dapatkan buku berdasarkan search
        elseif ($this->search && ! $this->category_id) {
            $books = Book::where('title', 'like', '%' . $this->search . '%')->latest()->get();
        }

        // Dapatkan buku berdasarkan category
        elseif (! $this->search && $this->category_id) {
            $books = Book::where('category_id', $this->category_id)->latest()->get();
        }

        // Dapatkan buku berdasarkan search dan category
        else {

            $books = Book::where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category_id)->latest()->get();
        }

        return view('livewire.catalog', [
            'books' => $books,
            'categories' => Category::get(),
        ]);
    }
}

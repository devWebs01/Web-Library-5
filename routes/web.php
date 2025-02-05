<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmationAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'book' => Book::count(),
        'transaction' => Transaction::count(),
        'user' => User::whereNotNull('email_verified_at')->count(),
    ]);
});

Auth::routes();

Route::get('/catalog-books', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog-books/{id}/show', [CatalogController::class, 'show'])->name('catalog.show');

Route::middleware(['auth', 'role:Petugas,Kepala'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('profile')->group(function () {
        Route::get('/{slug}', [ProfileController::class, 'index'])->name('profile');
        Route::put('/{id}/account', [ProfileController::class, 'account'])->name('profile.account');
        Route::put('/{id}/password', [ProfileController::class, 'password'])->name('profile.password');
    });

    Route::prefix('users')->group(function () {
        Route::get('/officer', [UserController::class, 'officer'])->name('users.officer');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{slug}/show', [UserController::class, 'show'])->name('users.show');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('confirmation-account')->group(function () {
        Route::get('/', [ConfirmationAccountController::class, 'index'])->name('confirmations.index');
        Route::put('/{id}/accept', [ConfirmationAccountController::class, 'accept'])->name('confirmations.accept');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/{id}/show', [BookController::class, 'show'])->name('books.show');
        Route::put('/{id}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::prefix('transactions')->group(function () {
        Route::get('/borrow', [TransactionController::class, 'borrow'])->name('transactions.borrow');
        Route::get('/return', [TransactionController::class, 'return'])->name('transactions.return');
        Route::post('/', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/{id}/show', [TransactionController::class, 'show'])->name('transactions.show');
        Route::put('/{id}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

        Route::put('/{id}/action', [StatusController::class, 'action'])->name('transactions.action');

        Route::put('/{id}/confirmation', [TransactionController::class, 'confirmation'])->name('transactions.confirmation');
        Route::put('/{id}/reject', [TransactionController::class, 'reject'])->name('transactions.reject');
        Route::put('/{id}/finished', [TransactionController::class, 'finished'])->name('transactions.finished');
        Route::put('/{id}/extratime', [TransactionController::class, 'extratime'])->name('transactions.extratime');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/borrow', [ReportController::class, 'borrow'])->name('reports.borrow');
        Route::get('/return', [ReportController::class, 'return'])->name('reports.return');
        Route::get('/members', [ReportController::class, 'members'])->name('reports.members');
        Route::get('/officers', [ReportController::class, 'officers'])->name('reports.officers');
        Route::get('/penalties', [ReportController::class, 'penalties'])->name('reports.penalties');
        Route::get('/books', [ReportController::class, 'books'])->name('reports.books');
    });
});

Route::middleware(['auth', 'role:Anggota'])->group(function () {
    Route::prefix('catalog-books')->group(function () {
        Route::post('/', [CatalogController::class, 'store'])->name('catalog.store');
        Route::get('/{id}/process', [CatalogController::class, 'process'])->name('catalog.process');
        Route::get('/history', [CatalogController::class, 'history'])->name('catalog.history');
    });

    Route::view('user-profile', 'member-profile')->name('member.profile');

});

Route::prefix('penalties')->group(function () {
    Route::get('/{id}/transactions', [PenaltyController::class, 'create'])->name('penalties.create');
    Route::post('/', [PenaltyController::class, 'store'])->name('penalties.store');
    Route::get('/{id}/show', [PenaltyController::class, 'show'])->name('penalties.show');
});

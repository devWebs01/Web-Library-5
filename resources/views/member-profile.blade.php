<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;

state(['user' => fn() => Auth::user()]);

?>


<x-guest.layout>
    <x-slot name="title">Profile User</x-slot>
    @volt
        <div>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-3">
                        <!-- User Profile Section -->
                        <div class="card">
                            <!-- If user has a profile picture -->
                            <img src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed={{ Auth()->user()->name }}"
                                class="card-img-top rounded-circle mt-5" alt="Profile Picture" width="100" height="100">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->role }}</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <!-- Profile and Information -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title border-bottom">Profile Anggota Perpustakaan</h4>

                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>NIS/NIP</strong></div>
                                    <div class="col-md-7">{{ $user->identify }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>Nama</strong></div>
                                    <div class="col-md-7">{{ $user->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>Tanggal Lahir</strong></div>
                                    <div class="col-md-7">{{ Carbon::parse($user->birthdate)->format('d M Y') }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>Jenis Kelamin</strong></div>
                                    <div class="col-md-7">{{ $user->gender }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>Telepon</strong></div>
                                    <div class="col-md-7">{{ $user->telp }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5"><strong>Mendaftar Pada</strong></div>
                                    <div class="col-md-7">{{ $user->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-guest.layout>

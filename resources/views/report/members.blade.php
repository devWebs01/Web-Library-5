<x-auth.layout>
    <x-slot name="title">Laporan Anggota</x-slot>
    @include('layouts.report')
    <div class="card">
        <h4 class="card-header fw-bold">Laporan Anggota Perpustakaan</h4>
        <div class="card-body table-responsive">
            <table id="example" class="display table nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>name</th>
                        <th>email</th>
                        <th>telp</th>
                        <th>role</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $no => $item)
                        <tr>
                            <td>{{ ++$no }}.</td>
                            <td>{{ $item->identify }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->birthdate }}</td>
                            <td>{{ $item->gender }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth.layout>

<x-auth.layout>
    <x-slot name="title">Laporan Denda</x-slot>
    @include('layouts.report')
    <div class="card">
        <h4 class="card-header fw-bold">Laporan Denda</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Jumlah Denda</th>
                            <th>Keterangan</th>
                            <th>Status Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penalties as $no => $item)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $item->user->name }}</td>
                                <td>Rp. {{ $item->penalty_total }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>
                                    @if ($item->penalties->first())
                                        {{ $item->penalties->first()->status }}
                                    @else
                                        Belum dibayar
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth.layout>

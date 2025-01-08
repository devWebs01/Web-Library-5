@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <style>
        table.dataTable thead tr,
        table.dataTable thead th,
        table.dataTable tbody th,
        table.dataTable tbody td {
            text-align: center;
        }

        /* mode dark */
        /* .pagination .page-item.disabled .page-link {
                color: #fff;
                background-color: #323349;
            }

            .pagination .page-item .page-link:hover {
                color: #fff;
                background-color: #6c757d;
                border-color: #6c757d;
            } */

            
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
@endpush

@push('js')
    $('table.display').DataTable();
@endpush

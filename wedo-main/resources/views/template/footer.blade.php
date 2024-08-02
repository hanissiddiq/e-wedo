<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ url('') }}/asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('') }}/asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>




<!-- Bootstrap 4 -->
<script src="{{ url('') }}/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('') }}/asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('') }}/asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('') }}/asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('') }}/asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('') }}/asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('') }}/asset/plugins/moment/moment.min.js"></script>
<script src="{{ url('') }}/asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('') }}/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('') }}/asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('') }}/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('') }}/asset/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('') }}/asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('') }}/asset/dist/js/demo.js"></script>



{{-- datatable --}}
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js">
</script>
{{-- datatable --}}


<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js">
</script>





{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
<script src="{{ url('') }}/asset/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "columnDefs": [{
                "orderable": false,
                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. ', ''),
                "targets": [7, 8],
            }],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    title: 'Sistem Informasi Manajemen BPP',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'pdf',
                    title: 'Sistem Informasi Manajemen BPP',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'print',
                    title: 'Sistem Informasi Manajemen BPP',
                    className: 'btn btn-primary'
                }
            ]
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example3').DataTable();
    });
</script>




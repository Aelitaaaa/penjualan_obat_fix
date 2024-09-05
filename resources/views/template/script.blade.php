 <!-- Bootstrap core JavaScript-->
   <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.js')}}"></script>

    <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
   

    <!-- Page level plugins -->
    <script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('template/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('templatejs/demo/datatables-demo.js')}}"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
          
            // Reset nilai total harga
            $('#total_harga_obat').val('');
    
            // Jika jumlah sudah diisi, hitung total harga
            var jumlah = $('#jumlah_obat').val();
            if (jumlah) {
                var totalHarga = hargaObat * jumlah;
                $('#total_harga_obat').val(totalHarga);
            }
        });
    
        // Ketika jumlah obat diinput
        $('#jumlah_obat').on('input', function() {
            var hargaObat = $('#harga_obat').val();
            var jumlah = $(this).val();
    
            // Hitung total harga
            var totalHarga = hargaObat * jumlah;
            $('#total_harga_obat').val(totalHarga);
        });
    </script>

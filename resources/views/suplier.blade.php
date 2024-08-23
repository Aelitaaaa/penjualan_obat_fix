<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... other meta and link tags ... -->
    <title>Klimistri - Data Suplier</title>
    @include('template.head')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      
         <!-- Sidebar -->
         @include('template.sidebar')
        <!-- End of Sidebar -->
        
    <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
         <!-- Topbar Navbar -->
         @include('template.navbar')
        <!-- End of Topbar -->

                <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
<p class="mb-4"></a></p> 

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Suplier</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Faktur</th>
            <th>Nama Suplier</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Tanggal</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- ... Footer code ... -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- ... Logout Modal code ... -->

    @include('template.script')   
</body>

</html>
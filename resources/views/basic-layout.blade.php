<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

 
</head>
<body>
<!--container-scroller-->
  <div class="container-scroller">
    @yield('navbar')
    <div class="container-fluid page-body-wrapper">
        @yield('sidebar')
      <div class="main-panel">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        @yield('footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


   <!-- plugins:js -->
   <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}" async></script>
   <!-- endinject -->
 
   <!--dataTable.js-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
   <!--endDataTable.js-->
   
   <!-- Plugin js for this page-->
   <script src="{{ asset('') }}vendors/chart.js/Chart.min.js" async></script>
   <!-- End plugin js for this page-->
   <!-- inject:js -->
   <script src="{{ asset('js/off-canvas.js') }}" async></script>
   <script src="{{ asset('js/hoverable-collapse.js') }}" async></script>
   <script src="{{ asset('js/template.js') }}" async></script>
   <script src="{{ asset('js/todolist.js') }}" async></script>
   <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="{{ asset('js/dashboard.js') }}" defer></script>
   <!-- End custom js for this page-->
  <!-- Custom js for this page-->
  <script src="{{ asset('../../js/file-upload.js') }}"></script>
  <!-- End custom js for this page-->
   <script type="text/javascript">
    $('#example').DataTable( {
    } );

</script>
</body>

</html>


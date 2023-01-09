@include('admin.layout.header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <x-app-layout>
                                <!-- Dropdown - User Information -->

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="{{url('trashDoctor')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Go to Trash </a>
                    </div>

                    <!-- Content Row -->
                    <div class="row ms-15">
                        <div class="col-xl-12 col-md-12 mb-4 border-left-warning shadow h-100 py-2">
                            <table id="example" class="display" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Specilist</th>
                                        <th>Room No</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viewDoctor as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->doctor }}</td>
                                            <td>{{ $item->roomNo }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td class="w-0"> <img src="{{ 'storage/doctor/' . $item->image }}" />
                                            </td>
                                            <td><a class="btn btn-danger" href="{{ url('deleteDoctor', $item->id) }}">
                                                    Trash </td></a>
                                            <td><a class="btn btn-success" href="{{ url('updateDoctor', $item->id) }}"> Update
                                            </td></a>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Specilist</th>
                                        <th>Room No</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Update</th>

                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('admin.layout.script')

</body>

</html>
</x-app-layout>

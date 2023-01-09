
@include('admin.layout.header')

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
                    </button>hkb



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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row ms-15">
                        <div class="col-xl-8 col-md-8 mb-4 border-left-warning shadow h-100 py-2">
                            {!! Form::open([
                                'id' => 'addDoctor'
                                ]) !!}
                            <div class="mb-3">
                              <label for="name" class="form-label">Doctor Naame</label>
                              {!! Form::text('name', 'Enter Doctor Name',[
                                'id'=>"name",'class'=>"form-control"
                              ])!!}
                              {{-- <input type="text" class="form-control" id="name" > --}}

                            </div>
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="phone" class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="skin">Skin</option>
                                    <option value="heart">Heart</option>
                                    <option value="eye">Eye</option>
                                    <option value="nose">Nose</option>
                                  </select>
                              </div>

                            <div class="mb-3">
                                <label for="roomNo" class="form-label">Room No</label>
                                <input type="roomNo" class="form-control" id="roomNo">
                              </div>
                              <div class="mb-3">
                                <label for="image" class="form-label">Doctor Image</label>
                                <input type="file" class="form-control" id="image">
                              </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}

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

</html>    </x-app-layout>
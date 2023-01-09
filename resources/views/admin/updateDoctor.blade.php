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
                    </button>

                    <div class="d-sm-flex align-items-center justify-content-between mb-1">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                        </div>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Doctor</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row ms-15">
                        <div class="col-xl-8 col-md-8 mb-4 border-left-warning shadow h-100 py-2">
                         @if (session()->has('message'))
                         <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"  >x</button>
                            {{session()->get('message')}}
                         </div>

                         @endif
                            {!! Form::open([
                                'url'=> url('editDoctor',$updateDoctor->id),
                                'method'=> 'post',
                                'enctype'=> 'multipart/form-data',

                                ]) !!}
                            <div class="mb-3">
                                <label for="name" class="form-label">Doctor Name</label>
                                {!! Form::text('name', $updateDoctor->name, [
                                    'id' => 'name',
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                {!! Form::number('phone', $updateDoctor->phone, [
                                    'id' => 'phone',
                                    'class' => 'form-control',
                                ]) !!}

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Doctor Categories</label>
                                {!! Form::select(
                                    'doctor',
                                    [
                                        'skin' => 'Skin',
                                        'heart' => 'Heart',
                                        'eye' => 'Eye',
                                        'nose' => 'Nose',
                                    ],
                                    $updateDoctor->doctor,
                                    [
                                        'id' => 'roomNo',
                                        'class' => 'form-control',
                                    ],
                                ) !!}

                            </div>

                            <div class="mb-3">
                                <label for="roomNo" class="form-label">Room No</label>
                                {!! Form::number('roomNo', $updateDoctor->roomNo, [
                                    'id' => 'roomNo',
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Doctor Old Image</label>
                                <img height="100" width="100" src="{{ asset('storage/doctor/' . $updateDoctor->image) }}" />
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Doctor Image</label>
                                {!! Form::file('image', [
                                    'id' => 'image',
                                    'class' => 'form-control',
                                ]) !!}
                            </div>

                            <button type="submit" class="btn btn-primary submit" id="updateDoctor">Update</button>
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

</html>
</x-app-layout>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
   $(document).ready(function() {
        // show the alert
        setTimeout(function() {
            $(".alert").alert('close');
        }, 200);
    });
    </script>

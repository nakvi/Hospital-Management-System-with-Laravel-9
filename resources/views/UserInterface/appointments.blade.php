{{-- Main File Extend Here --}}
@extends('UserInterface.layout.main')
@section('main-container')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!-- Begin Page Content -->
    <div class="container ">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Appointment</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row ms-15">
            <div class="col-xl-12 col-md-12 mb-4 border-left-warning shadow h-100 py-2">
                <table id="example" class="display" style="width:100%">

                    <thead>
                        <tr>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Doctor Name</th>
                            <th>Status</th>
                            <th>Cancel Appointment</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointment as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->doctor }}</td>
                                @if ($item->status ='Canceled')
                                <td class="text-danger">{{ $item->status }}</td>
                                @else
                                <td class="text-success">{{ $item->status }}</td>
                                @endif


                                <td><a class="btn btn-danger" href="{{url('cancel_appointment',$item->id)}}"> Cancel </td></a>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Doctor Name</th>
                            <th>Status</th>
                            <th>Cancel Appointment</th>

                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>



    </div>
    <!-- /.container -->
@endsection

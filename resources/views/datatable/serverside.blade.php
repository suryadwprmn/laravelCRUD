@extends('layout.main')
@section('cssdatatable')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User (Client Side)</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table User</h3>

                  {{-- <div class="card-tools">
                            <form action="{{ route('admin.index') }}" method="GET">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request ->get('search') }}">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                    </form>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <button class="btn btn-primary mt-2 ml-2">
                        <a href="{{ route('admin.user.name') }}" class="text-dark"> Create</a>
                    </button>
                  <table class="table table-hover text-nowrap" id="tableUser">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('scriptdatatable')
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
        loadData();
    });

   function loadData(){
        $('#tableUser').DataTable({
            processing:true,
            pagination:true,
            responsinve:false,
            serverSide:true,
            seraching:true,
            ordering:false,
            ajax: "{{ route('admin.serverside') }}",
            columns:[
                {
                    data : 'no',
                    name: 'no',
                },
                {
                    data : 'photo',
                    name: 'photo',
                },
                {
                    data : 'nama',
                    name: 'nama',
                },
                {
                    data : 'email',
                    name: 'email',
                },
                {
                    data : 'action',
                    name: 'action',
                },
            ]
        });
    }
</script>
@endsection

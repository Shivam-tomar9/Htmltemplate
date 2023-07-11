@extends('admin.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h2> Category <a href="{{url('/')}}/category-add"><button class="btn btn-success">add
                                    </button></a></h2>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($data as $cat)
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->name}}</td>



                                        <td>
                                            <a href="{{url('/')}}/category-edit/{{$cat->id}}"> <button
                                                    class="btn btn-primary">Edit</button></a>
                                            <a href="{{url('/')}}/category-delete/{{$cat->id}}"><button
                                                    class="btn btn-danger">Delete
                                                </button></a>

                                        </td>


                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</section>




@endsection
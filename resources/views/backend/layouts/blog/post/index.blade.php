@extends('backend.layouts.app.app')
@section('backend-content')


			<!-- Header -->

                @include('backend.layouts.app.header')

			<!-- /Header -->

			<!-- Sidebar -->
                @include('backend.layouts.app.menu')
			<!-- /Sidebar -->

<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Posts</h4>
                        <br>
                        <a href="{{ route('show.postadd') }}" class="btn  btn-sm btn-success">Add New Post</a>

                        @if (session('success'))
                            <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Auth</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($alldata as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> user -> name }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($data -> category as $cats)
                                                        <li>{{ $cats -> name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($data -> tag as $tags)
                                                        <li>{{ $tags -> name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td><span class="badge badge-{{ ( $data -> status == 'Active') ? 'success' : 'danger' }}">{{ $data -> status }}</span></td>
                                            <td><a href="{{ route('show.poststatus' , $data -> id) }}" class="btn btn-sm btn-{{ ( $data -> status == 'Active' ) ? 'dark' : 'success' }}"> <i class="fa fa-{{ ($data -> status == 'Active') ?  'eye-slash' : 'eye' }} "></i> </a> <a href="{{ route('show.postedit' , $data -> id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> <a href="{{ route('show.postdelete' , $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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
</div>



@endsection

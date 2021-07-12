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
                        <a href="" class="btn  btn-sm btn-success">Add New Post</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Auth</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    {{-- Category Add Modal Start  --}}
    <div id="tag_add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4>Add New Tag</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" id="tag_add_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Tag Name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-sm btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Tag Add Modal End  --}}

    {{-- Tag Edit modal Start --}}

    <div id="tag_edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4>Edit Tag</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" id="tag_edit_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" placeholder="Tag Name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-sm btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Category Edit modal End --}}





@endsection

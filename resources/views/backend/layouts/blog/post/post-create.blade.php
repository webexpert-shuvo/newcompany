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
            <div class="col-xl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Add New Post </h4>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                        @endif

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Category</label>
                                <div class="col-lg-9">
                                    <select class="selectdata form-control" name="cats[]" multiple="multiple">

                                        @foreach ($cates as $cat)
                                            <option value="{{ $cat -> id }}">{{ $cat -> name }}</option>
                                        @endforeach


                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tag</label>
                                <div class="col-lg-9">
                                    <select class="selectdata form-control" name="tags[]" multiple="multiple">

                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
                                        @endforeach


                                      </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Featured Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="photo">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Content</label>
                                <div class="col-lg-9">
                                    <textarea name="content"></textarea>
                                </div>
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





@endsection

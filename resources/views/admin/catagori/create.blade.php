@extends('layouts.admin')
@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('status'))
                        <div class="alert alert-primary" role="alert">{{session('status')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Category Add</h4>
                            <p class="card-category">Create Category</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.category.create.post')}}" method="post" class="table table-bordered table-hover dataTable">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="name">Category Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Category Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

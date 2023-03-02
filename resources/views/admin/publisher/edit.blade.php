@extends('layouts.admin')
@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @if(session('status'))
                    <div class="alert alert-primary" role="alert">{{session('status')}} </div>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Publisher House Edit</h4>
                            <p class="card-category">{{$data[0]['name']}}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.publisher.edit.post',['id'=>$data[0]['id']])}}" method="post" class="table table-bordered table-hover dataTable">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="publisherHousephp ">Publisher House Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Publisher House Edit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

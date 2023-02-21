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
                            <h4 class="card-title">Writer Edit</h4>
                            <p class="card-category">{{$data[0]['name']}} Edit</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"
                                  action="{{route('admin.writer.edit.post',$data[0]['id'])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="name ">Edit Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$data[0]['name']}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="bio ">Edit Biographi</label>
                                            <textarea class="form-control" name="bio" cols="30"
                                                      rows="10">{{$data[0]['bio']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-control">
                                            <label class="bmd-label-floating" for="bio ">Edit Image : </label>
                                            <input type="file" name="image">
                                            <img src="{{asset($data[0]['image'])}}" style="width: 50px;height: 50px">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Edit Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

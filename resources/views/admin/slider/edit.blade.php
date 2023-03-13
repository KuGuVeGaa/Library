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
                            <h4 class="card-title">Slider Edit</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" class="table table-bordered table-hover dataTable"
                                  action="{{route('admin.slider.edit.post',$slider[0]['id'])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-control">
                                            <label class="bmd-label-floating" for="bio ">Edit Image : </label>
                                            <input type="file" name="image">
                                            <img src="{{asset($slider[0]['image'])}}" style="width: 50px;height: 50px">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Slider Edit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        var writer = document.getElementById('addWriter');
        writer.addEventListener('click', routing);

        function routing() {
            location.href = "{{route('admin.writer.create')}}";
        }
    </script>
@endsection

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
                            <h4 class="card-title">Slider Add</h4>
                            <p class="card-category">Create Slider</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{route('admin.slider.create.post')}}"
                                  method="post" class="table table-bordered table-hover dataTable">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-control">
                                            <label class="bmd-label-floating" for="bio ">Slider Image : </label>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Slider Add</button>
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

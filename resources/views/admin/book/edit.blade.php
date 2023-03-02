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
                            <h4 class="card-title">Book Edit</h4>
                            <p class="card-category">Edit Book</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" class="table table-bordered table-hover dataTable"
                                  action="{{route('admin.book.edit.post',['id'=>$data[0]]['id'])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="name ">Edit Book Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$data[0]['name']}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="writerId">Edit Book Writer</label>
                                        <select type="text" name="writerId" class="form-control">
                                            @foreach($writer as $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="categoryId">Edit Category</label>
                                        <select type="text" multiple class="chosen-select col-md-12" name="categoryId" class="form-control">
                                            @foreach($category as $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="publisherId">Edit Publisher</label>
                                        <select type="text" name="publisherId" class="form-control">
                                            @foreach($publisher as $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="description ">Edit
                                                Description</label>
                                            <textarea class="form-control" name="description" cols="30"
                                                      rows="10">{{$data[0]['Description']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                    <div class="col-md-4">
                                        <div>
                                            <label class="bmd-label-floating" for="image ">Edit Image : </label>
                                            <br>
                                            <img src="http://library.local/{{$data[0]['image']}}" alt="image"
                                                 style="width: 120px;height: 120px;">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="price">Edit Price</label>
                                            <input type="number" class="form-control" name="price"
                                                   value="{{$data[0]['Price']}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Edit Book</button>
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
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })

    </script>

@endsection




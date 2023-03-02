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
                            <h4 class="card-title">Book Add</h4>
                            <p class="card-category">Create Book</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{route('admin.book.create.post')}}" class="table table-bordered table-hover dataTable"
                                  method="post">
                                {{csrf_field()}}
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="name ">Book Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="writerId">Book Writer</label>
                                        <select type="text" name="writerId" class="form-control">
                                            @foreach($writers as $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="categoryId">Category</label><br>
                                        <select data-placeholder="Add Category..." multiple
                                                class="chosen-select col-md-12" name="categoryId" id="category">
                                            @foreach($category as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="publisherId">Publisher</label>
                                        <select type="text" name="publisherId" class="form-control">
                                            @foreach($publishers as $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="description ">Description</label>
                                            <textarea class="form-control" name="description" cols="30"
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                    <div class="col-md-4">
                                        <div>
                                            <label class="bmd-label-floating" for="image ">Book Image : </label>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="price">Price </label>
                                            <input type="number" class="form-control" name="price">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Book Add</button>
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




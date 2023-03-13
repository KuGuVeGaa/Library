@extends('layouts.admin')
@section('contents')
    <div class="content">
        <div class="container-fluid">
            @if(session('status'))
                <div class="alert alert-primary" role="alert">{{session('status')}} </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <button class="btn btn-success pull-right" id="addSlider">New Add Slider</button>
                            <h4 class="card-title ">Slider Table</h4>
                            <p class="card-category"> Here is a added Slider</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead class=" text-primary">
                                    <th class="text-primary">
                                        Preview
                                    </th>
                                    <th class="text-primary">
                                        Edit
                                    </th>
                                    <th class="text-primary">
                                        Delete
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $value)
                                        <tr>
                                            <td><img src="{{asset($value->image)}}" style="width: 120px;height: 120px" alt=image">
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route('admin.slider.edit',['id'=>$value['id']])}}">Edit</a>
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route('admin.slider.delete',['id'=>$value['id']])}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{$slider->links()}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var category = document.getElementById('addSlider');
        category.addEventListener('click', routing);

        function routing() {
            location.href = "{{route('admin.slider.create')}}";
        }
    </script>
@endsection

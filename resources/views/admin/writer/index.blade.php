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
                            <button class="btn btn-success pull-right" id="addWriter">Add</button>
                            <h4 class="card-title ">Writers Table</h4>
                            <p class="card-category"> Here is a Writers</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead class=" text-primary">
                                    <th class="text-primary">
                                        Name
                                    </th>
                                    <th class="text-primary">
                                        Edit
                                    </th>
                                    <th class="text-primary">
                                        Delete
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <td>
                                                {{$value['name']}}
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route('admin.writer.edit',['id'=>$value['id']])}}">Edit</a>
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route('admin.writer.delete',['id'=>$value['id']])}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{$data->links()}}
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
        var writer = document.getElementById('addWriter');
        writer.addEventListener('click', routing);

        function routing() {
            location.href = "{{route('admin.writer.create')}}";
        }
    </script>
@endsection


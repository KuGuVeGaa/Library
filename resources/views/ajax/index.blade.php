<html>
<head>
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
</head>
<body>
<table id="example" class="display nowrap" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
</table>
<input type="text" id="name" placeholder="Name">
<button id="get">Get</button>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
<script>
    $(document).ready(function (){
       $('#get').click(function (){
           var data = {
               '_token':"{{csrf_token()}}"
           }
            $.ajax({
                url:"{{route('ajax.post')}}",
                method:"POST",
                data: data,
                success:function (result){
                    console.log(result);
                }
            });
       });
    });
</script>
<script>
    $(document).ready(function () {
        var data = {
            '_token': '{{csrf_token()}}',
        }
        $('#example').DataTable({
            lenghtMenu:[[25,100,-1],[25,100,"All"]],
            processing:true,
            serverSide:true,
            ajax: {
                type:'POST',
                data:data,
                url:'{{route('getData')}}',
            },
            columns : [
                {data:'name',name:'name'},
                {data:'edit',name:'edit',orderable:false,searchable:false},
                {data:'delete',name:'delete',orderable:false,searchable:false},
            ]
        });
    });
</script>
</body>
</html>

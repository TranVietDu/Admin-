@extends('masterlayout.masteradmin')

@section('title', 'Students')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <h3 class="text-center">Students</h3>
        <div class="btn"><a style="color: white;" href="{{route('students.create')}}"><button class="btn btn-primary">Add Students</button></a></div>
        <button type="button" class="btn btn-danger" id="deleteall">Delete Selected </button>
        @if (session('thongbao'))
        <div class="alert alert-success hide">
            {{session('thongbao')}}
        </div>
        @endif
        <table border="4" class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th width="50px"><input type="checkbox" id="chkCheckAll"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($all as $al)
                <tr id="sid{{$al->id}}">
                    <td>{{$i++}}</td>
                    <td>{{$al->name}}</td>
                    <td>{{$al->age}}</td>
                    <td>
                        <form action="{{route('students.destroy',[$al->id])}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    <td><a href="{{route('students.edit',[$al->id])}}"><button class="btn btn-primary"><i style="color:white" class="fas fa-pencil-alt"></i></button></a></td>
                    <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$al->id}}"></td>
                    @endforeach
                </tr>
            </tbody>
        </table>

    </main>
</div>
<script>
    $(function(e) {
        $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });

        $("#deleteall").click(function(e) {
            e.preventDefault();
            var allids = [];
            $("input:checkbox[name=ids]:checked").each(function() {
                allids.push($(this).val());
            });
            $.ajax({
                url: "{{route('deleteallstudent')}}",
                type: 'get',
                data: {
                    ids: allids,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $.each(allids, function(key, val) {
                        $('#sid' + val).remove();
                    });
                }
            });
        });
    });
</script>
@endsection
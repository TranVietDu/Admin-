@extends('masterlayout.masteradmin')

@section('title', 'Class')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <h3 class="text-center">Class</h3>
        <div class="btn"><a style="color: white;" href="{{route('classs.create')}}"><button class="btn btn-primary">Add Class</button></a></div>
        <button type="button" class="btn btn-danger" id="deleteall">Delete Selected</button>
        @if (session('thongbao'))
        <div class="alert alert-success hide">
            {{session('thongbao')}}
        </div>
        @endif
        <table border="4" class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>NameClass</th>
                    <th>View Student</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th width="50px"><input type="checkbox" id="chkCheckAll"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1
                @endphp
                @foreach($all as $al)
                <tr id="sid{{$al->id}}">
                    <td scope="row">{{$i++}}</td>
                    <td>{{$al->nameclass}}</td>
                    <td><a href="{{route('classs.student',[$al->id])}}"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a></td>
                    <td>
                        <form action="{{route('classs.destroy',[$al->id])}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    <td><a href="{{route('classs.edit',[$al->id])}}"><button class="btn btn-primary"><i style="color:white" class="fas fa-pencil-alt"></i></button></a></td>
                    <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$al->id}}"></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
</div>
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
                url: "{{route('deleteallclass')}}",
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
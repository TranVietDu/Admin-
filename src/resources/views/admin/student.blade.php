@extends('masterlayout.masteradmin')

@section('title', 'Students')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <h3 class="text-center">Students</h3>
        <div class="btn"><button class="btn btn-primary"><a style="color: white;" href="{{route('students.create')}}">Add Students</a></button></div>
        <table border="4" class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($all as $al)
                <tr>
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
                    @endforeach
                </tr>
            </tbody>
        </table>
</div>
</main>
</div>
@endsection
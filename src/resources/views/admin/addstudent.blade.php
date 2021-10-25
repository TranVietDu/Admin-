@extends('masterlayout.masteradmin')

@section('title', 'AddStudents')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <h3>Add Student</h3>
        <form action="{{route('students.store')}}" method="post">
            @csrf
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name Student:</th>
                        <th><input type="text" name="name" id=""></th>
                    </tr>
                    <tr>
                        <th scope="row">Age:</th>
                        <td><input type="number" name="age" id=""></td>
                    </tr>
                </thead>
            </table>
            <ul class="alert text-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="btn btn-primary" type="submit">Add</button>
        </form>
</div>
</main>

</div>
@endsection
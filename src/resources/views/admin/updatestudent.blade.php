@extends('masterlayout.masteradmin')

@section('title', 'UpdateStudent')


@section('content')
<div id="layoutSidenav_content">
                <main>
                    <h3>Update Student</h3>
                    <form action="{{route('students.update',[$student->id])}}" method="post">
                    @csrf
                    {{method_field('put')}}
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name Student:</th>
                                    <th><input type="text" value="{{$student->name}}" name="name" id=""></th>
                                </tr>
                                <tr>
                                        <th scope="row">Age:</th>
                                        <td><input type="number" value="{{$student->age}}" name="age" id=""></td>
                                    </tr>
                                </thead>
                        </table>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
              </div>
            </main>
            
            </div>
 @endsection

@extends('masterlayout.masteradmin')

@section('title', 'ViewStudents')


@section('content')
<div id="layoutSidenav_content">
                <main>
                    <h3 class="text-center">Students In Class</h3>
                    <div class="btn"><button class="btn btn-primary"><a style="color: white;" href="{{route('students.create')}}">Add Students</a></button></div>
                  <table border="4" class="table">
                      <thead >
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Age</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($all as $al)
                          <tr>
                              <td scope="row">{{$al->id}}</td>
                              <td>{{$al->name}}</td>
                              <td>{{$al->age}}</td>
                            @endforeach
                          </tr>
                      </tbody>
                  </table>
              </div>
            </main>
            </div>
 @endsection

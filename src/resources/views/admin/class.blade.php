@extends('masterlayout.masteradmin')

@section('title', 'Class')


@section('content')
<div id="layoutSidenav_content">
                <main>
                    <h3 class="text-center">Class</h3>
                    <div class="btn"><button class="btn btn-primary"><a style="color: white;" href="{{route('classs.create')}}">Add Class</a></button></div>
                  <table border="4" class="table">
                      <thead >
                          <tr>
                              <th>STT</th>
                              <th>NameClass</th>
                              <th>View Student</th>
                              <th>Delete</th>
                              <th>Edit</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php 
                           $i=1
                           @endphp
                          @foreach($all as $al)
                          <tr>
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
                            @endforeach
                          </tr>
                      </tbody>
                  </table>
              </div>
            </main>
            </div>
 @endsection

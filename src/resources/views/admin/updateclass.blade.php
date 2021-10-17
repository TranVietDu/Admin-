@extends('masterlayout.masteradmin')

@section('title', 'UpdateClass')


@section('content')
<div id="layoutSidenav_content">
                <main>
                    <h3>Update Class</h3>
                    <form action="{{route('classs.update',[$classs->id])}}" method="post">
                    @csrf
                    {{method_field('put')}}
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name Class:</th>
                                    <th><input type="text" value="{{$classs->nameclass}}" name="nameclass" id=""></th>
                                </tr>
                                </thead>
                        </table>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
              </div>
            </main>
            
            </div>
 @endsection

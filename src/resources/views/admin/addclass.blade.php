@extends('masterlayout.masteradmin')

@section('title', 'Add Class')


@section('content')
<div id="layoutSidenav_content">
                <main>
                    <h3>Add Class</h3>
                    <form action="{{route('classs.store')}}" method="post">
                        @csrf
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name Class:</th>
                                    <th><input type="text" name="nameclass" id=""></th>
                                </tr>
                                </thead>
                        </table>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
              </div>
            </main>
            
            </div>
 @endsection

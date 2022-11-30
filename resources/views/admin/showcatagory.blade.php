@extends('layouts.deshboard')
@section('contain')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
               <div class="card-header">
                <h4> Catagory List</h4>
               </div>
               <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catagory as $catagory )


                        <tr>
                            <td>{{$catagory->catagory_name  }}</td>
                            <td><img src="{{ asset('uploads/catagory/') }}/{{$catagory->catagory_image}}" alt=""></td>
                            <td> <a  class="btn btn-success" href="{{ route('edit_catagory',$catagory->id) }}">Edit</a> </td>
                            <td> <a href="{{ route('delete_catagory',$catagory->id) }}" class="btn btn-danger">delete</a> </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
               </div>
            </div>
        </div>
    </div>
</div>





















@endsection

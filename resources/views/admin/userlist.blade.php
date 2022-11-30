@extends('layouts.deshboard')

@section('contain')

<div class="table table-striped">




                    <h4>User List</h4>
                    <table>

                 <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                </tr>





                    @foreach ($user as $sl=> $user )


                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset('uploads/user/') }}/{{ $user->image }}" alt=""></td>
                </tr>


                @endforeach
            </table>











@endsection

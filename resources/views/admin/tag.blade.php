@
@extends('layouts.deshboard')





@section('contain')

<div class="container-flud">
    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                @if('tag')

                  <span class="text-danger"> {{ session('tag') }}</span>

                @endif
                <div class="card-header">
                    <h4> tag add</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tag_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <label for="name">Tag</label>
                    <input type="text"  name="tag_name" class="form-control mb-3" id="">

                    <button type="submit" class="btn btn-primary"> add tag</button>
                </form>
                </div>
            </div>
        </div>



        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4> tag show</h4>
                </div>
                <div class="card-body">
                   <table>
                    <thead>
                        <tr>
                        <th>SL</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $sl=> $user )


                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $user->tag_name }}</td>
                            <td> <a href="{{ route('delete_tag', $user->id) }}">delete</a> </td>
                        </tr>
                        @endforeach
                    </tbody>

                    </table>


                </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

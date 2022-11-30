@
@extends('layouts.deshboard')
@section('contain')

<div class="container-flud">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>catagory add</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <label for="name">name</label>
                    <input type="text"  name="catagory_name" class="form-control mb-3" id="">
                    <label for="name">Image</label>
                    <input type="file" name="catagory_image" class="form-control mb-3" id="">
                    <button type="submit" class="btn btn-primary"> add catagory</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

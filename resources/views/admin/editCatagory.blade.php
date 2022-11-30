@extends('layouts.deshboard')



@section('contain')



<div class="container-flud">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4> Update catagory</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_catagory') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <label for="name">name</label>

                    <input type="hidden"  name="catagory_id" value="{{ $edit->id }}">
                    <input type="text"  name="cata_name" value="{{ $edit->catagory_name}}" class="form-control mb-3" id="">
                    <label for="name">Image</label>
                    <input type="file" name="catagory_image" class="form-control mb-3" id="">
                    <div class="div">
                        <img src="{{ asset('uploads/catagory/') }}/{{$edit->catagory_image}}" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary"> update catagory</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>












@endsection

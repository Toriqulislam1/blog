@extends('layouts.deshboard')
@section('contain')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <form action="{{ route('multi_del_cat') }}" method="post">
                @csrf
            <div class="card">
               <div class="card-header">
                <h4> Catagory List</h4>
               </div>
               <div>
                <button type="submit" class="btn btn-danger">delete check</button>
               </div>
               <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input   type="checkbox" name="" id="checkAll">Check All</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catagory as $catagory )


                        <tr>

                            <td> <input type="checkbox" name="check[]" id="" value="{{ $catagory->id }}"></td>
                            <td>{{$catagory->catagory_name  }}</td>
                            <td><img src="{{ asset('uploads/catagory/') }}/{{$catagory->catagory_image}}" alt=""></td>
                            <td>
                                <a  class="btn btn-success" href="{{ route('edit_catagory',$catagory->id) }}">Edit</a>
                                <a href="{{ route('delete_catagory',$catagory->id) }}" class="btn btn-danger">delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
               </div>
            </div>
                </form>
        </div>
    </div>
</div>


@section('footer_script')
<script>



$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});




</script>
@endsection()


















@endsection

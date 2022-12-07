@extends('layouts.deshboard')

@section('contain')

<div class="table table-striped">


                    @if(session('userdelete'))

                    <strong class="text-success">{{ session('userdelete') }}</strong>

                    @endif

                    <form action="{{ route('check_delete') }}" method="POST">
                        @csrf
                    <div>
                         <h4>User List <span>total:{{ $total }}</span></h4>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger" >Delete check</button>

                    </div>

                    <table>

                 <tr>
                    <th> <input type="checkbox"  id="checkAll" > check all</th>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>





                    @foreach ($user as $sl=> $user )


                <tr>
                    <td> <input type="checkbox" name="check[]" id="" value="{{ $user->id }}"></td>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset('uploads/user/') }}/{{ $user->image }}" alt=""></td>
                    <td> <a class="btn btn-danger" href="{{ route('user_delete',$user->id) }}"> delete </a> </td>
                </tr>


                @endforeach
            </table>
        </form>

@endsection


@section('footer_script')
<script>



$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});




</script>
@endsection()

@extends('layouts.deshboard')

@section('contain')

{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4> add permission</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission') }}" method="POST" >
                        @csrf
                    <label for="name">name</label>
                    <input type="text"  name="permission_name"class="form-control mb-3" id="">

                    <button type="submit" class="btn btn-primary"> add permission</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4> Add role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('role_store') }}" method="POST" >
                        @csrf
                        <div class="div">
                    <label for="name">Role name</label>
                    <input type="text"  name="role_name"class="form-control mb-3" placeholder="role name">
                         </div>
                         @foreach ($permi as $permision)


                            <div class="form-group">
                                <div class="form-check">
                                    <label for="permision">
                                    <input type="checkbox" name="perm[]" value="   {{ $permision->id }}" class="form-check-input" id="">
                                    {{ $permision->name }}
                                    <i class="input-frame"></i></label>
                                </div>
                         </div>
                         @endforeach
                    <button type="submit" class="btn btn-primary"> Add role</button>
                </form>
                </div>
            </div>
        </div>

         <div class="col-lg-8 ">
                    <div class="card">
                       <div class="card-header">
                        <h4> Role List</h4>
                       </div>
                       <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permi as $permi )


                                <tr>
                                    <td>{{$permi->name  }}</td>
                                    <td>
                                        @foreach ($permi->getAllPermissions() as $permi)
                                        <span class="badge badge-info">{{ $permi->name }}</span>
                                        @endforeach


                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                       </div>
                    </div>



                    {{-- <div class="card">
                       <div class="card-header">
                        <h4> Assign role</h4>
                       </div>
                       <div class="card-body">
                        <form action="">
                            @csrf
                            <div class="mt-3">
                                <select name="user_id" class="form-control" id="">

                                    <option value=""> select </option>
                                    @foreach ($user as $user )
                                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                    @endforeach


                                </select>

                            </div>
                            <div class="mt-3">
                                <select name="role_id" class="form-control" id="">

                                    <option value=""> select </option>
                                    @foreach ($aa as $data )

                                    <option value="{{ $data->id }}"> {{ $data->name }} </option>

                                    @endforeach


                                </select> --}}
                                {{-- <button type="submit" class="btn btn-primary"> Add assgin</button> --}}

                            {{-- </div> --}}
                        </form>

                            </tbody>

                        </table>
                       </div>
                    </div>
                </div>
            </div>

        </div>


@endsection







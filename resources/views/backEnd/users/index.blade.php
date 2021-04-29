@extends('backEnd.temps.app')
@section('title')
Dashboard-members
@stop

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Total Users ( {{ count($data) }} )
                        </h6>
                        
                            <div class="table-responsive m-t-40">
                            {!!  Form::Open(['method'=>'get']) !!}
                                <input type="text" name="search" class="form-control col-6" style="margin-bottom: 5px" placeholder="Search"
                                 value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
                                <span>
                                    <i class="fa fa-search" style="position: absolute;margin-top:-30px;right:51%"></i>
                                </span>

                            {!! Form::Close() !!}
                           
                                @if(isset($errors))
                                    @foreach($errors->all() as $err)
                                    <strong><i class="fa fa-times-circle" aria-hidden="true"></i> {{ $err }}</strong>
                                    @endforeach 
                                @endif


                                @if(Session::has('k'))
                                    <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ Session::get('k') }} </div>
                                @elseif(Session::has('err'))
                                    <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('err') }}  </div>
                                @endif


                                <table class="table table-bordered" style="text-align: center;">
                                    <thead style="background-color: #f4f4f4">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Created AT</th>
                                            <th scope="col">Updated AT</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) == 0)
                                        <tr>
                                            <td colspan="5">no data Found.</td>
                                        </tr>
                                    @endif
                                    @foreach($data as $key => $user)
                                        <tr>
                                            <td scope="col">{{ ++$key }}</td>
                                            <td scope="col">
                                            @if($user->role > 0)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            @endif
                                              {{ $user->fName }}  {{ $user->lName }} 
                                            </td>
                                            <td scope="col">{{ $user->email }}</td>
                                            <td scope="col">{{ explode(" ",$user->created_at)[0] }}</td>
                                            <td scope="col">{{ explode(" ",$user->updated_at)[0] }}</td>
                                            <td scope="col">
                                            {!! Form::Open(['url'=>'admin/catigories/destroy/'.$user->id]) !!}
                                                <a href="{{ url('admin/users/edit/'.$user->id) }}" class="btn btn-success" >
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </a>
                                                <button  class="btn btn-danger confirm" >
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            {!! Form::Close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>          
                 </div>
            </div>

        </div>
    </div>
</div>


@stop 
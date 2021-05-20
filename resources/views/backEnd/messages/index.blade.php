@extends('backEnd.temps.app')

@section('title')
    Dashboard-Messages
@stop 

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Total Messages ( {{ count($data) }} )
                        
                        </h6>
                        
                            <div class="table-responsive m-t-40">
                           
                           
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
                                            <th scope="col">Name</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) == 0)
                                        <tr>
                                            <td colspan="5">no data Found.</td>
                                        </tr>
                                    @endif
                                    @foreach($data as $key => $mesg)
                                        @if($mesg->seen == 0)
                                        <tr class="bg-warning">
                                        @else
                                        <tr>
                                        @endif
                                            <td scope="col">{{ ++$key }}</td>
                                            <td scope="col">{{ App\User::getName($mesg->userID) }}</td>
                                            <td scope="col">{{ App\User::getEmail($mesg->userID) }}</td>
                                            <td scope="col">{{ explode(" ",$mesg->updated_at)[0] }}</td>
                                            <td scope="col">
                                            {!! Form::Open(['url'=>'admin/messages/destroy/'.$mesg->id]) !!}
                                                <a href="{{ url('admin/messages/show/'.$mesg->id) }}" class="btn btn-primary" >
                                                   <i class="fa fa-eye" aria-hidden="true"></i> show
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
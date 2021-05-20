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
                        <h5 class="card-title"> <strong> From: </strong> {{ App\User::getName($data->userID) }}</h5>
                        <h6 class="card-title"> <strong> Email: </strong> {{ App\User::getEmail($data->userID) }}</h6>
                        <h6 class="card-title"> <strong> Date: </strong> {{ explode(" ",$data->created_at)[0]  }} 
                            at  {{ date('h:i A',strtotime(explode(" ", $data->created_at)[1])) }} </h6>
                        <p class="card-text"> <strong>Message : </strong> <br>
                            {{ $data->content }}
                        </p>

                        {!! Form::Open(['url'=>'admin/messages/destroy/'.$data->id]) !!}
                            <button  class="btn btn-danger confirm" >
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </button>
                        {!! Form::Close() !!}
                            
                    </div>          
                </div>
            </div>

        </div>
    </div>
</div>


@stop 
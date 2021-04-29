@extends('backEnd.temps.app')

@section('title')
    Dashboard-Articals
@stop 

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Total Articals ( {{ count($data) }} )
                        <a href="{{ url('admin/articals/add') }}" class="btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle"></i> Add New Artical</a>
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


                                <hr>
                                <div class="articals">
                                    <div class="row mx-0">

                                    @if(count($data) == 0 )
                                    <h6 class="col-12 text-center">No data found.</h6>
                                    @endif

                                    @foreach($data as $artical)
                                        <div class="card col-lg-3 col-md-4" style="width: 18rem;">
                                        {!! Form::Open(['url'=> 'admin/articals/destroy/'.$artical->id]) !!}
                                            <img src="{{url($artical->img)}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h3 class="font-weight-bold">{{ $artical->name }}</h3>
                                                <p class="card-text">{{ $artical->description }}</p>
                                                <small><span class="pull-right">{{ explode(" ",$artical->created_at)[0] }}</span></small>
                                            </div>
                                            <div class="links">
                                                <a title="Edit" class="btn btn-success" href="{{url('admin/articals/edit/'.$artical->id ) }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a title="View" class="btn btn-primary" href="{{url('admin/articals/edit/'.$artical->id ) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <button title="Delete" class="confirm btn btn-danger">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        {!! Form::Close() !!}
                                        </div>
                                    @endforeach
                                        
                                    </div>
                                </div>

                            </div>
                        </div>          
                 </div>
            </div>

        </div>
    </div>
</div>


@stop 
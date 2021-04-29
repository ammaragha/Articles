@extends('backEnd.temps.app')

@section('title')
    Dashboard-Catigories
@stop 

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Total Catigories ( {{ count($data) }} )
                        <a href="{{ url('admin/catigories/add') }}" class="btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle"></i> Add New Catigory</a>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
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
                                    @foreach($data as $key => $cat)
                                        <tr>
                                            <td scope="col">{{ ++$key }}</td>
                                            <td scope="col">{{ $cat->name }}</td>
                                            <td scope="col">{{ $cat->description }}</td>
                                            <td scope="col">{{ explode(" ",$cat->updated_at)[0] }}</td>
                                            <td scope="col">
                                            {!! Form::Open(['url'=>'admin/catigories/destroy/'.$cat->id]) !!}
                                                <a href="{{ url('admin/catigories/edit/'.$cat->id) }}" class="btn btn-success" >
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
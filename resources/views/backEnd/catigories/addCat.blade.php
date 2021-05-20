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
                        <h1 class="text-center">Add new Catigory</h1>

                        @if(isset($errors))
                            @foreach($errors->all() as $err)
                            <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ $err }}</div>
                            @endforeach 
                        @endif

                        @if(Session::has('k'))
                            <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ Session::get('k') }} </div>
                        @elseif(Session::has('err'))
                            <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('err') }}  </div>
                        @endif
                        

                        {!! Form::open() !!}
                        <fieldset class="col-lg-6 col-md-12 offset-lg-3 ">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Catigory name</label>
                                <input type="text" class="form-control" name="catName" id="catName" pattern=".{2,20}" title="2~20 char only" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort</label>
                                <input type="number" min="0" class="form-control" name="catSort" id="catName" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea  type="text" class="form-control" name="catDesc"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="{{ url('admin/catigories') }}">back</a>
                        </fieldset>
                        {!! Form::close() !!}
                        
                            
                    </div>          
                </div>
            </div>

        </div>
    </div>
</div>


@stop 
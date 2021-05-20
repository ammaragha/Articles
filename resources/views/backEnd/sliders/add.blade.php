@extends('backEnd.temps.app')

@section('title')
    Dashboard-add slider
@stop 

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Add new Slider</h1>

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
                        

                        {!! Form::open(['files' => true]) !!}
                        <fieldset class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Slider title</label>
                                    <input type="text" class="form-control live" name="title" id=""
                                     pattern=".{2,20}" title="2~20 char only" required
                                     data-class="artical-name">
                                </div>

                                <div class="form-group">
                                    <label for="">content</label>
                                    <textarea  type="text" class="form-control live" data-class="artical-desc" name="content" required></textarea>
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputEmail1">Sort</label>
                                    <input type="number" min="1" class="form-control" name="sort" value="0" >
                                </div>
                                <div class="form-group">
                                    <label for="">image</label>
                                    <input type="file" min="0" class="form-control" name="image" 
                                    accept="image/*" onchange="loadFile(event)"  required="">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 pl-5 pt-2">
                                <div class="card" style="width: 18rem;">
                                    <img id="output" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <strong><h5 class="font-weight-bold artical-name">title</h5></strong>
                                        <p class="card-text artical-desc    ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger" href="{{ url('admin/slider') }}">back</a>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                        
                            
                    </div>          
                </div>
            </div>

        </div>
    </div>
</div>


@stop 
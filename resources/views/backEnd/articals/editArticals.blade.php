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
                        <h1 class="text-center">Edit Artical</h1>

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
                                    <label for="">Artical name</label>
                                    <input type="text" class="form-control live" name="artName" id="catName"
                                     pattern=".{2,20}" title="2~20 char only" required
                                     data-class="artical-name">
                                </div>
                                <div class="form-group">
                                    <label for="">Catigory</label>
                                    <select class="form-control" name="catID" required>
                                    <option value="">--</option>
                                    @if(isset($cats))
                                        @foreach($cats as $cat)
                                            <option value="{{ $cat->id }}" 
                                            @if($data->catID == $cat->id)selected @endif >{{ $cat->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea  type="text" class="form-control live" data-class="artical-desc" name="artDesc" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Artical content</label>
                                    <textarea  type="text" class="form-control live" data-class="artical-content" name="artContent" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">image</label>
                                    <input type="file" min="0" class="form-control" name="artImage" 
                                    accept="image/*" onchange="loadFile(event)" value="" >
                                </div>
                            </div>

                            <!-- preview of articals -->
                            <div class="col-lg-6 col-md-12 pl-5 pt-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{url($data->img)}}" id="output" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <strong><h5 class="font-weight-bold artical-name">{{ $data->name }}</h5></strong>
                                        <p class="card-text artical-desc    ">{{ $data->description }}</p>
                                    </div>
                                </div>
                                <hr>
                                <h5>content</h5>
                                <p class="artical-content">{{ $data->content }}</p>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger" href="{{ url('admin/articals') }}">back</a>
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
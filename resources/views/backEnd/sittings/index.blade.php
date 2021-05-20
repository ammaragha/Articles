@extends('backEnd.temps.app')

@section('title')
    Dashboard-sittings
@stop 

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Change your Site sittings</h1>

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
                        <fieldset class="col-lg-4 col-md-12 ">
                        @if(isset($slugs))
                            @foreach($slugs as $key => $slug)
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ $slug['slugName'] }}</label>
                                <input type="hidden" name="{{ $slug['slugName'] }}" value="{{ $slug['id'] }}">
                                @if($slug['slugName'] == 'About')
                                <textarea  type="text" class="form-control" name="content{{ $slug['id'] }}" >{{ $slug['content'] }}</textarea>
                                @else
                                <input type="text" class="form-control" name="content{{ $slug['id'] }}" id="catName" pattern="" title="" value="{{ $slug['content'] }}" >
                                @endif
                            </div>
                            @endforeach
                        @endif  
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                        {!! Form::close() !!}
                        
                            
                    </div>          
                </div>
            </div>

        </div>
    </div>
</div>


@stop 
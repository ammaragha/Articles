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

                            <div class="table-responsive m-t-40">
                                <h1 class="text-center">Edit {{ $data->fName }} Info</h1>
 
                           
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



                                {!! Form::Open() !!}
                                    <div class="row mx-0">
                                        <fieldset class="col-lg-6 col-md-12 ">
                                            <div class="form-group">
                                                <label >First name</label>
                                                <input type="text" class="form-control" name="fName" value="{{ $data->fName }}" pattern=".{2,20}" title="2~20 char only" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Last name</label>
                                                <input type="text" class="form-control" name="lName" value="{{ $data->lName }}" pattern=".{2,20}" title="2~20 char only" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input  type="email" class="form-control" name="email" value="{{ $data->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label >New password</label>
                                                <input  type="password" class="form-control" name="password" >
                                            </div>
                                            
                                            @if(Auth::user()->role ==9)
                                                @if($data->role < 9)
                                                    <div class="form-group">
                                                        <hr>
                                                            <div class="form-check form-check-inline ">
                                                                <input class="form-check-input role confirm" type="radio" name="role" id="admin" value="1" >
                                                                <label class="form-check-label" for="admin">admin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input role confirm" type="radio" name="role" id="moderator" value="2">
                                                                <label class="form-check-label" for="moderator">moderator</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input role" type="radio" name="role" id="supervisor" value="3">
                                                                <label class="form-check-label" for="supervisor">supervisor</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input role" type="radio" name="role" id="manger" value="4">
                                                                <label class="form-check-label" for="manger">manger</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input role" type="radio" name="role" id="inlineRadio3" value="option3" disabled>
                                                                <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                                                            </div>
                                                        <hr>

                                                    </div>
                                                @endif
                                            @endif


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-danger" href="{{ url('admin/users') }}">back</a>
                                        </fieldset>

                                        <div class="col-lg-6 col-md-12 row">
                                                <div class="mt-4 offset-3 col-6 roleDesc">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum sequi tempore exercitationem, enim rerum minima animi fugit similique saepe temporibus ratione incidunt autem culpa? Laboriosam, asperiores id! Fuga, vitae error.
                                                </div>
                                        </div>
                        
                                    </div>
                                {!! Form::close() !!}


                                
                            </div>
                        </div>          
                 </div>
            </div>

        </div>
    </div>
</div>


@stop 
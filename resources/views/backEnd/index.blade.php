@extends('backEnd.temps.app')

@section('title')
    Dashboard
@stop 


@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Welcome</h1>
                <div class="row">

                    <div class="tab col-md-6 col-lg-3">
                        <a href="{{  url('admin/users') }}" class="info">
                            <i class="col-5 fa fa-users" aria-hidden="true"></i>
                            <div class="col-7">
                                members
                                <span>(1598)</span>
                            </div> 
                        </a>
                    </div>
                    <!-- ------------------------------------------------- -->
                    <div class="tab col-md-6 col-lg-3">
                        <a href="{{ url('admin/catigories') }}" class="info">
                            <i class="col-5 fa fa-database" aria-hidden="true"></i>
                            <div class="col-7">
                                catigories
                                <span>({{ count($cats) }})</span>
                            </div> 
                        </a>
                    </div>
                    <!-- ------------------------------------------------- -->
                    <div class="tab col-md-6 col-lg-3">
                        <a href="{{ url('admin/articals') }}" class="info">
                            <i class="col-5 fa fa-calendar-o" aria-hidden="true"></i>
                            <div class="col-7">
                                articals
                                <span>({{ count($arts) }})</span>
                            </div> 
                        </a>
                    </div>
                    <!-- ------------------------------------------------- -->
                    <div class="tab col-md-6 col-lg-3">
                        <a href="{{ url('table/comments') }}"" class="info">
                            <i class="col-5 fa fa-comments-o" aria-hidden="true"></i>
                            <div class="col-7">
                                comments
                                <span>(1598)</span>
                            </div> 
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop 
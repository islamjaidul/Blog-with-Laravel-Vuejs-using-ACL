@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a post</div>

                   @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{route('post_create.post')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-sm-10 col-sm-offset-1">

                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <div class="col-sm-10 col-md-offset-1">
                                        <input type="text" class="form-control" name="title" placeholder="Enter post title">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <!--Body-->
                                <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    <div class="col-sm-10 col-md-offset-1">
                                        <textarea rows="10" type="text" class="form-control" name="body" placeholder="Enter post description"></textarea>
                                        @if ($errors->has('body'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div><!--/Body-->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary center-block">Create Post</button>
                                </div>

                            </div> <!--/col-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
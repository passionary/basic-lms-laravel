@extends('layouts.sidebar')
@section('css')
    <link rel="stylesheet" href="{{asset('css/quizzes/create.css')}}">
@endsection
@section('content')
    @if(Session::has('failed-quiz-time-gap'))
        <div class="alert alert-warning">
            <p>@lang('module.errors.error-quiz-time-gap')</p>
        </div>
    @endif
    @if(Session::has('failed-quiz-time'))
        <div class="alert alert-danger">
            <p>@lang('module.errors.error-quiz-duration')</p>
        </div>
    @endif
    @if(Session::has('failed'))
        <div class="alert alert-danger">
            <p>{{Session::get('failed')}}</p>
        </div>
    @endif
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
          rel="stylesheet">
    <h3 class="page-title">@lang('module.quizzes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' =>['quizzes.store']]) !!}
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('module.create')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('selected_course',trans('module.quizzes.course-title'), ['class' =>'control-label']) !!}
                    <select class="form-control" name="course_title" required>
                        @foreach($courses as $course)
                            <option value="{{encrypt($course->id)}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_title'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('course_title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title',trans('module.quizzes.fields.quiz'),['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['required','class' => 'form-control ','placeholder' => '']) !!}
                    @if($errors->has('title'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description',trans('module.description'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['required','class' => 'form-control ','resize' => 'none','rows' => '6']) !!}
                    @if($errors->has('description'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{ Form::checkbox('solve_many',1,null, ['class' => 'field','id' => 'solve_many']) }}
                    {!! Form::label('solve_many',trans('module.judge_options.quiz-options.solve_many'), ['class' => 'control-label']) !!}
                    @if($errors->has('solve_many'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('solve_many') }}
                        </p>
                    @endif
                    <br>
                    {{ Form::checkbox('share_results',1,null, ['class' => 'field','id' => 'share_results']) }}
                    {!! Form::label('share_results',trans('module.judge_options.quiz-options.share_results'), ['class' => 'control-label']) !!}
                    @if($errors->has('share_results'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('share_results') }}
                        </p>
                    @endif
                    <br>
                    {{ Form::checkbox('results_details_w_respect_t_time',1,null, ['class' => 'field','id' => 'results_details_w_respect_t_time']) }}
                    {!! Form::label('results_details_w_respect_t_time',trans('module.judge_options.quiz-options.results_details_w_respect_t_time'), ['class' => 'control-label']) !!}
                    @if($errors->has('results_details_w_respect_t_time'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('results_details_w_respect_t_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('duration',trans('module.quizzes.fields.duration'), ['class' => 'control-label']) !!}
                    <div class='input-group time timepicker'>
                        {!! Form::text('duration', old('duration'), ['class' => 'form-control ','placeholder' => '','type' => 'text']) !!}
                        <span class="input-group-addon">
           <i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        </span>
                        @if($errors->has('duration'))
                            <p class="help-block alert-danger">
                                {{ $errors->first('duration') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            {!! Form::label('start_date',trans('module.quizzes.fields.start-date'), ['class' => 'control-label']) !!}
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class='input-group date' id='datetimepicker3'>
                        {!! Form::input('text','start_date', old('start_date'), ['class' => 'form-control ', 'placeholder' => '','type' => 'text']) !!}
                        <span class="input-group-addon">
           <i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </span>
                    </div>

                    @if($errors->has('start_date'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('start_date') }}
                        </p>
                    @endif
                </div>
            </div>
            {!! Form::label('end_date',trans('module.quizzes.fields.end-date'), ['class' => 'control-label']) !!}
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class='input-group date' id='datetimepicker4'>
                        {!! Form::input('text','end_date', old('end_date'), ['class' => 'form-control ', 'placeholder' => '','type' => 'text']) !!}
                        <span class="input-group-addon">
            <i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </span>
                    </div>

                    @if($errors->has('end_date'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('end_date') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit(trans('module.save'), ['class' => 'btn btn-danger' , 'onmouseover' => 'assign_date()']) !!}
    {{ Form::reset(trans('module.reset'), ['class' => 'btn btn-primary' ,'data-value' => 'shake']) }}
    {!! Form::close() !!}

@endsection
@section('javascript')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/quiz/create.js')}}"></script>
@endsection
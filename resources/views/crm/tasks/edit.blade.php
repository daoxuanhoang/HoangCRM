@extends('layouts.base')

@section('caption', 'Sửa nhiệm vụ')

@section('title', 'Sửa nhiệm vụ')

@section('lyric', 'lorem ipsum')

@section('content')
    <!-- will be used to show any messages -->
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            <strong>Well done!</strong> {{ session()->get('message_success') }}
        </div>
    @elseif(session()->has('message_danger'))
        <div class="alert alert-danger">
            <strong>Danger!</strong> {{ session()->get('message_danger') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::model($task, ['route' => ['processUpdateTask', $task->id], 'method' => 'PUT']) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Tên') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('duration', 'Thời lượng') }}
                                {{ Form::text('duration', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('employee_id', 'Nhân viên được chỉ định') }}
                                {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')])  }}
                            </div>
                        </div>

                        <div class="col-lg-12">
                            {{ Form::submit('Sửa nhiệm vụ', ['class' => 'btn btn-primary']) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>


@endsection
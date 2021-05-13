@extends('layouts.base')

@section('caption', 'Sửa nhân viên')

@section('title', 'Sửa nhân viên')

@section('lyric', 'lorem ipsum')

@section('content')
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
                            {{ Form::model($employee, ['route' => ['processUpdateEmployee', $employee->id], 'method' => 'PUT']) }}

                            <div class="form-group">
                                {{ Form::label('full_name', 'Tên') }}
                                {{ Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('client_id', 'Khách hàng được chỉ định') }}
                                {{ Form::select('client_id', $clients, null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')])  }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('phone', 'Điện thoại') }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('job', 'Công việc') }}
                                {{ Form::text('job', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('note', 'Sổ tay') }}
                                {{ Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                        </div>

                        <div class="col-lg-12">
                            {{ Form::submit('Sửa nhân viên', ['class' => 'btn btn-primary']) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
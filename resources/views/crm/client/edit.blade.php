@extends('layouts.base')

@section('caption', 'Sửa khách hàng')

@section('title', 'Sửa khách hàng')

@section('lyric', '')

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
                            {{ Form::model($clientDetails, ['route' => ['processUpdateClient', $clientDetails->id], 'method' => 'PUT']) }}
                            <div class="form-group  input-row">
                                {{ Form::label('full_name', 'Tên') }}
                                {{ Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('phone', 'Điện thoại') }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('budget', 'Ngân sách') }}
                                {{ Form::text('budget', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('location', 'Vị trí') }}
                                {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('email', 'Emial') }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('priority', 'Ưu tiên') }}
                                {{ Form::select('priority', [1, 2, 3], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('section', 'Section') }}
                                {{ Form::select('section', ['Vận chuyển' => 'Vận chuyển', 'Hậu cần' => 'Hậu cần', 'Tài chính' => 'Tài chính'], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('zip', 'Mã bưu chính') }}
                                {{ Form::text('zip', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('city', 'Thành phố') }}
                                {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('country', 'Quốc gia') }}
                                {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                        </div>
                        <div class="col-lg-12 validate_form">
                            {{ Form::submit('Sửa khách hàng', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
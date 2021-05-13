@extends('layouts.base')

@section('caption', 'Sửa công ty')

@section('title', 'Sửa công ty')

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
                            {{ Form::model($company, ['route' => ['processUpdateCompanies', $company->id], 'method' => 'PUT']) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Tên') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}

                            </div>

                            <div class="form-group">
                                {{ Form::label('tax_number', 'Số thuế') }}
                                {{ Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('phone', 'Điện thoại') }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('city', 'Thành phố') }}
                                {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('billing_address', 'Địa chỉ thanh toán') }}
                                {{ Form::text('billing_address', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('country', 'Quốc gia') }}
                                {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group input-row">
                                {{ Form::label('client_id', 'Khách hàng được chỉ định') }}
                                {{ Form::select('client_id',$clients,null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')])  }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('postal_code', 'Mã bưu điện') }}
                                {{ Form::text('postal_code', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('employees_size', 'Quy mô nhân viên') }}
                                {{ Form::text('employees_size', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('fax', 'Fax') }}
                                {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', 'Mô tả') }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            {{ Form::submit('Sửa công ty', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
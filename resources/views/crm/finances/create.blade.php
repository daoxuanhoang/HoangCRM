@extends('layouts.base')

@section('caption', 'Thêm tài chính')

@section('title', 'Thêm tài chính')

@section('lyric', '')

@section('content')
    @if(count($dataWithPluckOfCompanies) == 0)
        <div class="alert alert-danger">
            <strong>Danger!</strong> Không có công ty nào trong hệ thống. Vui lòng tạo bất kỳ khách hàng nào. <a
                    href="{{ URL::to('companies/create') }}">Click here!</a>
        </div>
    @endif
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
                            {{ Form::open(['route' => 'processStoreFinance']) }}
                            <div class="form-group input-row">
                                {{ Form::label('name', 'Tên') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('companies_id', 'Công ty được chỉ định') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                                    {{ Form::select('companies_id', $dataWithPluckOfCompanies, null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')])  }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('description', 'Mô tả') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                                    {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('type', 'Kiểu') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                                    {{ Form::select('type', ['Invoice', 'proforma invoice', 'advance', 'simple transfer'], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('gross', 'Tổng') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                                    {{ Form::text('gross', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('category', 'Thể loại') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                                    {{ Form::select('category', ['steady income', 'large order', 'small order', 'one-off order'], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('date', 'Ngày') }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 validate_form">
                            {{ Form::submit('Thêm tài chính', ['class' => 'btn btn-primary']) }}
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                //create formValidator object
                //there are a lot of configuration options that need to be passed,
                //but this makes it extremely flexibility and doesn't make any assumptions
                var validator = new formValidator({
                    //this function adds an error message to a form field
                    addError: function (field, message) {
                        //get existing error message field
                        var error_message_field = $('.error_message', field.parent('.input-group'));

                        //if the error message field doesn't exist yet, add it
                        if (!error_message_field.length) {
                            error_message_field = $('<span/>').addClass('error_message');
                            field.parent('.input-group').append(error_message_field);
                        }

                        error_message_field.text(message).show(200);
                        field.addClass('error');
                    },
                    //this removes an error from a form field
                    removeError: function (field) {
                        $('.error_message', field.parent('.input-group')).text('').hide();
                        field.removeClass('error');
                    },
                    //this is a final callback after failing to validate one or more fields
                    //it can be used to display a summary message, scroll to the first error, etc.
                    onErrors: function (errors, event) {
                        //errors is an array of objects, each containing a 'field' and 'message' parameter
                    },
                    //this defines the actual validation rules
                    rules: {
                        //this is a basic non-empty check
                        'name': {
                            'field': $('input[name=name]'),
                            'validate': function (field, event) {
                                if (!field.val()) {
                                    throw "A name is required.";
                                }
                            }
                        }
                    }
                });

                //now, we attach events

                //this does validation every time a field loses focus
                $('form').on('blur', 'input,select', function () {
                    validator.validateField($(this).attr('name'), 'blur');
                });

                //this clears errors every time a field gains focus
                $('form').on('focus', 'input,select', function () {
                    validator.clearError($(this).attr('name'));
                });

                //this is for the validate links
                $('.validate_section').click(function () {
                    var fields = [];
                    $('input,select', $(this).closest('.section')).each(function () {
                        fields.push($(this).attr('name'));
                    });

                    if (validator.validateFields(fields, 'submit')) {
                        alert('success');
                    }
                    return false;
                });
                $('.validate_form').click(function () {
                    if (!validator.validateFields('submit')) {
                        return false;
                    }
                    return true;
                });

                //this is for the clear links
                $('.clear_section').click(function () {
                    var fields = [];
                    $('input,select', $(this).closest('.section')).each(function () {
                        fields.push($(this).attr('name'));
                    });

                    validator.clearErrors(fields);
                    return false;
                });
            });
        </script>
    </div>
@endsection
@extends('layouts.base')

@section('caption', 'Thông tin về công ty')

@section('title', 'Thông tin về công ty')

@section('lyric', '')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-6">
            @if(session()->has('message_success'))
                <div class="alert alert-success">
                    <strong>Well done!</strong> {{ session()->get('message_success') }}
                </div>
            @elseif(session()->has('message_danger'))
                <div class="alert alert-danger">
                    <strong>Danger!</strong> {{ session()->get('message_danger') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin thêm về {{ $company->name }}
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Thông tin cơ bản</a>
                        </li>
                        <div class="text-right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                Xóa công ty <li class="fa fa-trash-o"></li>
                            </button>
                        </div>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <h4></h4>

                            <table class="table table-striped table-bordered">
                                <tbody class="text-right">
                                <tr>
                                    <th>Tên</th>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <th>Số thuế</th>
                                    <td>{{ $company->tax_number }}</td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td>{{ $company->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Thành phố</th>
                                    <td>{{ $company->city }}</td>
                                </tr>
                                <tr>
                                    <th>Dịa chỉ thanh toán</th>
                                    <td>{{ $company->billing_address }}</td>
                                </tr>
                                <tr>
                                    <th>Quốc gia</th>
                                    <td>{{ $company->country }}</td>
                                </tr>
                                <tr>
                                    <th>Mã bưu điện</th>
                                    <td>{{ $company->postal_code }}</td>
                                </tr>
                                <tr>
                                    <th>Quy mô nhân viên</th>
                                    <td>{{ $company->employees_size }}</td>
                                </tr>
                                <tr>
                                    <th>Khách hàng được chỉ định</th>
                                    <td>
                                        <a href="{{ URL::to('clients/view/' . $company->client->id) }}">{{ $company->client->full_name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fax</th>
                                    <td>{{ $company->fax }}</td>
                                </tr>
                                <tr height="100px">
                                    <th>Mô tả</th>
                                    <td>{{ $company->description }}</td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td>{{ $company->is_active ? 'Yes' : 'No' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h4>Lorem ipsum</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">You want delete this company?</h4>
                </div>
                <div class="modal-body">
                    Hành động sẽ xóa vĩnh viễn công ty này.
                </div>
                <div class="modal-footer">
                    {{ Form::open(['url' => 'companies/delete/' . $company->id,'class' => 'pull-right']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this company', ['class' => 'btn btn-small btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.base')

@section('caption', 'Thông tin về nhân viên: ' . $finance->full_name)

@section('title', 'Thông tin về nhân viên: ' . $finance->full_name)

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
            <br/>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Thông tin cơ bản</a>
                        </li>
                        <div class="text-right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                Xóa tài chính này <li class="fa fa-trash-o"></li>
                            </button>
                        </div>

                    </ul>
                    <div class="tab-pane fade active in" id="home">
                        <h4></h4>

                        <table class="table table-striped table-bordered">
                            <tbody class="text-right">
                            <tr>
                                <th>Tên</th>
                                <td>{{ $finance->name }}</td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>{{ $finance->description }}</td>
                            </tr>
                            <tr>
                                <th>Thể loại</th>
                                <td>{{ $finance->category }}</td>
                            </tr>
                            <tr>
                                <th>Kiểu</th>
                                <td>{{ $finance->type }}</td>
                            </tr>
                            <tr>
                                <th>Tổng</th>
                                <td>{{ Cknow\Money\Money::{App\Models\SettingsModel::getSettingValue('currency')}($finance->gross) }}</td>
                            </tr>
                            <tr>
                                <th>Net</th>
                                <td>{{ Cknow\Money\Money::{App\Models\SettingsModel::getSettingValue('currency')}($finance->net) }}</td>
                            </tr>
                            <tr>
                                <th>Vat</th>
                                <td>{{ Cknow\Money\Money::{App\Models\SettingsModel::getSettingValue('currency')}($finance->vat) }}</td>
                            </tr>
                            <tr>
                                <th>Ngày</th>
                                <td>{{ $finance->date }}</td>
                            </tr>
                            <tr>
                                <th>Công ty được chỉ định</th>
                                <td>
                                    <a href="{{ URL::to('companies/view/' . $finance->companies->id) }}">{{ $finance->companies->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>{{ $finance->is_active ? 'Active' : 'Deactive' }}</td>
                            </tr>
                            </tbody>
                        </table>
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
                    <h4 class="modal-title" id="myModalLabel">Bạn có muốn xóa tài chính này?</h4>
                </div>
                <div class="modal-body">
                    Hành động sẽ xóa vĩnh viễn khoản tài chính này.
                </div>
                <div class="modal-footer">
                    {{ Form::open(['url' => 'finances/delete/' . $finance->id,'class' => 'pull-right']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Xóa tài chính này', ['class' => 'btn btn-small btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
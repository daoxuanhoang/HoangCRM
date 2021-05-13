@extends('layouts.base')

@section('caption', 'Thông tin về khách hàng: ' . $clientDetails->full_name)

@section('title', 'Thông tin về khách hàng: ' . $clientDetails->full_name)

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
                        <li class=""><a href="#profile" data-toggle="tab">Các công ty được chỉ định <span
                                        class="badge badge-warning">{{ $clientDetails->companiesCount }}</span></a>
                        </li>
                        <li class=""><a href="#messages" data-toggle="tab">Nhân viên được giao <span
                                        class="badge badge-warning">{{ $clientDetails->employeesCount }}</span></a>
                        </li>
                        <div class="text-right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                Xóa khách hàng
                                <li class="fa fa-trash-o"></li>
                            </button>
                        </div>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <table class="table table-striped table-bordered">
                                <tbody class="text-right">
                                <tr>
                                    <th>Tên</th>
                                    <td>{{ $clientDetails->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td>{{ $clientDetails->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $clientDetails->email }}</td>
                                </tr>
                                <tr>
                                    <th>Section</th>
                                    <td>{{ $clientDetails->section }}</td>
                                </tr>
                                <tr>
                                    <th>Ngân sách</th>
                                    <td>
                                        <button type="submit"
                                                class="btn btn-default">{{ $clientDetails->formattedBudget }}</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td>{{ $clientDetails->is_active ? 'Active' : 'Deactive' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h4>Danh sách công ty</h4>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                                   data-sortable>
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Điện thoại</th>
                                    <th>Số thuế</th>
                                    <th>Hoạt động</th>
                                </tr>
                                </thead>
                                </tr>
                                @foreach($clientDetails->companies as $companies)
                                    <tbody>
                                    <tr class="odd gradeX">
                                        <td>{{ $companies->name }}</td>
                                        <td>{{ $companies->tax_number }}</td>
                                        <td>{{ $companies->phone }}</td>
                                        <td>
                                            {{ Form::open(['url' => 'clients/delete/' . $companies->id,'class' => 'pull-right']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Xóa công ty', ['class' => 'btn btn-danger btn-sm']) }}
                                            {{ Form::close() }}
                                        </td>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h4>Danh sách nhân viên</h4>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example-sort-employees"
                                   data-sortable>
                                <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Phone</th>
                                    <th>Email address</th>
                                    <th>Job</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                </tr>
                                @foreach($clientDetails->employees as $employees)
                                    <tbody>
                                    <tr class="odd gradeX">
                                        <td>{{ $employees->full_name }}</td>
                                        <td>{{ $employees->phone }}</td>
                                        <td>{{ $employees->email }}</td>
                                        <td>{{ $employees->job }}</td>
                                        <td>
                                            {{ Form::open(['url' => 'employees/delete/' . $employees->id,'class' => 'pull-right']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Xóa nhân viên', ['class' => 'btn btn-danger btn-sm']) }}
                                            {{ Form::close() }}
                                        </td>
                                    @endforeach
                                    </tbody>
                            </table>
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
                    <h4 class="modal-title" id="myModalLabel">Bạn muốn xóa khách hàng này?</h4>
                </div>
                <div class="modal-body">
                    Hành động sẽ xóa vĩnh viễn khách hàng này.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 15px;">
                        Đóng
                    </button>
                    {{ Form::open(['url' => 'clients/delete/' . $clientDetails->id,'class' => 'pull-right']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Xóa khách hàng này', ['class' => 'btn btn-small btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
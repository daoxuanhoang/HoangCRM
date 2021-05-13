@extends('layouts.base')

@section('caption', 'Danh sách nhiệm vụ')

@section('title', 'Danh sách nhiệm vụ')

@section('lyric', '')

@section('content')
    <div class="row">
        <div class="col-md-12">
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
            <a href="{{ URL::to('tasks/form/create') }}">
                <button type="button" class="btn btn-primary btn active">Thêm nhiệm vụ</button>
            </a>
            <br>
            <!-- Advanced Tables -->
            <h4 class="page-header">
                <i class="fa fa-code-fork" aria-hidden="true"></i> Danh sách các nhiệm vụ chưa hoàn thành
            </h4>
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" data-sortable>
                            <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Nhân viên được chỉ định</th>
                                <th class="text-center">Thời lượng</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Đã hoàn thành</th>
                                <th class="text-center" style="width:300px">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $value)
                                @if($value->completed == 0)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{ $value->name }}</td>
                                        <td class="text-center"><a
                                                    href="{{ URL::to('employees/view/' . $value->employees->id) }}">{{ $value->employees->full_name }}</a>
                                        </td>
                                        <td class="text-right">{{ $value->duration . ' days' }}</td>
                                        <td class="text-center">
                                                @if($value->is_active == TRUE)
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               onchange='window.location.assign("{{ URL::to('tasks/set-active/' . $value->id . '/0') }}")' checked>
                                                        <span class="slider"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               onchange='window.location.assign("{{ URL::to('tasks/set-active/' . $value->id . '/1') }}")'>
                                                        <span class="slider"></span>
                                                    </label>
                                                @endif
                                        </td>
                                        <td class="text-right">{{ $value->completed ? 'Yes' : 'No' }}</td>
                                        <td class="text-right">
                                            @if($value->completed == FALSE)
                                                <a href="{{ URL::to('tasks/completed/' . $value->id) }}">
                                                    <button type="button" class="btn btn-completed small-btn">Đánh dấu là đã hoàn thành</button>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('tasks/uncompleted/' . $value->id) }}">
                                                    <button type="button" class="btn btn-completed small-btn">Đánh dấu là chưa hoàn thành</button>
                                                </a>
                                            @endif
                                            <a class="btn btn-small btn-success small-btn"
                                               href="{{ URL::to('tasks/view/' . $value->id) }}">Thêm thông tin</a>
                                            <a class="btn btn-small btn-info small-btn"
                                               href="{{ URL::to('tasks/form/update/' . $value->id) }}">Sửa</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $tasksPaginate->render() !!}
                </div>
            </div>
            <!--End Advanced Tables -->

            <!-- Advanced Tables -->
            <h4 class="page-header">
                <i class="fa fa-code-fork" aria-hidden="true"></i> Danh sách các nhiệm vụ đã hoàn thành
            </h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table" style="color: grey;">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" data-sortable>
                            <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Nhân viên được chỉ định</th>
                                <th class="text-center" style="width:200px">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $values)
                                @if($values->completed == 1)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{ $values->name }}</td>
                                        <td class="text-center">{{ $values->employees->full_name }}</td>
                                        <td class="text-right">
                                            @if($values->completed == FALSE)
                                                <a href="{{ URL::to('tasks/completed/' . $values->id) }}">
                                                    <button type="button" class="btn btn-completed small-btn" style="background-color: grey !important; border-color: grey">Đánh dấu là đã hoàn thành</button>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('tasks/uncompleted/' . $values->id) }}">
                                                    <button type="button" class="btn btn-completed small-btn" style="background-color: grey !important; border-color: grey">Đánh dấu là chưa hoàn thành</button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $tasksPaginate->render() !!}
                </div>
            </div>
            <!--End Advanced Tables -->

        </div>
    </div>
@endsection
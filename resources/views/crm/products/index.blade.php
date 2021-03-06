@extends('layouts.base')

@section('caption', 'Danh sách sản phẩm')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message_success'))
                <div class="alert alert-success">
                    <strong>Well done!</strong> {{ session()->get('message_success') }}
                </div>
            @elseif(session()->has('message_danger'))
                <div class="alert alert-danger">
                    <strong>Danger!</strong> {{ session()->get('message_danger') }}
                </div>
            @endif
            <a href="{{ URL::to('products/form/create') }}">
                <button type="button" class="btn btn-primary btn active">Thêm sản phẩm</button>
            </a>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-keyboard-o" aria-hidden="true"></i> Danh sách sản phẩm
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                               data-sortable>
                            <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Thể loại</th>
                                <th class="text-center">Tổng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center" style="width:200px">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $value)
                                <tr class="odd gradeX">
                                    <td class="text-center">{{ $value->name }}</td>
                                    <td class="text-center">{{ $value->category }}</td>
                                    <td class="text-center">{{ $value->count }}</td>
                                    <td class="text-center">
                                        <button type="submit"
                                                class="btn btn-default">{{ Cknow\Money\Money::{App\Models\SettingsModel::getSettingValue('currency')}($value->price) }}</button>
                                    </td>
                                    <td class="text-center">
                                        @if($value->is_active == TRUE)
                                            <label class="switch">
                                                <input type="checkbox"
                                                       onchange='window.location.assign("{{ URL::to('products/set-active/' . $value->id . '/0') }}")'
                                                       checked>
                                                <span class="slider"></span>
                                            </label>
                                        @else
                                            <label class="switch">
                                                <input type="checkbox"
                                                       onchange='window.location.assign("{{ URL::to('products/set-active/' . $value->id . '/1') }}")'>
                                                <span class="slider"></span>
                                            </label>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a class="btn btn-small btn-primary"
                                               href="{{ URL::to('products/view/' . $value->id) }}">Thêm thông tin</a>
                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span
                                                        class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ URL::to('products/form/update/' . $value->id) }}">Sửa</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#">Một số tùy chọn</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $productsPaginate->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
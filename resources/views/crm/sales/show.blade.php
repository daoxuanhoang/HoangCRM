@extends('layouts.base')

@section('caption', 'Thông tin về bán hàng')

@section('title', 'Thông tin về bán hàng')

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
                                Xóa bán hàng này <li class="fa fa-trash-o"></li>
                            </button>
                        </div>

                    </ul>
                    <div class="tab-pane fade active in" id="home">
                        <h4></h4>

                        <table class="table table-striped table-bordered">
                            <tbody class="text-right">
                            <tr>
                                <th>Tên</th>
                                <td>{{ $sale->name }}</td>
                            </tr>
                            <tr>
                                <th>Số lượng</th>
                                <td>{{ $sale->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Ngày thanh toán</th>
                                <td>{{ $sale->date_of_payment }}</td>
                            </tr>
                            <tr>
                                <th>Sản phẩm được chỉ định</th>
                                <td>
                                    <a href="{{ URL::to('products/view/' . $sale->products->id) }}">{{ $sale->products->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>{{ $sale->is_active ? 'Yes' : 'No'  }}</td>
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
                    <h4 class="modal-title" id="myModalLabel">Bạn có muốn xóa sales này?</h4>
                </div>
                <div class="modal-body">
                    Hành động sẽ xóa vĩnh viễn sales này.
                </div>
                <div class="modal-footer">
                    {{ Form::open(['url' => 'sales/delete/' . $sale->id,'class' => 'pull-right']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Xóa bán hàng', ['class' => 'btn btn-small btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
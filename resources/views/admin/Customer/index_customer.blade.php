@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách khách hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4">
                </div>

                <form action="" class="form-inline" role="form" >
{{--                    {{csrf_field()}}--}}
                    <div class="form-group">
                        <input name="key" class="form-control" placeholder="Tìm kiếm sản phẩm"/>
                    </div>
                    <button type="submit" class="btn btn-primary" >Tìm kiếm</button>
                </form>

            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Khách hàng</th>
                        <th>Email khách hàng</th>
                        <th>SDT</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $key => $cus)
                        <tr>
                            {{--                            <th scope="row">{{$key}}</th>--}}
                            <td>{{ $cus->id_customer }}</td>
                            <td>{{ $cus->name_customer }}</td>
                            {{--                            <td>{{ $brand_pro->slug_brand }}</td>--}}
                            <td>{{ $cus->email_customer }}</td>
                            <td>{{ $cus->phone_customer }}</td>
                            <td>
                                <a href="{{route('khachhang.edit',[$cus->id_customer])}}" class="active styling-edit" ui-toggle-class="">
                                    <button class="fa fa-pencil-square-o text-success text-active"></button>
                                </a>

                                <form onclick="return confirm('Bạn có chắc là muốn xóa không?')" action="{{route('khachhang.destroy',[$cus->id_customer])}}"
                                      method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="fa fa-times text-danger text"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $customer->links()}}
            </div>
        </div>
    </div>
@endsection

@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật tài khoản khách hàng
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                <!-- <li>vui long nhap</li> -->
                            @endforeach
                        </ul>
                    </div>
                @endif
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{route('khachhang.update',[$customer->id_customer])}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                <input type="text" name="name_customer" class="form-control" value="{{$customer->name_customer}}" id="exampleInputName" placeholder="Tên khách hàng... ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email khách hàng</label>
                                <input type="email" name="email_customer" class="form-control" value="{{$customer->email_customer}}" id="exampleInputEmail" placeholder="Email khách hàng... ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password_customer" class="form-control" value="{{$customer->password_customer}}" id="exampleInputEmail" placeholder="Email khách hàng... ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SDT</label>
                                <input type="text" name="phone_customer" class="form-control" value="{{$customer->phone_customer}}" id="exampleInputEmail1" placeholder="SDT khách hàng... ">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <button type="submit" name="" class="btn btn-info">Cập nhật thương hiệu</button>
                            <div class="col-sm-8">
                            </div>
                            <a href="{{route('khachhang.index')}}" class="btn btn-info">Quay lại</a>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection


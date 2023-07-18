<body>

    <table border="1">
        <tr>
            <th colspan="4" align="center" style="border: none;
                            border-bottom: 2px solid #4cb96b;
                            padding-right: 20px;padding-left:20px">

                <p style="font-weight: bolder;font-size: 42px;
                                letter-spacing: 0.025em;
                                color:black;">
                    Kính chào quý khách!
                    <br> Đây là đơn hàng của bạn
                </p>
            </th>
        </tr>

        <tr>
            <th colspan="4">
                <b>Chào:</b>{{Session::get('name_customer')}}<br>
                <b>ID:</b>{{Session::get('id_customer')}}<br>
                <b>Mã Đơn Hàng Của bạn là:</b><span>{{$order_d_data['id_order']}}<br>
        </span>
            </th>
        </tr>



        <?php
        $content = Cart::content();
        ?>
        <tr>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Tổng</td>
        </tr>
    @foreach($content as $v_content)
        <tr>
            <td class="text-center">
                {{$v_content->name}}
            </td>
            <td>
                {{number_format($v_content->price).' '.'vnđ'}}
            </td>
            <td>
                {{$v_content->qty}}
            </td>
            <td>
                <p class="cart_total_price">
                        <?php
                        $subtotal = $v_content->price * $v_content->qty;
                        echo number_format($subtotal).' '.'vnđ';
                        ?>
                </p>
            </td>
        </tr>
    @endforeach
        <tr>
            <th colspan="4">
                <b>Tổng Đơn Hàng:</b> <span>{{Cart::total().' '.'vnđ'}}</span><br>
                <b>Hình thức thanh toán:</b>{{$data['name_payment']}}
            </th>
        </tr>
</table>
</body>

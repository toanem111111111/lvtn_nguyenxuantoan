<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Detailsorder;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class OrderController extends Controller
{
    public function update_order(Request $request,$id_detailsorder){
        $data = array();
        $data['quantity'] = $request->quantity;
        DB::table('tbl_detailsorder')->where('id_detailsorder',$id_detailsorder)->update($data);
        Session::put('message','Cập nhật số lượng sản phẩm thành công');
        return redirect()->back();
    }

    public function update_status(Request $request,$id_order){

        $data = array();
        $data['total_order']=$request->total_order;
        $data['status_order'] = $request->payment_option;
        DB::table('tbl_order')->where('id_order',$id_order)->update($data);
        Session::put('message','Cập nhật trạng thái đơn hàng thành công');
        return redirect()->back();

    }
    public function delete_order($id_order){
        $order = Order::where('id_order',$id_order)->first();
        $order->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();
    }

    public function update_shipping(Request $request,$id_shipping){
        $data=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required',
            'address'=>'required',
            'note'=>'required',
        ],
            [
                'name.required' => 'Vui lòng nhập tên.',
                'email.required' => 'Vui lòng nhập email để chúng tôi liên lạc.',
                'phone.required' => 'Vui lòng nhập SDT để chúng tôi liên lạc.',
                'address.required' => 'Vui lòng nhập địa chỉ chính xác để nhận hàng.',
                'note.required' => 'Bạn có thể mô tả gì đó.',
            ]
        );
        $shipping=Shipping::find($id_shipping);
        $shipping->name=$data['name'];
        $shipping->phone=$data['phone'];
        $shipping->email=$data['email'];
        $shipping->note=$data['note'];
        $shipping->address=$data['address'];
        $shipping->save();
        return redirect()->back()->with('message','Cập nhật thông tin giao hàng thành công.');
    }



}

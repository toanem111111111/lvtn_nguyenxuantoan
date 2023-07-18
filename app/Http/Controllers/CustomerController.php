<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::orderBy('id_customer','DESC')->search()->paginate(5);
        return view('admin.Customer.index_customer')->with(compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('admin.Customer.edit_customer')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name_customer'=>'required|max:255',
            'email_customer'=>'required|max:255',
            'password_customer'=>'required|max:255',
            'phone_customer'=>'required|max:255',

        ],
            [
                'name_customer.required' => 'Tên lỗi, Không được để trống',
                'email_customer.required' => 'Email lỗi, Không được để trống',
                'password_customer.required' => 'Vui lòng nhập mật khẩu.',
                'phone_customer.required' => 'SDT không được để trống',
            ]
        );
        $customer=Customer::find($id);
        $customer->name_customer=$data['name_customer'];
        $customer->email_customer=$data['email_customer'];
        $customer->password_customer= md5($data['password_customer']);
        $customer->phone_customer=$data['phone_customer'];
        $customer->save();

        return redirect()->back()->with('message','Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::find($id);
            $customer->delete();
            DB::commit();
            return redirect()->back()->with('message','Xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message','Khách hàng hiện đang có sản phẩm không thể xóa được.');
        }
    }
}

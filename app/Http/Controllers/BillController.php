<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    public function getBillList($status)
    {
        // Lấy danh sách đơn hàng dựa trên trạng thái
        $bills = Bill::all();
        //$bills = Bill::where('status', $status)->get();
        //dd($bills);
        // Trả về view hiển thị danh sách đơn hàng
        return view('product.bill', ['bills' => $bills]);

    }

    public function updateBillStatus($id, $status)
    {
        // Cập nhật trạng thái của đơn hàng với ID tương ứng
        $bill = Bill::find($id);
        $bill->status = $status;
        $bill->save();
    
        // Lưu thông báo thành công vào session
        session()->flash('success', 'Cập nhật trạng thái thành công');
    
        // Chuyển hướng trở lại trang danh sách đơn hàng
        return redirect()->back();
    }
    

    public function updateBillStatusAjax(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        // Cập nhật trạng thái của đơn hàng với ID tương ứng
        $bill = Bill::find($id);
        $bill->status = $status;
        $bill->save();

        // Trả về kết quả cho yêu cầu AJAX
        return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
    }

    public function cancelBill($id)
    {
        // Hủy đơn hàng với ID tương ứng
        $bill = Bill::find($id);
        $bill->delete();
        session()->flash('success', 'Hủy đơn hàng thành công');

        // Trả về thông báo hủy đơn hàng thành công
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Hủy đơn hàng thành công']);
    }
    
}

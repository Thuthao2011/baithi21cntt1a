<?php

 namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContactList()
    {
        // Lấy danh sách liên hệ từ cơ sở dữ liệu
        $contacts = Contact::all();

        // Trả về view hiển thị danh sách liên hệ
        return view('product.list', compact('contacts'));
    }

    public function updateContactStatus($id, $status)
    {
        // Cập nhật trạng thái của liên hệ với ID tương ứng
        $contact = Contact::find($id);
        $contact->status = $status;
        $contact->save();
        session()->flash('success', 'Cập nhật trạng thái thành công');

        // Trả về thông báo cập nhật thành công
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    public function store(Request $request)
    {
        // Lưu dữ liệu từ form vào cơ sở dữ liệu
        $contact = new Contact();
        $contact->name = $request->input('your-name');
        $contact->email = $request->input('your-email');
         $contact->message = $request->input('your-message');
        $contact->save();
    
        // Trả về thông báo thành công hoặc chuyển hướng đến trang khác
        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi đi thành công!');
    }
    

}

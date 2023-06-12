<!DOCTYPE html>
<html>
<head>
	<title>Quản lý liên hệ</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="/nguoidung">Quản Lý Người Dùng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="/sanpham">Quản Lý Sản Phẩm</a>
	  </li>
      <li class="nav-item">
	    <a class="nav-link" href="/banner">Quản Lý Banner</a>
	  </li>
	  <li class="nav-item">
      <a class="nav-link" href="/admin/category/danhsach">Quản Lý Danh Mục</a>
	  </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.getBillList', ['status' => 'all']) }}">Quản Lý Đơn Hàng</a>
    </li>

	</ul>
	<div class="container">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif

		<div class="col-12 text-center">
			<h1>Danh sách tin nhắn của khách hàng</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
             <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Tin nhắn</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->status }}</td>
                    <td>
                        <a href="{{ route('product.updateStatus', ['id' => $contact->id, 'status' => 'Đã liên hệ']) }}">Đã liên hệ</a>
                        <a href="{{ route('product.updateStatus', ['id' => $contact->id, 'status' => 'Chưa liên hệ']) }}">Chưa liên hệ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

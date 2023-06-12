<!DOCTYPE html>
<html>
<head>
	<title>Quản lý đơn hàng</title>
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
      <a class="nav-link" href="/admin/category/danhsach">Quản Lý Danh Mục</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="/sanpham">Quản Lý Sản Phẩm</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="/banner">Quản Lý Banner</a>
	  </li>
      <li class="nav-item">
	    <a class="nav-link" href="/nguoidung">Quản Lý Người Dùng</a>
	  </li>
    <li class="nav-item">
	    <a class="nav-link" href="{{ route('product.list', ['status' => 'all']) }}">Quản Lý Liên Hệ</a>
	  </li>

	</ul>
	<div class="container">
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif

		<div class="col-12 text-center">
			<h1>Danh sách đơn hàng</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Khách hàng</th>
							<th>Ngày đặt hàng</th>
							<th>Tổng tiền</th>
							<th>Hình thức thanh toán</th>
							<th>Ghi chú</th>
							<th>Trạng thái</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($bills as $bill)
						<tr>
							<td>{{ $bill->id }}</td>
							<td>{{ $bill->customer->name }}</td>
							<td>{{ $bill->date_order }}</td>
							<td>{{ $bill->total }}</td>
							<td>{{ $bill->payment }}</td>
							<td>{{ $bill->note }}</td>
							<td>{{ $bill->status }}</td>
							<td>
								<a href="{{ route('product.updateBillStatus', ['id' => $bill->id, 'status' => $bill->status]) }}">Cập nhật trạng thái</a>
                                <form action="{{ route('product.cancelBill', ['id' => $bill->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hủy đơn hàng</button>
                            </form>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

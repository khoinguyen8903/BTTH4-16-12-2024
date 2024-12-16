<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Quản lý máy tính</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #333;
    background: #f8f9fa;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
}
.container-xl {
    margin-top: 30px;
}
.table-wrapper {
    background: #fff;
    padding: 20px 25px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.table-title {
    padding-bottom: 15px;
    background: linear-gradient(45deg, #4e73df, #1cc88a);
    color: #fff;
    padding: 15px 20px;
    border-radius: 8px 8px 0 0;
    margin: -25px -25px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.table-title h2 {
    margin: 0;
    font-size: 22px;
}
.table-title .btn {
    color: #fff;
    font-size: 14px;
    background: #1cc88a;
    border: none;
    border-radius: 25px;
    padding: 8px 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.table-title .btn:hover {
    background: #17a673;
}
.table-responsive {
    margin: 20px 0;
}
table.table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: separate;
    border-spacing: 0 10px;
}
table.table thead th {
    background: #4e73df;
    color: #fff;
    border: none;
    text-align: center;
}
table.table tbody tr {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
table.table tbody tr:hover {
    background: #f1f1f1;
}
table.table td {
    text-align: center;
    vertical-align: middle;
    padding: 12px 15px;
    border: none;
}
.table td .btn {
    margin: 0 5px;
    border-radius: 5px;
    font-size: 13px;
    padding: 5px 10px;
}
.table td .btn-primary {
    background: #4e73df;
    border: none;
}
.table td .btn-danger {
    background: #e74a3b;
    border: none;
}
.table td .btn-primary:hover {
    background: #375a7f;
}
.table td .btn-danger:hover {
    background: #c9302c;
}
.pagination {
    justify-content: center;
    margin: 20px 0;
}
.pagination li a {
    color: #4e73df;
    background: #fff;
    border: 1px solid #ddd;
    padding: 8px 15px;
    border-radius: 50%;
    margin: 0 5px;
}
.pagination li.active a {
    background: #4e73df;
    color: #fff;
}
.alert {
    margin-bottom: 20px;
}
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Quản lý <b>Sự cố máy tính</b></h2>
            <a href="{{ route('issues.create') }}" class="btn"><i class="fa fa-plus"></i> Thêm vấn đề mới</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã vấn đề</th>
                        <th>Tên máy tính</th>
                        <th>Tên phiên bản</th>
                        <th>Người báo cáo</th>
                        <th>Thời gian</th>
                        <th>Mức độ</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}</td>
                            <td>{{ $issue->computer->model }}</td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ $issue->reported_date }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">Sửa</a>
                                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $issues->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>

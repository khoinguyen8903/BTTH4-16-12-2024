<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Thêm Vấn Đề</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-container {
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .mb-3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Thêm Vấn Đề Mới</h1>
    <div class="form-container">
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="computer_id" class="form-label">Chọn Máy Tính</label>
                <select class="form-control" id="computer_id" name="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reported_by" class="form-label">Người Báo Cáo</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" placeholder="Nhập tên người báo cáo" required>
            </div>

            <div class="mb-3">
                <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                <input type="date" class="form-control" id="reported_date" name="reported_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả chi tiết về vấn đề" required></textarea>
            </div>

            <div class="mb-3">
                <label for="urgency" class="form-label">Mức Độ Sự Cố</label>
                <select class="form-control" id="urgency" name="urgency" required>
                    <option value="Low">Thấp</option>
                    <option value="Medium">Trung Bình</option>
                    <option value="High">Cao</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Open">Mở</option>
                    <option value="In Progress">Đang Xử Lý</option>
                    <option value="Resolved">Đã Giải Quyết</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Thêm Vấn Đề</button>
        </form>
    </div>

</body>
</html>

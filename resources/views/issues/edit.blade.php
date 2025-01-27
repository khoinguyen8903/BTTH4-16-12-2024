<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Cập nhật thông tin sự cố</title>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center text-primary mb-4">Cập nhật thông tin vấn đề</h1>

                <form action="{{ route('issues.update', $issue->id) }}" method="POST" class="bg-light p-4 rounded shadow">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Chọn Máy Tính</label>
                        <select name="computer_id" id="computer_id" class="form-select" required>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                                    {{ $computer->computer_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người Báo Cáo</label>
                        <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                        <input type="date" name="reported_date" id="reported_date" class="form-control" value="{{ $issue->reported_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ $issue->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức Độ Sự Cố</label>
                        <select name="urgency" id="urgency" class="form-select" required>
                            <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

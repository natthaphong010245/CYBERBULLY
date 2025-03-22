<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1>Admin Dashboard</h1>
        
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">หมวดหมู่</h5>
                        <p class="card-text">จัดการหมวดหมู่ Infographic</p>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">จัดการหมวดหมู่</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Infographics</h5>
                        <p class="card-text">จัดการ Infographic ทั้งหมด</p>
                        <a href="{{ route('admin.infographics.index') }}" class="btn btn-primary">จัดการ Infographic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
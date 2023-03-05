<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>
    <link href="<?= base_url('assets');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets');?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <!-- Begin Page Content -->
     <div class="container-fluid lead-bg" style="margin-top:100px;">
    
    <!-- 404 Error Text -->
    <div class="card">
        <div class="card-body">
            <div class="error mx-auto" data-text="404">404</div>
            <h5 class="lead text-gray-800 mb-5 text-center">Page Not Found</h5>
        </div>
        <div class="text-center">
            <div class="card-footer">
                <h4 class="text-white-500 mb-0">Mohon Maaf halaman yang anda tuju tidak tersedia</h4>
                <h6><a href="<?= site_url('user');?>">&larr; Back to Dashboard</a></h6>
            </div>
        </div>
    </div>
    
    </div>
    <!-- /.container-fluid -->
</body>
</html>
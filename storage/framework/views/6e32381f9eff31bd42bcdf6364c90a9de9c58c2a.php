<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($wine->name); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #40162c; /* Promijenjena boja pozadine */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            color: #212529;
            border-bottom: none;
            border-radius: 0.5rem 0.5rem 0 0;
            padding: 1.5rem;
        }

        .card-body {
            padding: 2rem;
            text-align: center; /* Centriranje QR koda */
        }

        .card-title {
            color: #212529;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-download {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: bold;
        }

        .btn-download:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            color: #212529;
        }

        .qr-code-container {
            display: flex;
            justify-content: center;
            margin-top: -20px; /* Pomičemo QR kod prema gore */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><?php echo e($wine->name); ?></h2>
            </div>
            <div class="card-body">
                <div class="qr-code-container" style="background-color: #fff; padding: 1rem;">
                    <?php echo $wine->qr; ?>

                </div>
                <p class="mt-3">Ovaj QR kod vodi korisnika na xy adresu</p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-download" id="downloadBtn">Preuzmi QR kod</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        axios.get('/path/to/download/qrcode')
            .then(function (response) {
                // Create a link element
                var link = document.createElement('a');
                link.href = 'data:image/svg+xml;base64,' + btoa(response.data); 
                link.download = 'qrcode.svg'; 
                link.click(); 
            })
            .catch(function (error) {
                console.error('Error downloading QR code:', error);
            });
    });
</script>
</html>
<?php /**PATH C:\Projekti\wine360\resources\views/wine/qr.blade.php ENDPATH**/ ?>
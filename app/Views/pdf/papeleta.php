<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papeleta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .qr-code {
            margin-bottom: 20px;
        }

        .info {
            margin-top: 20px;
        }

        .info-row {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .info-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- QR Code Section -->
        <div class="qr-code">
            <img src="<?= base_url('public/qr/' . $papeleta->id . '.png') ?>" alt="QR Code" style="width: 350px; height: 350px;">
        </div>

        <!-- Info Section -->
        <div class="info">
            <div class="info-row">
                <span class="info-label">Número de Papeleta:</span> <?= $papeleta->no_papeleta ?>
            </div>
            <div class="info-row">
                <span class="info-label">Origen:</span> <?= $papeleta->lugar_origen ?>
            </div>
            <div class="info-row">
                <span class="info-label">Destino:</span> <?= $papeleta->lugar_destino ?>
            </div>
            <div class="info-row">
                <span class="info-label">No de Unidad:</span> <?= $papeleta->no_unidad ?>
            </div>
            <div class="info-row">
                <span class="info-label">Chofer:</span> <?= $papeleta->nombre . ' ' . $papeleta->apellido_paterno . ' ' . $papeleta->apellido_materno; ?>
            </div>
            <div class="info-row">
                <span class="info-label">Fecha:</span> <?= $papeleta->fecha ?>
            </div>
            <div class="info-row">
                <span class="info-label">Hora:</span> <?= $papeleta->hora ?>
            </div>


        </div>
    </div>
</body>

</html>
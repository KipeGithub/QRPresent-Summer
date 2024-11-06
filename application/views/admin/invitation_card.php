<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $name_file; ?></title>
    <style>
        @font-face {
            font-family: 'PoppinsBold';
            font-weight: bold;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            color: #000;
        }

        body {
            background-image: url('<?= base_url('assets/image/Undangan_2.jpg'); ?>');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        .content {
            position: absolute;
            top: 46%;
            left: 48%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 80%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
        }

        h1 {
            font-family: 'PoppinsBold', Arial, sans-serif;
            font-size: 45px;
            font-weight: bold;
            margin: 0;
            padding: 2px;
        }

        h3 {
            font-family: 'PoppinsBold', Arial, sans-serif;
            font-size: 25px;
            margin: 0;
            padding: 0px;
        }

        h2,
        p {
            margin: 0;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1 style="margin-bottom: 20px;margin-top: 10px;">Hallo Partelians !!!</h1>
        <h3><?= $card->nama_lengkap; ?></h3>
        <h3><?= $card->kelas; ?></h3>
        <h3><?= $card->plotting; ?></h3>
        <div class="qr-code">
            <img src="<?= $qr_image; ?>" alt="QR Code" width="250" height="250">
        </div>

        <p>Dont forget to show this QR for your Check In Partelians !</p>
    </div>
</body>

</html>
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

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .content {
            position: relative;
            top: 27%;
            left: 0;
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            text-align: center;
        }

        h1 {
            font-family: 'PoppinsBold', Arial, sans-serif;
            font-size: 45px;
            font-weight: bold;
            margin: 10px 0 20px;
        }

        h3 {
            font-family: 'PoppinsBold', Arial, sans-serif;
            font-size: 25px;
            margin: 0;
        }

        .qr-code img {
            width: 250px;
            height: 250px;
        }

        p {
            margin: 10px 0 0;
        }
    </style>
</head>

<body>
    <!-- Background image as <img> element with base64 data URI -->
    <img src="<?= $bg_image_base64; ?>" alt="Background Image" class="background">

    <!-- Content overlay -->
    <div class="content">
        <h1>Hallo Partelians !!!</h1>
        <h3><?= $card->nama_lengkap; ?></h3>
        <h3><?= $card->kelas; ?></h3>
        <h3><?= $card->plotting; ?></h3>
        <div class="qr-code">
            <img src="<?= $qr_image; ?>" alt="QR Code">
        </div>
        <p>Don't forget to show this QR for your Check In Partelians!</p>
    </div>
</body>

</html>
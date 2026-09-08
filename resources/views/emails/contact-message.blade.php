<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesan Baru</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background-color: #111111;
    font-family: Arial, Helvetica, sans-serif;
    color: #f5f5f5;
">

<div style="
    max-width: 650px;
    margin: 40px auto;
    padding: 30px;
    background-color: #181818;
    border: 1px solid #333333;
    border-radius: 12px;
">

    <h1 style="
        margin-top: 0;
        font-size: 24px;
        color: #ffffff;
    ">
        Pesan Baru dari Portfolio
    </h1>

    <p style="
        color: #aaaaaa;
        font-size: 14px;
        line-height: 1.6;
    ">
        Kamu menerima pesan baru melalui contact form website portfolio.
    </p>

    <hr style="
        border: none;
        border-top: 1px solid #333333;
        margin: 25px 0;
    ">

    <div style="margin-bottom: 20px;">
        <strong style="color: #ffffff;">Nama</strong>

        <p style="
            margin: 6px 0 0;
            color: #cccccc;
        ">
            {{ $contactMessage->name }}
        </p>
    </div>

    <div style="margin-bottom: 20px;">
        <strong style="color: #ffffff;">Email</strong>

        <p style="
            margin: 6px 0 0;
            color: #cccccc;
        ">
            {{ $contactMessage->email }}
        </p>
    </div>

    @if($contactMessage->subject)
        <div style="margin-bottom: 20px;">
            <strong style="color: #ffffff;">Subject</strong>

            <p style="
                margin: 6px 0 0;
                color: #cccccc;
            ">
                {{ $contactMessage->subject }}
            </p>
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        <strong style="color: #ffffff;">Pesan</strong>

        <div style="
            margin-top: 10px;
            padding: 15px;
            background-color: #111111;
            border: 1px solid #2d2d2d;
            border-radius: 8px;
            color: #cccccc;
            line-height: 1.7;
            white-space: pre-line;
        ">
            {{ $contactMessage->message }}
        </div>
    </div>

    <hr style="
        border: none;
        border-top: 1px solid #333333;
        margin: 25px 0;
    ">

    <p style="
        margin-bottom: 0;
        color: #666666;
        font-size: 12px;
    ">
        Email ini dikirim otomatis oleh Vickry Portfolio.
    </p>

</div>

</body>
</html>
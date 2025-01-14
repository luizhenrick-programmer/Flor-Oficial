

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Pix</title>
</head>
<body>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <h1>Pagamento Pix</h1>
    <p>Use o QR Code abaixo para realizar o pagamento:</p>
    <img src="data:image/png;base64, {{ $imagem_pix }}" alt="QR Code Pix" width="200px">
    <p>Ou copie e cole o código abaixo:</p>
    <textarea readonly>{{ $copia_cola }}</textarea>
</body>
</html>

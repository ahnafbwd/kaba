<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout Page</h1>

    <form action="{{ $midtransSnapURL }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="snapToken" value="{{ $snapToken }}">
        <button type="submit">Bayar Sekarang</button>
    </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $midtransClientKey }}"></script>
    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();

            snap.pay('{{ $snapToken }}');
        });
    </script>
</body>
</html>

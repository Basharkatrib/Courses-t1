<!DOCTYPE html>
<html>
<head>
    <title>Stripe Checkout</title>
</head>
<body>
    <h1>Stripe Payment</h1>
    <form action="{{ route('create-checkout-session') }}" method="POST">
        @csrf
        <button type="submit">Checkout</button>
    </form>
</body>
</html>

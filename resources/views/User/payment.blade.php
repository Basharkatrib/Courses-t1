@extends('User.master.layout')



@section('content')


    <div class="container-payment">
        <div class="payment-form">
            <h2>Payment</h2>
            <form action="/process_payment" method="POST">
                <div class="form-group">
                    <label for="cardholder-name">Your Name</label>
                    <input type="text" id="cardholder-name" name="cardholder_name" required>
                </div>
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry-date">Date</label>
                    <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
                <button type="submit" class="pay-button"><a href="#">payment</a></button>
            </form>
        </div>
    </div>




@endsection

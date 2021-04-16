<button id="rzp-button1" hidden>Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Kundans Wear",
    "description": "Kundanswear Payment Portal.",
    "image": "https://example.com/your_logo",
    "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (respons){
        document.getElementById('rzp_paymentid').value = respons.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = respons.razorpay_order_id;
        document.getElementById('rzp_signature').value = respons.razorpay_signature;
        document.getElementById('submit_button').click();

    },
    "prefill": {
        "name": "{{$response['name']}}",
        "email": "{{$response['email']}}",
        "contact": "{{$response['contact']}}"
    },
    "notes": {
        "address": "{{$response['orderNote']}}"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
window.onload = function(){
    document.getElementById('rzp-button1').click();
}

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<form method="POST" action="{{route('payment.store')}}" hidden>
    @csrf
    <input type="text" name="rzp_paymentid" id="rzp_paymentid">
    <input type="text" name="rzp_orderid" id="rzp_orderid">
    <input type="text" name="rzp_signature" id="rzp_signature">
    <input type="text" name="name" id="name" value="{{$response['name']}}">
    <input type="text" name="email" id="email" value="{{$response['email']}}">
    <input type="text" name="contact" id="contact" value="{{$response['contact']}}">
    <input type="text" name="address" id="address" value="{{$response['address']}}">
    <input type="text" name="order_note" id="order_note" value="{{$response['orderNote']}}">
    <input type="text" name="town" id="town" value="{{$response['town']}}">
    <input type="text" name="state" id="state" value="{{$response['state']}}">
    <input type="text" name="postcode" id="postcode" value="{{$response['postcode']}}">
    <input type="text" name="product_details" id="product_details" value="{{$response['product_details']}}">
    
    <button type="submit" id="submit_button">Submit</button>
</form>
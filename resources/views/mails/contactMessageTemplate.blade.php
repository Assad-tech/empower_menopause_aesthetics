<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>New Contact Message Received</h2>

    <p><strong>Name:</strong> {{ $data['customer_name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>

    <hr>
    <small>This message was submitted via the Contact Us form on your website.</small>
</body>

</html>

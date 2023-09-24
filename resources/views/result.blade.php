<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <h1>Job Application Form Result</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p><strong>Full Name:</strong> {{ $formData['full_name'] }}</p>
        <p><strong>Email:</strong> {{ $formData['email'] }}</p>
        <p><strong>Address:</strong> {{ $formData['address'] }}</p>
        @if (isset($formData['id_card_photo']) && $formData['id_card_photo'])
            <p><strong>ID Card Photo:</strong></p>
            <img src="{{ asset('storage/images/' . $formData['id_card_photo']) }}" alt="ID Card Photo" style="max-width: 400px;">
        @endif
        <p><strong>Desired Position:</strong> {{ $formData['desired_position'] }}</p>
        <p><strong>Desired Hourly Wage:</strong> $ {{ $formData['desired_hourly_wage'] }}</p>
    </div>
</body>
</html>

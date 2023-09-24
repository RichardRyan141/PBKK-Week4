<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <h1>Job Application Form</h1>
        <form action="/form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}">
                @error('full_name')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                @error('address')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_card_photo">ID Card Photo (PNG, JPG, JPEG, max 2MB)</label>
                <input type="file" class="form-control-file" id="id_card_photo" name="id_card_photo" accept="image/png, image/jpeg" value="{{ old('id_card_photo') }}">
                @error('id_card_photo')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="desired_position">Desired Position</label>
                <select class="form-control" id="desired_position" name="desired_position" value="{{ old('desired_position') }}">
                    <option value="Junior Software Developer">Junior Software Developer</option>
                    <option value="Junior Web Designer">Junior Web Designer</option>
                    <option value="Junior Game Developer">Junior Game Developer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="desired_hourly_wage">Desired Hourly Wage ($2.50 - $99.99)</label>
                <input type="number" step="any" class="form-control" id="desired_hourly_wage" name="desired_hourly_wage" min="2.50" max="99.99" value="{{ old('desired_hourly_wage') }}">
                @error('desired_hourly_wage')
                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

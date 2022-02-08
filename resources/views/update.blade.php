<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
</head>
<body>
    




     <div>
        <form action="{{ route('donor-onUpdate') }}" method="post">
         @csrf
            <label for="full_name">Full Name</label>
                <input type="hidden" name="id" value="{{ $donor->id }}" />
                <input type="text" name="donor_name" value="{{ $donor->donor_name }}" />
                <label for="donor_email">Email</label>
                <input type="text" name="donor_email" value="{{ $donor->donor_email }}" />
                <label for="donor_address">Home Address</label>
                <input type="text" name="donor_address" value="{{ $donor->donor_address }}" />
                <label for="city">City</label>
                <input type="text" name="city" value="{{ $donor->city }}" />
                <label for="parish">Parish</label>
                <input type="text" name="parish" value="{{ $donor->parish }}" />
                <label for="donor_phoneno">Phone Nunmber</label>
                <input type="text" name="donor_phoneno" value="{{ $donor->donor_phoneno }}" />
                <button type="submit">Update</button>
        </form>
    </div>


</body>
</html>
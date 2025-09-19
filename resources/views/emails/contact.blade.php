<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
</head>
<body>
    <p> Hey i am {{ $contact->name }}</p>
    <p>With email {{ $contact->email }}</p>
    <p>I have message {{ $contact->message }}</p>
</body>
</html>
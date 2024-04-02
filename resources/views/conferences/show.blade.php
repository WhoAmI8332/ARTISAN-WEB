<!DOCTYPE html>
<html>

<head>
    <title>Conference Details</title>
    <link rel="stylesheet" href="{{ mix("css/app.css")}}">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ $conference->title }}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Author: {{ $conference->user }}</p>
                <p class="card-text">{{ $conference->description }}</p>
                <a href="/home" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</body>

</html>
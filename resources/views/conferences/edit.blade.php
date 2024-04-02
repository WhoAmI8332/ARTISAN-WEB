<!DOCTYPE html>
<html>

<head>
    <title>Edit a Conference</title>
    <link rel="stylesheet" href="{{ mix("css/app.css")}}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit a Conference</h2>
        <form action="/home/{{ $conference->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $conference->title }}" required>
            </div>
            <div class="form-group">
                <label for="user">User</label>
                <input type="text" class="form-control" id="user" name="user" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $conference->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="color" class="form-control form-control-color" id="color" name="color" value="{{ $conference->color }}" title="Choose your color">
            </div>
            <button type="submit" class="btn btn-primary">Update Conference</button>
        </form>
    </div>
    <script src="{{ mix("js/app.js")}}"></script>
</body>

</html>
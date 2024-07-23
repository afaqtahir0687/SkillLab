<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Skill Lab</title>
</head>

<body>
    @if(session()->has('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    <h1>Skill Lab</h1>
    <p>please click here to verify your email <a href="{{ $url }}">Click Here</a></p>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: none; /* Hide the body initially */
        }

        #overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
        }
    </style>
</head>
<body>

<div id="overlay">
    <p>Loading...</p>
</div>

<!-- Your existing HTML content goes here -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Display loading overlay
        var overlay = document.getElementById('overlay');
        overlay.style.display = 'flex';

        // Use setTimeout to delay the execution of the function
        setTimeout(function() {
            // Hide the overlay after 5 seconds
            overlay.style.display = 'none';
            // Show the body
            document.body.style.display = 'block';
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

</body>
</html>

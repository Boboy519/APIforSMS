<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS API</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>SMS API Example</h1>
    <form id="smsForm">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone">
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
        <input type="submit" value="Send SMS">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

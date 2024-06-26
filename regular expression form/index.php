<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('1.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            color : white;
           width:600px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            color: whitesmoke;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Validation</h1>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" id="website" name="website" required>
                <div id="website-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <div id="name-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <div id="email-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
                <div id="phone-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
                <div id="address-error" class="error"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
    document.querySelector('form').addEventListener('submit', function (e) {
        let isValid = true;
        const websitePattern = /^(https?:\/\/)?(www\.)?([a-zA-Z0-9]+(-?[a-zA-Z0-9])*\.)+[a-zA-Z]{2,}(\:[0-9]+)?(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
        const namePattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const phonePattern = /^(?:\+?88)?01[3-9]\d{8}$/;
        const addressPattern = /^(\d{1,4}\/\d{1,4}),\s*([\w\s-]+),\s*([\w\s-]+),\s*(\w+)(?:\s*-\s*(\d{4}))?$/;

        const website = document.getElementById('website').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;

        if (!websitePattern.test(website)) {
            isValid = false;
            document.getElementById('website-error').innerText = 'Invalid website URL';
        } else {
            document.getElementById('website-error').innerText = '';
        }

        if (!namePattern.test(name)) {
            isValid = false;
            document.getElementById('name-error').innerText = 'Invalid name format';
        } else {
            document.getElementById('name-error').innerText = '';
        }

        if (!emailPattern.test(email)) {
            isValid = false;
            document.getElementById('email-error').innerText = 'Invalid email address';
        } else {
            document.getElementById('email-error').innerText = '';
        }

        if (!phonePattern.test(phone)) {
            isValid = false;
            document.getElementById('phone-error').innerText = 'Invalid phone number';
        } else {
            document.getElementById('phone-error').innerText = '';
        }

        if (!addressPattern.test(address)) {
            isValid = false;
            document.getElementById('address-error').innerText = 'Invalid address format';
        } else {
            document.getElementById('address-error').innerText = '';
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
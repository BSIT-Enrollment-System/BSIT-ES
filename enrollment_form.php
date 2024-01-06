<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Enrollment Form</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your custom styles if needed -->

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .enrollment-wrapper {
            width: 100%;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            width: 100px;
            height: auto;
            margin: 0 auto; /* Center the logo */
            display: block;
        }

        .header span {
            font-size: 30px;
            font-weight: bold;
            color: darkorange;
        }

        .container {
            text-align: left;
        }

        .enrollment {
            color: darkorange;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: darkorange;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: gray;
        }

        .enrollment-message {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="enrollment-wrapper">
        <div class="header">
            <img src="bsitlogo.png" alt="Logo">
            <span>BSIT Enrollment System</span>
        </div>

        <div class="container" id="enrollmentContainer">
            <h2 class="enrollment">User Enrollment</h2>
            <form id="enrollmentForm">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="contactNumber">Contact Number:</label>
                <input type="tel" id="contactNumber" name="contactNumber" placeholder="Enter your contact number" required>

                <label for="dateOfBirth">Date of Birth:</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" required>

                <label for="program">Program:</label>
                <select id="program" name="program" required>
                    <option value="bsit">BSIT</option>
                    <!-- Add more program options as needed -->
                </select>

                <button type="button" onclick="submitEnrollment()">Submit</button>

                <p id="enrollmentMessage" class="enrollment-message"></p>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // You can add your custom JavaScript functions here, e.g., to handle form submission

        function submitEnrollment() {
            // Add logic to handle form submission, e.g., sending data to the server or storing in a database
            // You can use AJAX or fetch API to send data asynchronously
            // Display a success message or handle errors accordingly
            const enrollmentMessage = document.getElementById("enrollmentMessage");
            enrollmentMessage.textContent = "Enrollment submitted successfully!";
            enrollmentMessage.style.color = "green";
            clearEnrollmentForm();
        }

        function clearEnrollmentForm() {
            // Add logic to clear the form fields after submission
            document.getElementById("fullName").value = "";
            document.getElementById("email").value = "";
            document.getElementById("contactNumber").value = "";
            document.getElementById("program").value = "bsit"; // Set default program value
        }
    </script>
</body>

</html>

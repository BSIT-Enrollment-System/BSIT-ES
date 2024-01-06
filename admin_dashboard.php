<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your custom styles if needed -->

    <style>
        /* Add your custom styles here */
        /* Reset some default styles */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }
    
        body {  
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('background.jpg'); /* Update the URL */
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
    
        /* Common styles for header */
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
    
        /* Common styles for container */
        .container {
            text-align: left;
        }
    
        /* Common styles for forms */
        form {
            display: flex;
            flex-direction: column;
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
    
        /* Common styles for messages */
        .enrollment-message {
            margin-top: 10px;
            font-weight: bold;
        }
    
        /* Specific styles for enrollment form */
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
    
        .enrollment {
            color: darkorange;
        }
    
        /* Specific styles for admin dashboard */
        .admin-dashboard-wrapper {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    
        .admin-dashboard {
            color: darkorange;
        }
    
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
    
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    
        th {
            background-color: darkorange;
            color: white;
        }
    </style>
    
</head>

<body>

    <div class="admin-dashboard-wrapper">
        <div class="header">
            <img src="bsitlogo.png" alt="Logo">
            <span>BSIT Admin Dashboard</span>
        </div>

        <div class="container" id="adminDashboardContainer">
            <h2 class="admin-dashboard">Admin Dashboard</h2>

            <!-- Table to display user enrollment data -->
            <table id="enrollmentTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Program</th>
                    </tr>
                </thead>
                <tbody id="enrollmentDataBody">
                    <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Fetch enrollment data when the page loads
        $(document).ready(function () {
            fetchEnrollmentData();
        });

        function fetchEnrollmentData() {
            // Example endpoint URL, replace it with your actual server endpoint
            const endpoint = "https://your-server-endpoint.com/enrollmentData";

            // Fetch enrollment data from the server
            $.ajax({
                type: "GET",
                url: endpoint,
                success: function (data) {
                    // Populate the table with the fetched data
                    populateEnrollmentTable(data);
                },
                error: function (error) {
                    console.error("Error fetching enrollment data:", error);
                }
            });
        }

        function populateEnrollmentTable(data) {
            const enrollmentDataBody = document.getElementById("enrollmentDataBody");

            // Clear existing table data
            enrollmentDataBody.innerHTML = "";

            // Populate the table with the fetched data
            data.forEach((enrollment) => {
                const row = document.createElement("tr");

                const fullNameCell = document.createElement("td");
                fullNameCell.textContent = enrollment.fullName;
                row.appendChild(fullNameCell);

                const emailCell = document.createElement("td");
                emailCell.textContent = enrollment.email;
                row.appendChild(emailCell);

                const contactNumberCell = document.createElement("td");
                contactNumberCell.textContent = enrollment.contactNumber;
                row.appendChild(contactNumberCell);

                const dateOfBirthCell = document.createElement("td");
                dateOfBirthCell.textContent = enrollment.dateOfBirth;
                row.appendChild(dateOfBirthCell);

                const ageCell = document.createElement("td");
                ageCell.textContent = enrollment.age;
                row.appendChild(ageCell);

                const programCell = document.createElement("td");
                programCell.textContent = enrollment.program;
                row.appendChild(programCell);

                enrollmentDataBody.appendChild(row);
            });
        }
    </script>
</body>

</html>

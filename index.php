<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore-compat.js"></script>
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

        .container {
            opacity: .8;
            background-color: #fff;
            margin-top: 100px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background: #f5f5f5 url('your-avatar-image.jpg') no-repeat center center;
            background-size: 20px;
        }

        button {
            background-color: darkorange;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: gray;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }

        #adminContainer,
        #userContainer {
            display: none;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        a {
            color: gray;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .login {
            margin-top: 80px;
            color: darkorange;
        }

        .user-switch {
            color: darkorange;
            margin-top: 15px;
            text-align: center;
            display: flex;
            align-items: center;
        }

        .user-switch label {
            color: darkorange;
            text-align: left;
            margin-bottom: 10px;
            margin-right: 10px;
            font-weight: bold;
            display: block;
        }

        .user-switch select {
            width: 30%;
            padding: 0px;
            border: none;
            background-color: transparent;
        }

        .header {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            color: darkorange;
            display: flex;
            align-items: center;
            flex-direction: column; /* Center elements vertically */
            text-align: center; /* Center text */
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 10px; /* Add space between logo and text */
        }

        .user {
            margin-right: 300px;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="header">
            <img src="bsitlogo.png" alt="Logo" class="logo">
            <span style="font-size: 30px; font-weight: bold;">BSIT Parsers Enrollment System</span>
        </div>

        <div class="container" id="loginContainer">
            <h2 class="login">Login</h2>
            <form id="loginForm">
                <!-- Add the avatar inside the input box -->
                <div style="position: relative;">
                    <label class="user" for="username"> Username:</label>
                    <input type="text" id="username" name="username" placeholder="enter username" required>
                    <div style="position: absolute; top: -80px; left: 60px; transform: translateY(-50%);">
                        <img src="parsers.png" alt="Avatar" style="width: 150px; height: 70px; border-radius: 50%;">
                    </div>
                </div>
                <!-- End of avatar input box -->

                <!-- Label and input for password -->
                <label class="user" for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="enter password" required>

                <!-- Login button moved above the user switch dropdown -->
                <button type="button" onclick="login()">Login</button>

                <!-- Move the user switch dropdown next to the "Log in as" label -->
                <div class="user-switch">
                    <label for="userType">Log in as:</label>
                    <select id="userType" name="userType">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <p id="errorMessage" class="error-message"></p>

                <!-- Registration link -->
                <div class="user-switch">
                    <p>Don't have an account? <a href="register.html" onclick="register()">Register</a></p>
                </div>
            </form>
        </div>

        <div class="container" id="adminContainer">
            <h2>Welcome, Admin!</h2>
            <p>This is the admin page content.</p>
            <a href="#" onclick="logout()">Logout</a>
        </div>

        <div class="container" id="userContainer">
            <h2>Welcome, User!</h2>
            <p>This is the user page content.</p>
            <a href="#" onclick="logout()">Logout</a>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
                apiKey: "AIzaSyDOG6s-1VrYmBNM5V4dJ5Oef_4Hcgk_DL0",
                authDomain: "sia-final-6a744.firebaseapp.com",
                projectId: "sia-final-6a744",
                storageBucket: "sia-final-6a744.appspot.com",
                messagingSenderId: "414032202245",
                appId: "1:414032202245:web:639f49f25e1075c083aa6c",
                measurementId: "G-25SVBVKHC9"
            };

            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);

            var db = firebase.firestore();

            const adminCredentials = {
                username: "admin",
                password: "admin",
            };

            const userCredentials = {
                username: "user",
                password: "user",
            };

            function login() {
                const usernameInput = document.getElementById("username").value;
                const passwordInput = document.getElementById("password").value;
                const userType = document.getElementById("userType").value;
                const errorMessage = document.getElementById("errorMessage");
                const loginContainer = document.getElementById("loginContainer");
                const adminContainer = document.getElementById("adminContainer");
                const userContainer = document.getElementById("userContainer");

                const usersCollection = db.collection("users");

                usersCollection.doc(usernameInput).get().then((doc) => {
                    if (doc.exists) {
                        const userData = doc.data();
                        if (userData.password === passwordInput && userData.userType === userType) {
                            // Successful login
                            loginContainer.style.display = "none";
                            if (userType === "admin") {
                                adminContainer.style.display = "block";
                            } else if (userType === "user") {
                                userContainer.style.display = "block";
                            }
                        } else {
                            errorMessage.textContent = "Invalid username or password";
                        }
                    } else {
                        errorMessage.textContent = "User not found";
                    }
                }).catch((error) => {
                    console.error("Error getting user document:", error);
                    errorMessage.textContent = "Error getting user data";
                });
            }

            function register() {
                const usernameInput = document.getElementById("username").value;
                const passwordInput = document.getElementById("password").value;
                const userType = document.getElementById("userType").value;
                const errorMessage = document.getElementById("errorMessage");
                const registrationContainer = document.getElementById("registrationContainer");

                const usersCollection = db.collection("users");

                // Check if the username already exists
                getDoc(doc(usersCollection, usernameInput)).then((docSnapshot) => {
                    if (docSnapshot.exists()) {
                        // User already exists
                        errorMessage.textContent = "Username already exists";
                    } else {
                        // Register the user
                        setDoc(doc(usersCollection, usernameInput), {
                            username: usernameInput,
                            password: passwordInput,
                            userType: userType,
                        }).then(() => {
                            // Registration successful
                            registrationContainer.style.display = "none";
                            if (userType === "admin") {
                                document.getElementById("adminContainer").style.display = "block";
                                document.getElementById("adminWelcome").textContent = Welcome, ${usernameInput}!;
                            } else if (userType === "user") {
                                document.getElementById("userContainer").style.display = "block";
                                document.getElementById("userWelcome").textContent = Welcome, ${usernameInput}!;
                            }
                            clearForm();
                        }).catch((error) => {
                            console.error("Error registering user:", error);
                            errorMessage.textContent = "Error registering user";
                        });
                    }
                }).catch((error) => {
                    console.error("Error checking username existence:", error);
                    errorMessage.textContent = "Error checking username existence";
                });
            }

            function showLogin() {
                // Switch to the login container
                document.getElementById("loginContainer").style.display = "block";
                document.getElementById("registrationContainer").style.display = "none";
                clearForm();
            }

            function clearForm() {
                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
                document.getElementById("userType").value = "user";
                document.getElementById("errorMessage").textContent = "";
            }

            function logout() {
                // Redirect to the login page using window.location.replace
                window.location.replace("file:///C:/Users/Yandey/Desktop/yays/index.html");
            }
        </script>
        <script src="index.js"></script>

</body>

</html>
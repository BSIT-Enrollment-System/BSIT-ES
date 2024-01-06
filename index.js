// In your login.html script section after initializing Firebase
const db = firebase.firestore();

// Add a collection called 'users' with a document
db.collection("admin").doc("admin").set({
    username: "admin",
    password: "admin",
    userType: "admin"
});

db.collection("users").doc("user").set({
    username: "user",
    password: "user",
    userType: "user"
});



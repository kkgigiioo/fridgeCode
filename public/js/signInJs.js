// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyDmWjRTN2Z621-LE04YNc3gCB-DyEOsKvQ",
    authDomain: "fridgecodemobileapp.firebaseapp.com",
    databaseURL: "https://fridgecodemobileapp.firebaseio.com",
    projectId: "fridgecodemobileapp",
    storageBucket: "fridgecodemobileapp.appspot.com",
    messagingSenderId: "362659499973",
    appId: "1:362659499973:web:2704d19759d8d88c1ec5ac"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

function signIn(){
    var email = document.getElementsByName("loginUsername");
    var pass = document.getElementsByName("loginPass");
    var userId = auth.currentUser.uid;

    const promise = auth.signInWithEmailAndPassword(email[0].value, pass[0].value);
    promise.catch(e => alert(e.message));
    
    alert("Signed In    " + userId);
    
    $.ajax({
        url: "/app/Controllers/FirebaseController.php",
        method: "post",
        data: { auid : userId},
        success: function(res) {
            console.log(res);
        }
    })
}

function signOut(){
    auth.signOut();
}
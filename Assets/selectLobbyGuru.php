<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'programmingblock');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch lobbies assigned to the logged-in player
$username = $_SESSION['username'];
$lobbies = [];

$sql = "SELECT l.Lobby_ID, l.Lobby_Name
        FROM lobby l
        INNER JOIN lobby_data ld ON l.Lobby_ID = ld.Lobby_ID
        INNER JOIN player p ON ld.Player_ID = p.Player_ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $lobbies[] = $row;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Lobby - ProgrammingBlock.IO</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background: #54C373;
            font-family: 'Inter', sans-serif;
        }

        .decorative-block {
            width: 100%;
            height: 80px;
            background-color: #83CFFA;
            margin-bottom: 20px;
        }

        .title {
             font-size: 2rem;
            font-weight: 900;
            margin-bottom: 20px;
            margin-top: 30px;
            color: #030303;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group label {
            margin-right: 10px;
            white-space: nowrap;
            font-weight: bold;
            font-style: italic;
        }

        .input-group input {
            border-radius: 5px;
            padding: 8px;
            margin-right: 10px;
            box-sizing: border-box;
        }

        .lobby-list {
            border-radius: 5px;
            background-color: white;
            padding: 20px;
            outline: thin solid black;
            width: 640px;
            height: 320px; /* Fixed height for the lobby list */
            overflow-y: auto; /* Add scrollbar if content exceeds height */
        }
        .join-button {
            display: inline-block;
            padding: 10px 30px;
            background-color: #F1FF4F;
            color: black;
            text-align: center;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            outline: thin solid black;

        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            padding: 0 20px;
            margin-top: 10px
        }

        .button-container button {
            display: inline-block;
            padding: 0px 15px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            outline: thin solid black;
            transform: skewX(-20deg);
        }

        .button-container button p {
            transform: skewX(20deg);
        }

        .back-button {
            background-color: #C354A4;
            color: black;
        }

        .select-button {
            background-color: #00FF1A;
            color: black;
        }
        .create-button{
            background-color:#F1FF4F ;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        .popup-content {
            margin-bottom: 20px;
            align-items: center;
            width: 420px;
            text-align: center;
        }

        .popup-content-name{
            background-color: #0EC5FF;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
        }
        .popup-content-by{
            background-color: #FFEB35;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
        }
        .popup-content-desc{
            background-color: #C489FF;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
        }

        .popup-content button{
            display: inline-block;
            padding: 10px 30px;
            background-color: #3FD25C;
            color: black;
            text-align: center;
            font-style: italic;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            outline: thin solid black;
            margin-top: 10px;
        }
         .popup-create-content-name{
            background-color: #0EC5FF;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
            width: 80%;
            height: 20px;
            font-weight: bold;
        }
        .popup-create-content-by{
            background-color: #FFEB35;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
            width: 80%;
            font-weight: bold;
            height: 20px;
        }
        .popup-create-content-desc{
            background-color: #C489FF;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            outline: thin solid black;
            width: 80%;
            font-weight: bold;
            height: 70px;
        }
        .popup-create-lobby{
            margin-bottom: 20px;
            align-items: center;
            width: 420px;
            text-align: center;
            display: flex;
            flex-direction: column;
            float: left;
        }

    </style>
</head>

<body>
    <div class="decorative-block">
        <div class="title">Select Lobby</div>
    </div>
    <div class="container">
        <br>
    </div>

    <div class="lobby-list">
    <?php
        if (count($lobbies) > 0) {
            foreach ($lobbies as $lobby) {
                echo '<form method="POST" action="lobbyGuru.php">';
                echo '<input type="hidden" name="lobbyID" value="' . htmlspecialchars($lobby['Lobby_ID']) . '">';
                echo '<button type="submit" class="lobby-button">' . htmlspecialchars($lobby['Lobby_Name']) . '</button>';
                echo '</form>';
            }
        } else {
            echo "<p>No lobbies found.</p>";
        }
        ?>
    </div>

    <div class="button-container">
        <button id="back" class="back-button"><p>Back</p></button>
        <button class="create-button" onclick="togglePopup('create-lobby-popup')">Create</button>
        
    </div>

    <!-- Popup -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Join Lobby</h2>
            <!-- CHANGE TO PHP LATER--> 
            <div class="popup-content-name"><p>Name: Sample Lobby</p></div>
            <div class="popup-content-by"><p>Created by: User123</p></div>
            <div class="popup-content-desc"><p>Other details...</p></div>

            
        </div>
    </div>
    <div class="popup" id="create-lobby-popup">
        <div class="popup-content">
            <h2>Create Lobby</h2>
                <input type="text" name="lobbyName" id="lobbyName" placeholder="Name : " class="popup-create-content-name">
                <input type="text" name="creatorName" id="creatorName"  placeholder="Created By : " class="popup-create-content-by">
                <input type="text" name="desc" id="desc" placeholder="Desc : " class="popup-create-content-desc">
                <div><button type="submit" id="create">Create</button></div>
        </div>
    </div>

    <div class="overlay" id="overlay" onclick="togglePopup(null)"></div>

    <script>
        function togglePopup(id) {
            var popup;
            if (id) {
                popup = document.getElementById(id);
            } else {
                var popups = document.querySelectorAll('.popup');
                popups.forEach(p => {
                    if (p.style.display === 'block') {
                        p.style.display = 'none';
                    }
                });
            }
            var overlay = document.getElementById("overlay");

            if (popup && popup.style.display === "block") {
                popup.style.display = "none";
                overlay.style.display = "none";
            } else if (popup) {
                popup.style.display = "block";
                overlay.style.display = "block";
            } else {
                overlay.style.display = "none";
            }
        }

        function redirectToLobby(lobbyPage) {
        window.location.href = "lobbyGuru.php";
    }

        function selectLobby(button) {
            var lobbyName = button.value;
            // Fetch lobby details from PHP to display
            var popupContent = document.querySelector('.popup-content');
            popupContent.innerHTML = '<h2>Lobby Details</h2><p>Name: ' + lobbyName + '</p>';
        }

        function createLobby(button){}

        function joinLobby() {
            window.location.href = 'lobbyGuru.html';
        }
        document.getElementById('create').addEventListener('click', function() {
                window.location.href = 'lobbyGuru.php'; // Redirect to login.php
            });
            document.getElementById('back').addEventListener('click', function() {
                window.location.href = 'lobbyGuru.php'; // Redirect to login.php
            });
    </script>
</body>
</html>
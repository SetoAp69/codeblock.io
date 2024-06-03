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

    </style>
</head>

<body>
    <div class="decorative-block">
        <div class="title">Select Lobby</div>
    </div>
    <div class="container">
        <form method="POST" action="">
            <div class="input-group">
                <label for="lobbyID">Join by Lobby ID: </label>
                <input type="text" id="lobbyID" name="lobbyID" required pattern="[0-9]+">
                <button type="submit" name="join_lobby" class="join-button">Join</button>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['join_lobby'])) {
        $lobbyID = $_POST['lobbyID'];
        //tes cek search id
        echo "<p>Test purpose, ID: $lobbyID</p>";
    }
    ?>

    <div class="lobby-list">
        <?php
        // placeholder CHANGE TO PHP LATER
        $lobbies = array("Lobby 1", "Lobby 2", "Lobby 3", "Lobby 4", "Lobby 5");

        // Loop lobbies array and generate list items
        foreach ($lobbies as $lobby) {
            echo '<div><button type="submit" name="selected_lobby" value="' . $lobby . '">' . $lobby . '</button></div>';
        }
        ?>
    </div>

    <div class="button-container">
        <button class="back-button"><p>Back</p></button>
        <button class="select-button" onclick="togglePopup()"><p>Select</p></button>
    </div>

    <!-- Popup -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Join Lobby</h2>
            <!-- CHANGE TO PHP LATER--> 
            <div class="popup-content-name"><p>Name: Sample Lobby</p></div>
            <div class="popup-content-by"><p>Created by: User123</p></div>
            <div class="popup-content-desc"><p>Other details...</p></div>
            <div><button onclick="joinLobby()">Join</button></div>
        </div>
    </div>

    <div class="overlay" id="overlay" onclick="togglePopup()"></div>

    <script>
        function togglePopup() {
            var popup = document.getElementById("popup");
            var overlay = document.getElementById("overlay");
            if (popup.style.display === "block") {
                popup.style.display = "none";
                overlay.style.display = "none";
            } else {
                popup.style.display = "block";
                overlay.style.display = "block";
            }
        }

        function selectLobby(button) {
            var lobbyName = button.value;
            // Fetch lobby details from PHP to display
            var popupContent = document.querySelector('.popup-content');
            popupContent.innerHTML = '<h2>Lobby Details</h2><p>Name: ' + lobbyName + '</p>';
        }

        function joinLobby() {
            // web pop up
            alert("Joining lobby...");
        }
    </script>
</body>
</html>

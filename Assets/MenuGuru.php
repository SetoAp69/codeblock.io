<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ProgrammingBlock.IO</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #54C373;
            font-family: 'Inter', sans-serif;
            position: relative;
        }

        .container {
            width: 400px; /* Fixed width */
            max-width: 100%; /* Limit maximum width to prevent scaling */
            background: rgba(215, 255, 214,0.5);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 1, 1, 1);
            text-align: center;
            z-index: 1;
            position: relative;
        }

        .title {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 20px;
            color: #030303;
            position: absolute;
            top: 10px;
            text-align: center;
            width: 100%; /* Full width */
        }

        .button-group {
            margin-top: 50px;
        }

        .button {
            display: block;
            width: 200px;
            padding: 15px 0;
            margin: 20px auto;
            background: #87E2FF;
            border: 2px solid black;
            border-radius: 18px;
            font-size: 1.5rem;
            font-style: italic;
            font-weight: 500;
            color: black;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .sign-out-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px 20px;
            background: #FF3F3F;
            border: 2px solid black;
            border-radius: 8px;
            font-size: 1rem;
            font-style: italic;
            font-weight: 500;
            color: black;
            cursor: pointer;
            text-decoration: none;
        }
        .decorative-block {
            width: 100%;
            height: 80px;
            background: #83CFFA;
            position: absolute;
            z-index: 0;
            top:0px;
            text-align: center;
        }


    </style>
</head>
<body>
    <div class="decorative-block">
        <div class="title">ProgrammingBlock.IO</div>
    </div>

    <div class="container">
        <div class="button-group">
            <a href="selectLobbyGuru.php" class="button">Select Lobby</a>
            <a href="aboutGuru.php" class="button">About</a>
        </div>
    </div>

    <a href="logout.php" class="sign-out-button">Sign Out</a>
</body>
</html>

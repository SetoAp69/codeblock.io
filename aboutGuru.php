<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ProgrammingBlock.IO</title>
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
            top:10px
        }
        .input-group {
            margin: 15px 0;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-size: 1.25rem;
            font-style: italic;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 1rem;
            border-radius: 12px;
            border: 2px solid black;
            outline: none;
        }
        .input-group input::placeholder {
            color: rgba(0, 0, 0, 0.5);
            font-style: italic;
        }
        .submit-button {
            display: inline-block;
            padding: 15px 30px;
            background: #87E2FF;
            border: 2px solid black;
            border-radius: 18px;
            font-size: 1.5rem;
            font-style: italic;
            font-weight: 500;
            color: black;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }
        .register-link {
            display: block;
            margin-top: 20px;
            font-size: 1rem;
            font-weight: 800;
            color: #0248B1;
            text-decoration: none;
        }
        .decorative-block {
            width: 100%;
            height: 80px;
            background: #83CFFA;
            position: absolute;
            z-index: 0;
            top:0px;
        }
        
        .block2 {
            left: 50%;
            transform: translateX(-50%);
            top: 30px;
        }
        .block3 {
            right: 10px;
            top: 50px;
        }
        .middle-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 1, 1, 1);
            text-align: center;
            z-index: 2;
        }
        .middle-container-text {
            font-size: 1.5rem;
            color: black;
        }
        .bottom-left-button {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: #C354A4;
            border: 2px solid black;
            border-radius: 12px;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-style: italic;
            font-weight: 500;
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="decorative-block"></div>
    <!-- <div class="decorative-block block2"></div>
    <div class="decorative-block block3"></div> -->
    <div class="title">ProgrammingBlock.IO</div>

    <div class="middle-container">
        <div class="middle-container-text">CodeBlock IO is a groundbreaking educational platform that transforms the learning experience for both educators and students. With its gamified approach, teachers can create engaging virtual environments complete with lobbies, stages, and customized rewards and penalties, fostering a dynamic atmosphere for learning programming and computational thinking. Through interactive elements like button clicks for basic movements, students embark on a journey of exploration and discovery, honing their coding skills in an immersive and enjoyable way. Join us at CodeBlock IO and revolutionize the way you learn and teach programming!</div>
    </div>

    <div class="bottom-left-button" id="back">Back</div>

    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'menuGuru.php'; // Redirect to menu.php
        });
    </script>
</body>
</html>


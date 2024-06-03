<?php
    include("conn.php");
    $stageID = 1;
    $query = "SELECT * FROM Stage WHERE stageID = $stageID";
    $result = mysqli_query($conn, $query);
    $stageData = mysqli_fetch_assoc($result);

    // Fetch map texture based on the mapID associated with the stage
    $mapID = $stageData['mapID'];
    $mapQuery = "SELECT mapTexture FROM Map WHERE mapID = $mapID";
    $mapResult = mysqli_query($conn, $mapQuery);
    $mapData = mysqli_fetch_assoc($mapResult);

    // Fetch objects on stage
    $objectQuery = "SELECT o.*, os.isObjective, os.position_x, os.position_y FROM object AS o INNER JOIN object_on_stage AS os ON o.object_id = os.Object_ID WHERE os.StageID = $stageID";
    $objectResult = mysqli_query($conn, $objectQuery);
    $objects = array();
    while ($row = mysqli_fetch_assoc($objectResult)) {
        // Calculate relative coordinates to the center of the map
        
        $objects[] = $row;
        
    }
    // echo '<pre>';
    // print_r($objects);
    // echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Game Title</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: #FFFFFF;
            overflow: hidden;
        }

        .StageMasukGame {
            width: 100%;
            height: 1024px;
            position: relative;
            background: white;
            display: flex;
        }

        .section1 {
            width: 50%;
            height: 53%;
            background: #54C373;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 50px;
            overflow: hidden;
        }

        .section2 {
            width: 50%;
            height: 53%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 50px;
            overflow: hidden;
        }

        .back-button {
            width: 100px;
            height: 40px;
            background: #C354A4;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 18px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            margin-bottom: 20px;
            margin-left: 20px;
            margin-top: -20px;
            cursor: pointer;
            align-self: flex-start;
            font-weight: 600;
            border: 2px black solid;
        }

        .gameplay-container {
            width: 90%;
            background: #828282;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            height: 300px;
        }

        .movement-container {
            width: 90%;
            background: #83CFFA;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .gameplay-container h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .movement-container h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .gameplay-content {
            /* Add styling for gameplay content here */
            color: black;
            font-size: 18px;
        }

        .block-container {
            width: 90%;
            background: #C3EBC7;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: -20px;
            color: #378412;
            font-size: 24px;
        }

        .run-btn {
            width: 200px;
            height: 50px;
            background: #46DDDD;
            border: 2px solid #007B8C;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFF7F7;
            font-size: 24px;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            margin-top: auto;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .divider {
            width: 90%;
            height: 2px;
            background-color: rgb(255, 255, 255);
            margin-bottom: 20px;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Ensuring it appears above other content */
        }

        .popup {
            width: 800px; /* Adjusted width */
            height: 500px; /* Adjusted height */
            position: relative;
            background: white;
            border-radius: 12px;
            border: 2px black solid;
        }

        .popup .Gameplay {
            left: 110px;
            top: 200px; /* Adjusted position */
            position: absolute;
            color: rgba(255, 255, 255, 0.25);
            font-size: 24px;
            font-family: Inter;
            font-weight: 700;
            word-wrap: break-word;
        }

        .popup .Stars {
            width: 329px;
            height: 72px;
            left: 235px; /* Adjusted position */
            top: 50px; /* Adjusted position */
            position: absolute;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 12px;
            display: inline-flex;
        }

        .popup .Star {
            width: 56.20px;
            height: 200px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            display: inline-flex;
        }

        .popup .Star img {
            width: 56.20px;
            height: 72px;
        }

        .popup .Congratulations {
            width: 435px;
            left: 230px; /* Adjusted position */
            top: 10px; /* Adjusted position */
            position: absolute;
            color: black;
            font-size: 50px;
            font-family: Inter;
            font-weight: 900;
            word-wrap: break-word;
        }

        .popup .Group21 {
            width: 176.50px;
            height: 63px;
            position: absolute;
        }

        .popup .Group21:nth-child(2) {
            left: 20px; /* Adjusted position */
            top: 430px; /* Adjusted position */
        }

        .popup .Group21:nth-child(3) {
            left: 600px; /* Adjusted position */
            top: 430px; /* Adjusted position */
        }

        .popup .Rewards {
            left: 140px; /* Adjusted position */
            top: 250px; /* Adjusted position */
            position: absolute;
            color: black;
            font-size: 50px;
            font-family: Inter;
            font-weight: 900;
            word-wrap: break-word;
        }

        .popup .Rectangle20 {
            width: 300px; /* Adjusted size */
            height: 100px; /* Adjusted size */
            left: 400px; /* Adjusted position */
            top: 230px; /* Adjusted position */
            position: absolute;
            background: #4719FF;
            border-radius: 12px;
            border: 2px black solid;
        }

        .popup img.HonkaiStarRailJingliuCard11 {
            width: 230px; /* Adjusted size */
            height: 80px; /* Adjusted size */
            left: 435px; /* Adjusted position */
            top: 245px; /* Adjusted position */
            position: absolute;
        }

        .popup .btn {
            width: 176.50px;
            height: 63px;
            background: #C354A4; /* Back button default background */
            border-radius: 15px;
            border: 3px black solid;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 24px;
            font-family: Inter;
            font-weight: 400;
            cursor: pointer;
            position: absolute;
        }

        .popup .btn.next {
            background: #00FF1A; /* Next button background */
            left: 675px; /* Adjusted position */
            top: 430px; /* Adjusted position */
            width: 100px;
            height: 50px;

        }

        .popup .btn.back {
            left: 20px; /* Adjusted position */
            top: 430px; /* Adjusted position */
            width: 100px;
            height: 50px;
        }
        .popup-container1 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Ensuring it appears above other content */
        }
        .object{
            position: absolute;
            
            width: 50px;
            height: 50px;
            z-index: 1; /* Ensure the overlay image appears above the map */
        }
        .player{
            position: absolute;
            margin-top: 250px;
            width: 50px;
            height: 50px;
            z-index: 1; /* Ensure the overlay image appears above the map */
        }
        .map-image {
            position: relative;
            width: 500px;
            height: 300px;
        }
        .map-container{
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .input-container label {
            margin-right: 10px;
        }

        .input-container select,
        .input-container input[type="number"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="StageMasukGame">
        <div class="section1">
            <div id="back" class="back-button">Back</div>
            <div class="gameplay-container">
                <div class="gameplay-content">
                    <div class="map-container"> <!-- Container for the map -->
                        <?php
                            // Calculate the center point of the map
                            $mapWidth = 500; // Update with the actual width of your map image
                            $mapHeight = 300; // Update with the actual height of your map image
                            $centerX = $mapWidth / 2;
                            $centerY = $mapHeight / 2;
                        ?>
                        <img class="map-image" src="Assets/map/<?php echo $mapID; ?>.png" alt="Map Texture"  >
                        <?php
                            // Display objects on the map
                            foreach ($objects as $object) {
                                // Calculate absolute position of each object
                                $objectPositionX = $object['position_x'] + $centerX; // Adjusting to center
                                $objectPositionY = $object['position_y'] + $centerY; // Adjusting to center
                        ?>
                                <img class="object" src="Assets/object/<?php echo $object['Object_ID']; ?>.png" 
                                    style="position: absolute; top: <?php echo $objectPositionY; ?>px; left: <?php echo $objectPositionX; ?>px;" 
                                    alt="<?php echo $object['Object_name']; ?>">
                        <?php
                            }
                        ?>

                        <img class="player" src="Assets/player.png">
                        
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="movement-container">
                <h2>Block Movement</h2>
                <div class="input-container">
                    <label for="step">Step:</label>
                    <input type="number" id="step" name="step">
                    <label for="direction">Direction:</label>
                    <select id="direction" name="direction">
                        <option value="up">Up</option>
                        <option value="down">Down</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                    </select>
                </div>
                
            </div>

        </div>
        <div class="section2">
            <div class="block-container">Put Your Block Here !</div>
            <div class="run-btn" onclick="movePlayer()">RUN</div>
        </div>
    </div>


    <div class="popup-container">
        <div class="popup">
            <div class="Gameplay"></div>
            <div class="Stars">
                <div class="Star">
                    <img src="Assets/Icon/star.avif" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/star.avif" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/star.avif" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/star.avif" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/star.avif" alt="Star">
                </div>
            </div>
            <div class="Congratulations">Congratulations</div>
            <div class="Rewards">rewards :</div>
            <div class="Rectangle20"></div>
            <img class="HonkaiStarRailJingliuCard11" src="Assets/Icon/jingliu.jpg   " alt="Reward">
            <div class="btn back">Back</div>
            <div class="btn next">Next</div>
        </div>
    </div>

    <div class="popup-container1">
        <div class="popup">
            <div class="Gameplay"></div>
            <div class="Stars">
                <div class="Star">
                    <img src="Assets/Icon/graystar.png" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/graystar.png" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/graystar.png" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/graystar.png" alt="Star">
                </div>
                <div class="Star">
                    <img src="Assets/Icon/graystar.png" alt="Star">
                </div>
            </div>
            <div class="Congratulations">Failed!!</div>
            <div class="Rewards">Punishment :</div>
            <div class="Rectangle20"></div>
            <img class="HonkaiStarRailJingliuCard11" src="Assets/Icon/jingliu.jpg   " alt="Reward">
            <div class="btn back">Back</div>
            <div class="btn next">Next</div>
        </div>
</div>

<script>
    // Your existing JavaScript logic 
    
    function isCollision(elem1, elem2) {
    var rect1 = elem1.getBoundingClientRect();
    var rect2 = elem2.getBoundingClientRect();
    return !(
        rect1.top > rect2.bottom ||
        rect1.right < rect2.left ||
        rect1.bottom < rect2.top ||
        rect1.left > rect2.right
    );
    }
    var numberClicked=0;
    function movePlayer() {
    numberClicked++;
    var player = document.querySelector('.player');
    var stepCount = parseInt(document.getElementById('step').value) || 1; // Number of steps to move
    var direction = document.getElementById('direction').value; // Direction selected

    // Adjust the player's position based on the direction and step count
    for (var i = 0; i < stepCount; i++) {
        switch (direction) {
            case 'up':
                var currentMarginTop = parseInt(player.style.marginTop || '250');
                var newMarginTop = currentMarginTop - 20; // Decrease margin top by 20 pixels
                player.style.marginTop = newMarginTop + 'px';
                break;
            case 'down':
                var currentMarginTop = parseInt(player.style.marginTop || '250');
                var newMarginTop = currentMarginTop + 20; // Increase margin top by 20 pixels
                player.style.marginTop = newMarginTop + 'px';
                break;
            case 'left':
                var currentMarginLeft = parseInt(player.style.marginLeft || '250');
                var newMarginLeft = currentMarginLeft - 20; // Decrease margin left by 20 pixels
                player.style.marginLeft = newMarginLeft + 'px';
                break;
            case 'right':
                var currentMarginLeft = parseInt(player.style.marginLeft || '250');
                var newMarginLeft = currentMarginLeft + 20; // Increase margin left by 20 pixels
                player.style.marginLeft = newMarginLeft + 'px';
                break;
            default:
                break;
        }

        // Check for collision with each object
        var objects = document.querySelectorAll('.object');
        objects.forEach(function(object) {
            if (isCollision(player, object)) {
                console.log("Player hit object with "+numberClicked+" runs") 

                if(numberClicked>=5){
                    losePopUp();
                }
                else{
                    winPopUp();
                }
            }
        });
    }
}

    // Update event listeners to target buttons within the correct container
    document.querySelector('.popup-container .back').addEventListener('click', function() {
        document.querySelector('.popup-container').style.display = 'none';
        window.location.href = 'Lobby1.php';
    });

    document.querySelector('.popup-container .next').addEventListener('click', function() {
        document.querySelector('.popup-container').style.display = 'none';
        window.location.href = 'selectStage.php';
    });

    document.querySelector('.popup-container1 .back').addEventListener('click', function() {
        document.querySelector('.popup-container1').style.display = 'none';
        window.location.href = 'Lobby1.php';
    });

    document.querySelector('.popup-container1 .next').addEventListener('click', function() {
        document.querySelector('.popup-container1').style.display = 'none';
        window.location.href = 'selectStage.php';
    });

    function winPopUp() {
        document.querySelector('.popup-container').style.display = 'flex';
        document.querySelector('.popup-container1').style.display = 'none';
    }

    function losePopUp() {
        document.querySelector('.popup-container1').style.display = 'flex';
        document.querySelector('.popup-container').style.display = 'none';
    }

    // Update event listeners to close pop-ups
    document.querySelectorAll('.popup-container .btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            this.parentNode.parentNode.style.display = 'none';
        });
    });
    document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'selectStage.php'; // Redirect to menu.php
        });
    </script>
    </body>
    </html>
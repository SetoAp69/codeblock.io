<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stage - ProgrammingBlock.IO</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #54C373;
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        .back-button, .edit-button {
            position: absolute;
            top: 20px;
            padding: 10px 20px;
            background-color: #C354A4;
            color: black;
            border: 2px solid white;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
            font-weight: bold;
            z-index: 2;
        }

        .back-button {
            left: 20px;
        }

        .edit-button {
            right: 20px;
        }

        .stage-container {
            display: flex;
            justify-content: space-between;
            margin-top: 200px;

        }

        .stage {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stage-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            fill: #FFD233;
        }

        .stage-square {
            width: 80px;
            height: 80px;
            border: 2px solid #FFFFFF;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .stage-number, .stage-score {
            font-size: 0.8rem;
            color: black;
            font-weight: bold;
        }

        .stage-score {
            font-size: 0.6rem;
        }

        .stage.cleared .stage-square {
            background-color: #F9B0E0;
        }

        .stage.current .stage-square {
            background-color: #87E2FF;
        }

        .stage.failed .stage-square {
            background-color: #DD2366;
        }

        .stage.locked .stage-square {
            background-color: #DFDFDF;
        }

        .stage-icon img {
            width: 100%;
            height: 100%;
            fill:#FFD233;
        }

        .add-button{
            position: absolute;
            bottom: 50px;
            left: 50%;
            padding: 10px 20px;
            background-color: #00FF19;
            color: black;
            border: 2px solid white;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
            font-weight: bold;
            z-index: 2;
            transform: translateX(-50%);
        }

        /* Popup styles */
        .popup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0; /* Initially hidden */
            pointer-events: none; /* Disable pointer events */
            transition: opacity 0.3s ease; /* Smooth transition */
        }

            .popup {
        width: 300px; /* Adjust as needed */
        height: 400px; /* Adjust as needed */
        max-width: 80%; /* Limiting the maximum width */
        background: white;
        border-radius: 12px;
        padding: 20px;
        border: 2px solid black;
        text-align: center;
    }

        /* Show popup when container is active */
        .popup-container.active {
            opacity: 1;
            pointer-events: auto;
        }
        #close:hover,
        #custom:hover,
        #template:hover  {
        cursor: pointer; /* Change cursor to pointer on hover */
    }

    .button-container {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
        }

        .add-button {
            padding: 10px 20px;
            background-color: rgba(0, 255, 25, 0.3); /* Transparent green color */
            color: black;
            border: 2px solid white;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
            bottom: -10px;
            font-weight: bold;
            margin-left: 10px; /* Adjust space between button and text */
        }

        .button-text {
            font-size: 16px; /* Adjust font size */ 
            margin-right: 195px;
        }
    </style>
</head>
<body>
    <div class="container">
        <button id="back" class="back-button">Back</button>
        <button id="edit" class="edit-button">
            <img src="Assets\Icon\pencil.svg" alt="Edit" style="width: 20px; height: 20px;">
        </button>

        <div class="stage-container">
            <div class="stage cleared">
                <div class="stage-square">
                    <div class="stage-number">1</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage cleared">
                <div class="stage-square">
                    <div class="stage-number">2</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage failed">
                <div class="stage-square">
                    <div class="stage-number">3</div>
                </div>
                <div class="stage-score">50</div>
            </div>

            <div class="stage current">
                <div class="stage-square">
                    <div class="stage-number">4</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for current stage -->
            </div>

            <div class="stage locked">
                <div class="stage-square">
                    <div class="stage-number">5</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for locked stage -->
            </div>
        </div>
    </div>

    <div class="button-container">
        <span class="button-text">Add New Stage :</span>
        <button class="add-button">Add</button>
    </div>

    <div class="popup-container" id="popup-container">
    <div class="Frame3" style="width: 480px; height: 415px; position: relative">
        <div class="Group2" style="width: 75.38px; height: 75.38px; left: 135px; top: 171px; position: absolute">
            <div class="Rectangle5" style="width: 75px; height: 75px; left: 0.76px; top: 0px; position: absolute; background: rgba(248.87, 176.41, 224.23, 0.20); border-radius: 15px; border: 2px white solid"></div>
            <div style="left: 34px; top: 30px; position: absolute; color: white; font-size: 12px; font-family: Inter; font-weight: 800; word-wrap: break-word">2</div>
        </div>
        <div class="Group6" style="width: 75.38px; height: 110.38px; left: 95px; top: 225.5px; position: absolute">
            <div class="Group2" style="width: 75.38px; height: 75.38px; left: 0px; top: 0px; position: absolute">
                <div class="Rectangle5" style="width: 75px; height: 75px; left: 0.76px; top: 0px; position: absolute; background: rgba(220.54, 34.83, 101.68, 0.20); border-radius: 15px; border: 2px white solid"></div>
                <div style="left: 34px; top: 30px; position: absolute; color: white; font-size: 12px; font-family: Inter; font-weight: 800; word-wrap: break-word">3<br/></div>
            </div>
            <div class="Text" style="left: 25px; top: 82.38px; position: absolute; color: white; font-size: 12px; font-family: Inter; font-weight: 800; word-wrap: break-word"><br/></div>
        </div>
        <div class="Rectangle20" style="width: 476px; height: 415px; left: 3px; top: 1px; position: absolute; background: white; border-radius: 7.5px; border: 2px black solid"></div>
        
        <div class="Rectangle20" style="width: 190px; height: 150px; left: 45px; top: 130px; position: absolute; background: #FF4C4C; border-radius: 7.5px; border: 2px black solid"></div>
        <div class="Rectangle21" style="width: 190px; height: 150px; left: 255px; top: 130px; position: absolute; background: #5158FF; border-radius: 7.5px; border: 2px black solid"></div>
        <div class="AddingNewStage" style="left: 150px; top: 26.5px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 900; word-wrap: break-word">Adding New Stage</div>
        <div class="SelectOptions" style="left: 177px; top: 101.5px; position: absolute; color: black; font-size: 18px; font-family: Inter; font-weight: 900; word-wrap: break-word">Select Options</div>
        
    <div id="custom">
    <div class="CustomStage" style="left: 295px; top: 250px; position: absolute; color: black; font-size: 20px; font-family: Inter; font-weight: 500; word-wrap: break-word">Custom Stage</div>
        <div class="HeroiconsSolidTemplate" style="width: 102.25px; height: 96.5px; padding-left: 0px; padding-right: 0px; padding-top: 0px; padding-bottom: 0px; left: 300px; top: 150px; position: absolute; justify-content: center; align-items: center; display: inline-flex; background-image: url('Assets/Icon/wrench.png'); background-size: cover;">
            <div class="Vector" style="width: 100px; height: 93.34px;"></div>
        </div>
    </div>

    <div id="template">
        <div class="StageTemplate" style="left: 85px; top: 250px; position: absolute; color: black; font-size: 20px; font-family: Inter; font-weight: 500; word-wrap: break-word">Stage Template</div>
        <div class="ClarityWrenchSolid" style="width: 102.25px; height: 96.5px; left: 95px; top: 150px; position: absolute; background-image: url('Assets/Icon/template.png'); background-size: cover;">
            <div class="Vector" style="width: 91.12px; height: 85.01px;"></div>
        </div>
    </div>

    <div id="close" class="MaterialSymbolsClose" style="width: 51.5px; height: 41.5px; left: 420px; top: 7px; position: absolute;">
            <img src="Assets/Icon/close.png" alt="Close icon" style="width: 100%; height: 80%;">
    </div>



    </div>
</div>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Function to close the popup
    function closePopup() {
        document.getElementById("popup-container").classList.remove("active");
    }

    // Function to select the custom stage
    function selectCustomStage() {
        document.querySelector(".selected-option").innerText = "Selected Option: Custom Stage";
    }

    // Function to select the stage template
    function selectStageTemplate() {
        document.querySelector(".selected-option").innerText = "Selected Option: Stage Template";
    }

    // Get the add button
    var addButton = document.querySelector(".add-button");

    // Add click event listener to the add button
    addButton.addEventListener("click", function() {
        // Toggle the active class to show/hide the popup
        document.getElementById("popup-container").classList.toggle("active");
    });
});
    document.getElementById('custom').addEventListener('click', function() {
        window.location.href = 'StageEdit1.php';
    });

    document.getElementById('template').addEventListener('click', function() {
        window.location.href = 'editStage-selectTemplate.php';
    });

    document.getElementById('close').addEventListener('click', function() {
        document.getElementById("popup-container").classList.remove("active");
    });
    document.getElementById('back').addEventListener('click', function() {
        window.location.href = 'lobbyGuru.php';
    });
    document.getElementById('edit').addEventListener('click', function() {
        window.location.href = 'editStage-edited.php';
    });


    </script>
</body>
</html>

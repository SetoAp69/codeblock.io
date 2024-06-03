<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Your CSS goes here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .side-container-left {
            width: 40%;
            height: 100vh; /* Make sure it takes the full viewport height */
            background-color: #54C373;
            float: left;
        }
        .back-button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 75px;
            font-weight: bold;
            height: 30px;
            color: black;
            background-color: #C354A4;
            outline-width: 10px;
            border-color: black;
            border-style: solid;
            outline-color: black;
            border-radius: 10px;
            margin-top: 20px;
            margin-left: 20px;
            text-align: center;
            align-content: center;
        }
        body, button {
            font-family: 'Inter', sans-serif;
        }
        .container-sub {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 5px;
            height: 85%;
            align-items: center;
            align-content: center;
        }
        .scrollable-container {
            width: 80%;
            height: 90%;
            display: flex;
            background-color: #828282;
        }
        .side-container-right {
            display: flex;
            flex-direction: column; 
            justify-content: start; 
            align-items: center;
            width: 60%; 
            float: right;
            height: 100vh; 
            background-color: #fff; 
        }
        .title-container {
            display: flex;
            justify-content: center;
            background-color: #C3EBC7;
            width: 80%;
            height: 50px;
            margin-top: 10px;
            border-radius: 15px;
            text-align: center;
            align-content: center;
            align-items: center;
        }
        .title {
            font-weight: bold;
            font-size: 25px;
        }
        .table-container {
            width: 80%;
            height: 300px; 
            overflow-y: auto; 
            margin-top: 20px; 
        }
        .table {
            width: 100%;
            background-color: #C3EBC7; 
            border-collapse: collapse; 
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #ddd;
            font-weight: bold;
        }
        .next-button {
            margin-top: 20px; 
            width: 75px;
            height: 30px;
            background-color: #00FF19;
            color: black;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            cursor: pointer;
            border-style: solid;
        }/* Popup styles */
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
        #close2:hover,
        #close3:hover,
        #punish:hover,
        #reward:hover,
        #back:hover,
        #clickable-cell:hover  {
        cursor: pointer; /* Change cursor to pointer on hover */
    }
    .popup-container2 {
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
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.popup2 {
    width: 300px; /* Adjust as needed */
    height: 400px; /* Adjust as needed */
    max-width: 80%; /* Limiting the maximum width */
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 2px solid black;
    text-align: center;
}

/* Show popup2 when container is active */
.popup-container2.active {
    opacity: 1;
    pointer-events: auto;
}
.table2-container {
    width: 80%;
    height: 90%; /* Adjusted height to fit inside popup-container2 */
    overflow-y: auto;
    margin-top: 20px;
}

.table-container2 {
    position: relative; /* Set position to relative */
    z-index: 1; /* Ensure it appears above other elements */
    top: 60px;
    left: 50px;
    width: 80%;
    margin-top: 20px;
}

.Frame4 {
    position: relative; /* Set position to relative */
    z-index: 0; /* Lower the z-index so it appears below the table */
    width: 480px;
    height: 415px;
}

.table2 {
    width: 100%;
    background-color: #C3EBC7;
    border-collapse: collapse;
}

.table2 th,
.table2 td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

.table2 th {
    background-color: #ddd;
    font-weight: bold;
}
.popup-container3 {
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
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.popup3 {
    width: 300px; /* Adjust as needed */
    height: 400px; /* Adjust as needed */
    max-width: 80%; /* Limiting the maximum width */
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 2px solid black;
    text-align: center;
}

/* Show popup2 when container is active */
.popup-container3.active {
    opacity: 1;
    pointer-events: auto;
}
    </style>
</head>
<body>
    <div class="side-container-left">
        <div id="back" class="back-button"> Back </div>
        <div class="container-sub">
            <div class="scrollable-container"></div>
        </div>
    </div>
    <div class="side-container-right">
        <div class="title-container">
            <div class="title"> Select Preset Object </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tree</th>
                        <th>Rock</th>
                        <th>Water</th>
                        <th>Grass</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tree Data 1</td>
                        <td>Rock Data 1</td>
                        <td>Water Data 1</td>
                        <td>Grass Data 1</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    <tr>
                        <td>Tree Data 2</td>
                        <td>Rock Data 2</td>
                        <td>Water Data 2</td>
                        <td>Grass Data 2</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="next-button">Next</div>
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
        
    <div id="punish">
    <div class="CustomStage" style="left: 295px; top: 250px; position: absolute; color: black; font-size: 20px; font-family: Inter; font-weight: 500; word-wrap: break-word">Punishment</div>
        <div class="HeroiconsSolidTemplate" style="width: 102.25px; height: 96.5px; padding-left: 0px; padding-right: 0px; padding-top: 0px; padding-bottom: 0px; left: 300px; top: 150px; position: absolute; justify-content: center; align-items: center; display: inline-flex; background-image: url('Assets/Icon/punish.png'); background-size: cover;">
            <div class="Vector" style="width: 100px; height: 93.34px;"></div>
        </div>
    </div>

    <div id="reward">
        <div class="StageTemplate" style="left: 110px; top: 250px; position: absolute; color: black; font-size: 20px; font-family: Inter; font-weight: 500; word-wrap: break-word">Reward</div>
        <div class="ClarityWrenchSolid" style="width: 102.25px; height: 96.5px; left: 95px; top: 150px; position: absolute; background-image: url('Assets/Icon/reward.png'); background-size: cover;">
            <div class="Vector" style="width: 91.12px; height: 85.01px;"></div>
        </div>
    </div>

    <div id="close" class="MaterialSymbolsClose" style="width: 51.5px; height: 41.5px; left: 420px; top: 7px; position: absolute;">
            <img src="Assets/Icon/close.png" alt="Close icon" style="width: 100%; height: 80%;">
    </div>

    <div id="save" class="next-button" style="width: 51.5px; height: 41.5px; left: 400px; top: 340px; position: absolute;">
    <button style="width: 100%; height: 100%; background: none; border: none; cursor: pointer;">
        Save
    </button>
    </div>






    </div>
</div>

<div class="popup-container2" id="popup-container2">
        <div class="Frame4" style="width: 480px; height: 415px; position: relative">
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
            
            <div class="AddingNewStage" style="left: 140px; top: 26.5px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 900; word-wrap: break-word">Add Punishment</div>
            
            <div class="container-table">
                <div class="table-container2">
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Point</th>
                                <th>Item</th>
                                <th>Money</th>
                                <th>desc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="clickable-cell" class="clickable-cell">- 100 point</td>
                                <td id="clickable-cell"class="clickable-cell">Item Data 1</td>
                                <td id="clickable-cell"class="clickable-cell">- 100 money</td>
                                <td id="clickable-cell"class="clickable-cell">Pushup 10x</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="close2" class="MaterialSymbolsClose" style="width: 51.5px; height: 41.5px; left: 420px; top: 7px; position: absolute;">
                <img src="Assets/Icon/close.png" alt="Close icon" style="width: 100%; height: 80%;">
            </div>
        </div>
    </div>
</div>

<div class="popup-container3" id="popup-container3">
        <div class="Frame4" style="width: 480px; height: 415px; position: relative">
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
            
            <div class="AddingNewStage" style="left: 140px; top: 26.5px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 900; word-wrap: break-word">Add Reward</div>
            
            <div class="container-table">
                <div class="table-container2">
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Character</th>
                                <th>Item</th>
                                <th>Money</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="clickable-cell" class="clickable-cell">Character Data 1</td>
                                <td id="clickable-cell"class="clickable-cell">Item Data 1</td>
                                <td id="clickable-cell"class="clickable-cell">Money Data 1</td>
                                <td id="clickable-cell"class="clickable-cell">Point Data 1</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="close3" class="MaterialSymbolsClose" style="width: 51.5px; height: 41.5px; left: 420px; top: 7px; position: absolute;">
                <img src="Assets/Icon/close.png" alt="Close icon" style="width: 100%; height: 80%;">
            </div>
        </div>
    </div>
</div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    function closePopup() {
        document.getElementById("popup-container").classList.remove("active");
    }

    document.getElementById('back').addEventListener('click', function() {
        window.location.href = 'lobbyGuru.php';
    });

    document.getElementById('save').addEventListener('click', function() {
        window.location.href = 'lobbyGuru.php';
    });

    var nextButton = document.querySelector(".next-button");

    nextButton.addEventListener("click", function() {
        document.getElementById("popup-container").classList.toggle("active");
    });
    });

    document.getElementById('punish').addEventListener('click', function() {
        document.getElementById("popup-container2").classList.toggle("active");
        
    });

    document.getElementById('reward').addEventListener('click', function() {
        document.getElementById("popup-container3").classList.toggle("active");
        
    });

    document.getElementById('close').addEventListener('click', function() {
        document.getElementById("popup-container").classList.remove("active");
    });

    document.getElementById('close2').addEventListener('click', function() {
    document.getElementById("popup-container2").classList.remove("active");
});
    document.getElementById('close3').addEventListener('click', function() {
    document.getElementById("popup-container3").classList.remove("active");
    });
document.addEventListener("DOMContentLoaded", function() {
        var clickableCells = document.querySelectorAll(".clickable-cell");

        clickableCells.forEach(function(cell) {
            cell.addEventListener("click", function() {
                document.getElementById("popup-container2").classList.remove("active");
                document.getElementById("popup-container3").classList.remove("active");
            });
        });
    });
</script>
</html>

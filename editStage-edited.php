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

        .button-container {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            filter: blur(0.5px); /* Apply blur effect */
            cursor: pointer;
            cursor: auto;
        }

        .add-button {
            padding: 10px 20px;
            background-color: rgba(0, 255, 25, 0.3); /* Transparent green color */
            color: black;
            border: 2px solid white;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
            font-weight: bold;
            margin-left: 10px; /* Adjust space between button and text */
            filter: blur(0.5px); /* Apply blur effect */
            cursor: pointer;
            cursor: auto;
        }

        .button-text {
            font-size: 16px; /* Adjust font size */ 
            filter: blur(0.5px); /* Apply blur effect */
            cursor: pointer;
            cursor: auto;
        }

        #stage1:hover,#stage2:hover,#stage3:hover,#edit:hover,
        #clickable-cell:hover  {
        cursor: pointer; }

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
                <div class="stage-icon">
                    <img src="Assets\Icon\pencil.svg" alt="Edit" fill=#FFD233>
                </div>
                <div id="stage1" class="stage-square">
                    <div class="stage-number">1</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage cleared">
                <div class="stage-icon">
                    <img src="Assets\Icon\pencil.svg" alt="Edit">
                </div>
                <div id="stage2" class="stage-square">
                    <div class="stage-number">2</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage failed">
                <div class="stage-icon">
                    <img src="Assets\Icon\pencil.svg" alt="Edit">
                </div>
                <div id="stage3" class="stage-square">
                    <div class="stage-number">3</div>
                </div>
                <div class="stage-score">50</div>
            </div>

            <div class="stage current">
                <div class="stage-icon">
                    <img src="Assets\Icon\pencil.svg" alt="Edit">
                </div>
                <div class="stage-square">
                    <div class="stage-number">4</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for current stage -->
            </div>

            <div class="stage locked">
                <div class="stage-icon">
                    <img src="Assets\Icon\pencil.svg" alt="Edit">
                </div>
                <div class="stage-square">
                    <div class="stage-number">5</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for locked stage -->
            </div>
        </div>
    </div>


    <div class="button-container">
        <span class="button-text">Add New Stage</span>
        <button class="add-button">Add</button>
    </div>

    <script>
        document.getElementById('edit').addEventListener('click', function() {
        window.location.href = 'editStage.php';
        });
        document.getElementById('back').addEventListener('click', function() {
        window.location.href = 'lobbyGuru.php';
    });
    document.getElementById('stage1').addEventListener('click', function() {
        window.location.href = 'StageEdit1.php';
    });
    </script>
</body>
</html>

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
            margin-top: 100px;
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

        .add-button {
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

        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 80%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            z-index: 3;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .popup-title-container{
            width: 100%;
            height: 50px;
            
            display: flex;
            
            align-items: center;
        }
        .title{
            width: 90%; 
            display: flex;
            align-items: center;
            justify-content: center; 
            text-align: center;
            
            font-weight: bold;
            font-size: 25px;
        }
        .close-button{
            width: 40px;
            height: 40px;
            
            margin-left: 10px;
        }
        .template-container {
            margin-top: 30px;
            width: 100%;
            height: 60%;
            display: flex;
            justify-content: start;
            align-items: center;
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap; /* Prevent wrapping */
        }

        .template{
            width: 100px;
            height: 150px;
            
            margin-left: 20px;
        }
        .template-box{
            width: 100px;
            height: 100px;
            border-radius: 20px;
            border-style: solid;
            background-color: grey;
        }
        .template-title{
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }
        .next-button {
            position: absolute;
            bottom: 20px; /* Adjust as needed */
            left: 50%;
            padding: 10px 20px;
            background-color: #00FF19;
            color: black;
            border: 2px solid white;
            border-radius: 20px;
            cursor: pointer;
            outline: none;
            font-weight: bold;
            transform: translateX(-50%);
            z-index: 2;
        }
        .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust the transparency level as needed */
        backdrop-filter: blur(5px); /* Adjust the blur radius as needed */
        z-index: 1; /* Set a lower z-index to stay behind the popupContainer */
    }
    .container:not(.popup-container),
    .back-button,
    .edit-button {
        filter: blur(5px); /* Apply blur effect */
        opacity: 0.5; /* Set opacity to make them transparent */
    }
    #close:hover,
        #template1:hover,
        #clickable-cell:hover  {
        cursor: pointer; /* Change cursor to pointer on hover */
    }

    </style>
</head>
<body>
<div class="overlay">
    <div class="container">
        <button class="back-button">Back</button>
        <button class="edit-button">
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
    </div>
    
    <div class="popup-container" id="popup-container" style="display: block;">
        <div class="popup-title-container">
            <div class="title">Select Template</div>
            <div class="close-button">
                <img src="Assets/Icon/x.svg" alt="" style="width:50px;heigth:50px">
            </div>
        </div>
        <div class="template-container">
            <div id="template1" class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title"> Template 3</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title"> Template 3</div>
            </div>

            <div class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title">Template</div>
            </div>
            <div class="template">
                <div class="template-box"></div>
                <div class="template-title"> Template 3</div>
            </div>

        </div>
        <div class="next-button" >
            Next
        </div>
    </div>

    <button class="add-button">Add</button>

    <script>
        const addButton = document.querySelector('.add-button');
        const popupContainer = document.querySelector('.popup-container');
        const closeButton = document.querySelector('.close-button');

        addButton.addEventListener('click', () => {
            popupContainer.style.display = 'block';
            overlay.style.display = 'block'; // Show the overlay
        });

        closeButton.addEventListener('click', () => {
            popupContainer.style.display = 'none';
            overlay.style.display = 'none'; // Hide the overlay
        });

        document.getElementById('template1').addEventListener('click', function() {
        window.location.href = 'StageEdit1.php';
         });
        
    </script>
</body>
</html>

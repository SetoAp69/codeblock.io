<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage - ProgrammingBlock.IO</title>
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

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button">Back</button>

        <div class="stage-container">
            <div class="stage cleared">
                <div class="stage-icon">
                    <img src="Assets\Icon\flag.svg" alt="Flag">
                </div>
                <div class="stage-square">
                    <div class="stage-number">1</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage cleared">
                <div class="stage-icon">
                    <img src="Assets\Icon\flag.svg" alt="Flag">
                </div>
                <div class="stage-square">
                    <div class="stage-number">2</div>
                </div>
                <div class="stage-score">100</div>
            </div>

            <div class="stage failed">
                <div class="stage-icon">
                    <img src="Assets\Icon\flag.svg" alt="Flag">
                </div>
                <div class="stage-square">
                    <div class="stage-number">3</div>
                </div>
                <div class="stage-score">50</div>
            </div>

            <div class="stage current">
                <div class="stage-icon">
                    <img src="Assets\Icon\flag.svg" alt="Flag">
                </div>
                <div class="stage-square">
                    <div class="stage-number">4</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for current stage -->
            </div>

            <div class="stage locked">
                <div class="stage-icon">
                    <img src="Assets\Icon\lock.svg" alt="Lock">
                </div>
                <div class="stage-square">
                    <div class="stage-number">5</div>
                </div>
                <div class="stage-score">-</div> <!-- Placeholder for locked stage -->
            </div>
        </div>
    </div>
</body>
</html>

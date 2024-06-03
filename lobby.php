<?php
  include('conn.php');
  
// Check if 'lobbyID' is set in the POST request
if (isset($_POST['lobbyID'])) {
  $lobby_id = $_POST['lobbyID'];

  // Fetch lobby data
  $sql = "SELECT Lobby_Name, 'Desc' FROM Lobby WHERE Lobby_ID = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $lobby_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $lobby_name = "";
  $desc = "";

  if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
          $lobby_name = $row["Lobby_Name"];
          $desc = $row["Desc"];
      }
  } else {
      echo "0 results";
  }
  $stmt->close();
} else {
  echo "Lobby ID not specified.";
  exit;
}

$conn->close();



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ProgrammingGame</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");

      * {
        color: #000;
        font-family: "Inter", sans-serif;
        margin: 0;
      }
      body {
        background-color: #54c373;
      }
      .container-lobby {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .heading {
        margin-top: 72px;
        margin-bottom: 48px;
        width: 960px;
        height: 104px;
        background-color: #83cffa;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.24);
      }
      .heading h2 {
        font-size: 48px;
      }
      .body-container {
        display: flex;
        justify-content: space-between;
        width: 1240px;
      }
      .description {
        padding: 16px;
        box-sizing: border-box;
        background-color: #b8ffcc;
        width: 300px;
        border-radius: 8px;
      }
      .tittle-block {
        padding-bottom: 12px;
        margin-bottom: 12px;
        text-align: center;
        border-bottom: 2px solid black;
      }
      .button-option {
        padding: 20px 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .button-option .button {
        padding: 12px 8px;
        width: 720px;
        text-align: start;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        cursor: pointer;
      }
      .button.select-stage {
        background-color: #db60aa;
        text-decoration: underline #db60aa;
      }
      .button.sanbox {
        background-color: #cec834;
        text-decoration: underline #cec834;
      }
      .button.leaderboard {
        background-color: #f89a72;
        text-decoration: underline #f89a72;
      }
      .button.select-stage:hover {
        background-color: #b94c8c;
      }
      .button.sanbox:hover {
        background-color: #b0a32e;
      }
      .button.leaderboard:hover {
        background-color: #e08163;
      }
      .button p {
        margin-left: 32px;
        font-size: 32px;
        font-weight: bold;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container-lobby">
        <div class="heading">
            <h2 class="heading-name"><?php echo htmlspecialchars($lobby_name); ?></h2>
        </div>
        <div class="body-container">
            <div class="description">
                <p class="tittle-block">Lobby Description</p>
                <p class="the-desc">
                    <?php echo nl2br(htmlspecialchars($desc)); ?>
                </p>
            </div>
            <div class="button-option">
                <a href="selectStage.php?stageID=<?php echo $lobby_id; ?>">
                    <button class="select-stage button">
                        <svg
                            width="104"
                            height="76"
                            viewBox="0 0 123 106"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M76.1069 70.2652V79.0286C76.1069 90.3217 85.2618 99.4765 96.5548 99.4765C107.848 99.4765 117.003 90.3217 117.003 79.0286V38.1328"
                                stroke="white"
                                stroke-width="12"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M46.8979 70.2652V79.0286C46.8979 90.3217 37.7431 99.4765 26.45 99.4765C15.157 99.4765 6.00213 90.3217 6.00213 79.0286V38.1328"
                                stroke="white"
                                stroke-width="12"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M84.8705 6H38.1324C20.3862 6 6 20.3862 6 38.1324C6 55.8787 20.3862 70.2649 38.1324 70.2649H84.8705C102.617 70.2649 117.003 55.8787 117.003 38.1324C117.003 20.3862 102.617 6 84.8705 6Z"
                                fill="#2F88FF"
                                stroke="white"
                                stroke-width="12"
                            />
                            <path
                                d="M52.7382 38.1328H29.3691"
                                stroke="white"
                                stroke-width="12"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M41.0537 26.4482V49.8173"
                                stroke="white"
                                stroke-width="12"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M96.5551 32.2905C96.5551 29.0639 93.9395 26.4482 90.7129 26.4482C87.4863 26.4482 84.8706 29.0639 84.8706 32.2905C84.8706 35.5171 87.4863 38.1328 90.7129 38.1328C93.9395 38.1328 96.5551 35.5171 96.5551 32.2905Z"
                                fill="white"
                            />
                            <path
                                d="M84.8706 46.896C84.8706 43.6694 82.2549 41.0537 79.0283 41.0537C75.8017 41.0537 73.186 43.6694 73.186 46.896C73.186 50.1226 75.8017 52.7382 79.0283 52.7382C82.2549 52.7382 84.8706 50.1226 84.8706 46.896Z"
                                fill="white"
                            />
                        </svg>
                        <p>Select Stage</p>
                    </button>
                </a>
                <a href="#">
                    <button class="sanbox button">
                        <svg
                            width="104"
                            height="76"
                            viewBox="0 0 130 130"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M67.2852 7.76014V24.7399L84.2646 16.25L67.2852 7.76014ZM62.7149 22.5515L40.1784 34.375V60.7141L62.7149 72.6877L85.2513 60.7141V34.375L62.7149 22.5515ZM91.2509 20.1053V37.8527L112.5 49.8808V89.7728L79.8192 107.168V125.915L127.5 100.143V37.8527L91.2509 20.1053ZM34.8761 20.1053L3.05176e-05 37.8527V100.143L47.8057 125.915V107.168L15.1249 89.7728V49.8808L34.8761 37.8527V20.1053ZM67.2852 77.2727L47.25 66.2825V48.5351L39.0356 53.1251V68.3928L67.2852 83.7601L95.5347 68.3928V53.1251L87.3203 48.5351V66.2825L67.2852 77.2727Z"
                                fill="white"
                            />
                        </svg>
                        <p>Sanbox</p>
                    </button>
                </a>
                <a href="#">
                    <button class="leaderboard button">
                        <svg
                            width="104"
                            height="76"
                            viewBox="0 0 100 100"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M78 6H68C66.9391 6 65.9217 6.42143 65.1716 7.17157C64.4214 7.92172 64 8.93913 64 10V88C64 89.0609 64.4214 90.0783 65.1716 90.8284C65.9217 91.5786 66.9391 92 68 92H78C79.0609 92 80.0783 91.5786 80.8284 90.8284C81.5786 90.0783 82 89.0609 82 88V10C82 8.93913 81.5786 7.92172 80.8284 7.17157C80.0783 6.42143 79.0609 6 78 6ZM58 28H48C46.9391 28 45.9217 28.4214 45.1716 29.1716C44.4214 29.9217 44 30.9391 44 32V88C44 89.0609 44.4214 90.0783 45.1716 90.8284C45.9217 91.5786 46.9391 92 48 92H58C59.0609 92 60.0783 91.5786 60.8284 90.8284C61.5786 90.0783 62 89.0609 62 88V32C62 30.9391 61.5786 29.9217 60.8284 29.1716C60.0783 28.4214 59.0609 28 58 28ZM38 56H28C26.9391 56 25.9217 56.4214 25.1716 57.1716C24.4214 57.9217 24 58.9391 24 60V88C24 89.0609 24.4214 90.0783 25.1716 90.8284C25.9217 91.5786 26.9391 92 28 92H38C39.0609 92 40.0783 91.5786 40.8284 90.8284C41.5786 90.0783 42 89.0609 42 88V60C42 58.9391 41.5786 57.9217 40.8284 57.1716C40.0783 56.4214 39.0609 56 38 56Z"
                                fill="white"
                            />
                        </svg>
                        <p>Leaderboard</p>
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>

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
        margin-top: 10px;
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
        margin-bottom: 10px;
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
    <div class="container-lobby">
      <div class="heading">
        <h2 class="heading-name">Lobby's Name</h2>
      </div>
      <div class="body-container">
        <div class="description">
          <p class="tittle-block">Lobby Description</p>
          <p class="the-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusm
          </p>
        </div>
        <div class="button-option">
          <a href="selectStage.php">
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
          <a href="sanboxgameplay.php">
            <button class="sanbox button">
              <svg
                width="104"
                height="76"
                viewBox="0 0 130 130"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M67.2852 7.76014V24.7399L84.2646 16.25L67.2852 7.76014ZM62.7149 22.6264C57.1292 22.764 51.6428 23.4031 47.0387 24.4979C47.5922 24.8619 47.9505 25.3361 48.0789 25.8746C48.1761 26.2848 48.1375 26.7229 47.9656 27.1638C47.7936 27.6047 47.4916 28.0398 47.0767 28.4442C46.6619 28.8486 46.1423 29.2145 45.5477 29.5209C44.9532 29.8272 44.2952 30.0682 43.6115 30.2298C42.9277 30.3915 42.2316 30.4708 41.5628 30.4631C40.894 30.4555 40.2657 30.3611 39.7136 30.1853C39.1616 30.0096 38.6966 29.7559 38.3454 29.4387C37.9942 29.1216 37.7635 28.7472 37.6665 28.337C37.6602 28.3055 37.6547 28.2738 37.65 28.242C37.3364 28.4604 37.0396 28.6807 36.7801 28.9032C35.343 30.1351 34.7852 31.2305 34.7852 32.5C34.7852 33.7695 35.343 34.8649 36.7801 36.0968C38.2172 37.3288 40.5125 38.5171 43.3789 39.4725C49.1113 41.3834 57.0654 42.4024 65 42.4024C72.9346 42.4024 80.8887 41.3834 86.6211 39.4723C89.4875 38.5171 91.7825 37.3288 93.2199 36.0968C94.657 34.8649 95.2149 33.7695 95.2149 32.5C95.2149 31.2305 94.657 30.1351 93.2199 28.9032C91.7828 27.6712 89.4875 26.4829 86.6211 25.5275C84.4929 24.8181 82.0551 24.2343 79.429 23.7781L67.2852 29.8495V32.5H62.7149V22.6264ZM33.36 39.1645L27.5369 65.3669C27.6374 65.3629 27.7386 65.3608 27.8403 65.3606C28.3128 65.3654 28.7938 65.4107 29.2701 65.4951C29.9619 65.6176 30.6324 65.8207 31.2434 66.0927C31.8544 66.3647 32.3939 66.7003 32.8311 67.0804C33.2683 67.4605 33.5946 67.8777 33.7915 68.308C33.9883 68.7384 34.0518 69.1735 33.9783 69.5886C33.8297 70.4268 33.1323 71.1323 32.0396 71.5501C30.9468 71.9679 29.5481 72.0637 28.1511 71.8164C27.4796 71.697 26.828 71.5017 26.2316 71.241L18.8784 104.331C19.0105 104.325 19.1445 104.324 19.2801 104.327C20.0659 104.346 20.8928 104.495 21.6933 104.761C22.3599 104.983 22.9938 105.281 23.5587 105.639C24.1237 105.997 24.6086 106.408 24.9859 106.847C25.3632 107.287 25.6253 107.747 25.7575 108.201C25.8896 108.656 25.8891 109.096 25.756 109.496C25.623 109.896 25.36 110.248 24.982 110.533C24.6039 110.817 24.1183 111.029 23.5528 111.155C22.9873 111.281 22.3531 111.319 21.6862 111.267C21.0194 111.216 20.333 111.075 19.6663 110.853C19.2 110.697 18.7488 110.504 18.3254 110.279C18.6347 111.375 19.2494 112.404 20.1647 113.457C22.0942 115.677 25.5242 117.787 30.0082 119.484C35.6012 121.6 42.7736 123.093 50.5327 123.917C50.556 119.723 50.7351 113.654 52.1193 108.117C52.9318 104.868 54.1506 101.765 56.2075 99.3271C58.2641 96.8889 61.3184 95.2148 65 95.2148C68.6816 95.2148 71.7356 96.8891 73.7925 99.3269C74.5725 100.251 75.2314 101.272 75.7941 102.36C77.212 102.36 78.5714 102.699 79.5735 103.301C80.5756 103.903 81.1385 104.719 81.1385 105.569C81.1375 106.189 80.8378 106.795 80.2756 107.314C79.7134 107.834 78.9127 108.245 77.97 108.497C79.2695 113.93 79.4445 119.819 79.4673 123.917C87.2265 123.093 94.3988 121.6 99.9918 119.484C100.373 119.34 100.743 119.192 101.108 119.042C100.543 118.764 100.144 118.361 99.9459 117.868C99.789 117.476 99.7621 117.037 99.8668 116.576C99.9715 116.114 100.206 115.639 100.556 115.178C100.906 114.716 101.366 114.277 101.908 113.886C102.451 113.495 103.065 113.159 103.718 112.898C104.718 112.497 105.768 112.287 106.73 112.295C107.42 112.301 108.045 112.419 108.561 112.641C109.077 112.863 109.473 113.185 109.721 113.582C109.758 113.541 109.799 113.499 109.835 113.457C111.765 111.237 112.375 109.13 111.553 106.253L111.534 106.187L101.069 59.0921C100.579 59.2763 100.061 59.4178 99.5307 59.5118C98.1337 59.7592 96.7349 59.6634 95.6421 59.2456C94.5493 58.8278 93.8519 58.1222 93.7033 57.284C93.6298 56.869 93.6932 56.4338 93.89 56.0034C94.0868 55.573 94.4131 55.1559 94.8503 54.7757C95.2875 54.3956 95.827 54.0599 96.4381 53.7879C97.0491 53.5159 97.7197 53.3128 98.4115 53.1903C98.8501 53.114 99.2925 53.0708 99.7285 53.0618L96.64 39.1645C96.4946 39.3023 96.3459 39.4365 96.1942 39.5672C94.0766 41.3822 91.2938 42.7329 88.0664 43.8087C81.6113 45.9603 73.3154 46.9727 65 46.9727C63.554 46.9727 62.109 46.9397 60.6735 46.878C60.3904 47.5762 59.7249 48.1973 58.7837 48.6418C57.8424 49.0862 56.6798 49.3282 55.4821 49.3292C54.0633 49.3291 52.7026 48.9909 51.6994 48.389C50.6961 47.787 50.1325 46.9706 50.1325 46.1193C50.1326 46.0131 50.1414 45.907 50.1589 45.8014C47.2124 45.3025 44.4339 44.6421 41.9336 43.8087C38.7062 42.7329 35.9232 41.3822 33.8059 39.5672C33.6541 39.4365 33.5054 39.3023 33.36 39.1645ZM88.5582 79.2048C89.2608 79.2048 89.9565 79.2878 90.6056 79.4492C91.2547 79.6105 91.8444 79.8469 92.3412 80.145C92.838 80.4431 93.2321 80.797 93.5009 81.1865C93.7697 81.576 93.9081 81.9934 93.908 82.4149C93.908 83.2662 93.3444 84.0827 92.3411 84.6847C91.3378 85.2866 89.977 85.6248 88.5582 85.6248C87.1393 85.6248 85.7786 85.2866 84.7753 84.6847C83.772 84.0827 83.2084 83.2662 83.2084 82.4149C83.2083 81.9934 83.3467 81.576 83.6155 81.1865C83.8843 80.797 84.2784 80.4431 84.7752 80.145C85.2719 79.8469 85.8617 79.6105 86.5108 79.4492C87.1599 79.2878 87.8556 79.2048 88.5582 79.2048Z"
                  fill="black"
                />
              </svg>

              <p>Sandbox</p>
            </button>
          </a>
          <a href="leaderboard2.html">
            <button class="leaderboard button">
              <svg
                width="104"
                height="76"
                viewBox="0 0 89 77"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0.643311 0V11.0446H89V0H0.643311ZM0.643311 32.8024V43.847H89V32.8024H0.643311ZM0.643311 65.9362V76.9808H89V65.9362H0.643311Z"
                  fill="#FFFCFC"
                />
              </svg>

              <p>Leaderboard</p>
            </button>
          </a>
          <div class="bottom-left-button" id="back">Back</div>
        </div>

      </div>

    </div>



    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'menu.php'; // Redirect to menu.php
        });
    </script>

  </body>
</html>

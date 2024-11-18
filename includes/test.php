<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Night Sky with Moon and Moving Stars</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #000;
            height: 100%;
            width: 100%;
        }
        .sky {
            position: relative;
            width: 100%;
            height: 100vh;
            background: radial-gradient(circle at 50% 50%, #001d4f, #000);
            overflow: hidden;
        }
        .moon {
            position: absolute;
            top: 20%;
            left: 70%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, #fff, #ddd);
            border-radius: 50%;
            box-shadow: 0 0 50px #fff;
        }
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 10px white;
            animation: twinkle 2s infinite alternate;
        }
        @keyframes twinkle {
            0% {
                opacity: 0.5;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .stars {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .star {
            width: 2px;
            height: 2px;
        }
        @keyframes moveStars {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-2000px);
            }
        }
        .stars::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, transparent, rgba(255, 255, 255, 0.3) 50%);
            animation: moveStars 20s linear infinite;
        }
        .stars:nth-child(1) .star {
            animation-duration: 1.5s;
        }
        .stars:nth-child(2) .star {
            animation-duration: 2s;
        }
        .stars:nth-child(3) .star {
            animation-duration: 2.5s;
        }
    </style>
</head>
<body>
    <div class="sky">
        <div class="moon"></div>
        <div class="stars">
            <div class="star" style="top: 10%; left: 20%;"></div>
            <div class="star" style="top: 30%; left: 40%;"></div>
            <div class="star" style="top: 50%; left: 60%;"></div>
            <div class="star" style="top: 70%; left: 80%;"></div>
            <div class="star" style="top: 90%; left: 50%;"></div>
        </div>
        <div class="stars">
            <div class="star" style="top: 15%; left: 25%;"></div>
            <div class="star" style="top: 35%; left: 45%;"></div>
            <div class="star" style="top: 55%; left: 65%;"></div>
            <div class="star" style="top: 75%; left: 85%;"></div>
            <div class="star" style="top: 95%; left: 55%;"></div>
        </div>
        <div class="stars">
            <div class="star" style="top: 20%; left: 30%;"></div>
            <div class="star" style="top: 40%; left: 50%;"></div>
            <div class="star" style="top: 60%; left: 70%;"></div>
            <div class="star" style="top: 80%; left: 90%;"></div>
            <div class="star" style="top: 100%; left: 60%;"></div>
        </div>
    </div>
</body>
</html>

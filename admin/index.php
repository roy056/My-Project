<?php
session_start();
if(!isset($_SESSION['SESSION_EMAIL'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Nutrition Calculator</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <h1>Nutrition Calculator</h1>
    </header>
    <main>
        <section id="bmi">
            <h2>BMI Calculator</h2>
            <div>
                <label for="height">Height (cm):</label>
                <input type="number" id="height" placeholder="Enter your height" step="0.01">
            </div>
            <div>
                <label for "weight">Weight (kg):</label>
                <input type="number" id="weight" placeholder="Enter your weight" step="0.01">
            </div>
            <button id="calculateBMI">Calculate BMI</button>
            <p id="bmiResult"></p>
        </section>

        <section id="bmr">
            <h2>BMR Calculator</h2>
            <div>
                <label for="gender">Gender:</label>
                <select id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label for="age">Age (years):</label>
                <input type="number" id="age" placeholder="Enter your age">
            </div>
            <div>
                <label for="bmrWeight">Weight (kg):</label>
                <input type="number" id="bmrWeight" placeholder="Enter your weight" step="0.01">
            </div>
            <div>
                <label for="heightFeet">Height (feet):</label>
                <input type="number" id="heightFeet" placeholder="Feet">
            </div>
            <div>
                <label for="heightInches">Height (inches):</label>
                <input type="number" id="heightInches" placeholder="Inches">
            </div>
            <button id="calculateBMR">Calculate BMR</button>
            <p id="bmrResult"></p>
        </section>

        <section id="calorie">
            <h2>Required Calorie Calculator</h2>
            <div>
                <label for="activityLevel">Activity Level:</label>
                <select id="activityLevel">
                    <option value="sedentary">Sedentary</option>
                    <option value="lightlyActive">Lightly Active</option>
                    <option value="moderatelyActive">Moderately Active</option>
                    <option value="veryActive">Very Active</option>
                </select>
            </div>
            <button id="calculateCalories">Calculate Calories</button>
            <p id="calorieResult"></p>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>


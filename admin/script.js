document.getElementById("calculateBMI").addEventListener("click", calculateBMI);
document.getElementById("calculateBMR").addEventListener("click", calculateBMR);
document.getElementById("calculateCalories").addEventListener("click", calculateCalories);

function calculateBMI() {
    const height = parseFloat(document.getElementById("height").value);
    const weight = parseFloat(document.getElementById("weight").value);
    const bmi = (weight / ((height / 100) ** 2)).toFixed(2);
    document.getElementById("bmiResult").textContent = `Your BMI: ${bmi}`;
}

function calculateBMR() {
    const gender = document.getElementById("gender").value;
    const age = parseInt(document.getElementById("age").value);
    const weight = parseFloat(document.getElementById("bmrWeight").value);
    const heightFeet = parseInt(document.getElementById("heightFeet").value);
    const heightInches = parseInt(document.getElementById("heightInches").value);
    const heightInCm = ((heightFeet * 12 + heightInches) * 2.54).toFixed(2);

    let bmr = 0;
    if (gender === "male") {
        bmr = 88.362 + (13.397 * weight) + (4.799 * heightInCm) - (5.677 * age);
    } else if (gender === "female") {
        bmr = 447.593 + (9.247 * weight) + (3.098 * heightInCm) - (4.330 * age);
    }

    document.getElementById("bmrResult").textContent = `Your BMR: ${bmr.toFixed(2)} calories/day`;
}

function calculateCalories() {
    const bmr = parseFloat(document.getElementById("bmrResult").textContent.split(":")[1].trim());
    const activityLevel = document.getElementById("activityLevel").value;

    let calorieFactor = 1.2;
    if (activityLevel === "lightlyActive") calorieFactor = 1.375;
    else if (activityLevel === "moderatelyActive") calorieFactor = 1.55;
    else if (activityLevel === "veryActive") calorieFactor = 1.725;

    const calories = (bmr * calorieFactor).toFixed(2);

    document.getElementById("calorieResult").textContent = `Estimated Daily Calories: ${calories} calories`;
}

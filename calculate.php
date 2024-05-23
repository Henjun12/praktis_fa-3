<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
        }
        h1 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            -moz-appearance: textfield;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>GPA Calculator</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="course1">Course 1 Grade:</label>
                <input type="number" id="course1" name="course1" min="0" max="100" required>
            </div>
            <div class="form-group">
                <label for="course2">Course 2 Grade:</label>
                <input type="number" id="course2" name="course2" min="0" max="100" required>
            </div>
            <div class="form-group">
                <label for="course3">Course 3 Grade:</label>
                <input type="number" id="course3" name="course3" min="0" max="100" required>
            </div>
            <div class="form-group">
                <label for="course4">Course 4 Grade:</label>
                <input type="number" id="course4" name="course4" min="0" max="100" required>
            </div>
            <div class="form-group">
                <label for="course5">Course 5 Grade:</label>
                <input type="number" id="course5" name="course5" min="0" max="100" required>
            </div>
            <button type="submit" class="btn">Calculate GPA</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $grades = [
                $_POST["course1"],
                $_POST["course2"],
                $_POST["course3"],
                $_POST["course4"],
                $_POST["course5"]
            ];

            function getGradePoint($mark) {
                if ($mark >= 90) return 4.00;
                if ($mark >= 80) return 4.00;
                if ($mark >= 75) return 3.67;
                if ($mark >= 70) return 3.33;
                if ($mark >= 65) return 3.00;
                if ($mark >= 60) return 2.67;
                if ($mark >= 55) return 2.33;
                if ($mark >= 50) return 2.00;
                if ($mark >= 47) return 1.67;
                if ($mark >= 44) return 1.33;
                if ($mark >= 40) return 1.00;
                if ($mark >= 30) return 0.67;
                if ($mark >= 20) return 0.00;
                return 0.00;
            }

            $totalPoints = 0;
            foreach ($grades as $grade) {
                $totalPoints += getGradePoint($grade);
            }

            $gpa = $totalPoints / count($grades);
            echo "<div class='result'><h2>Your GPA: " . number_format($gpa, 2) . "</h2></div>";
        }
        ?>
    </div>
</body>
</html>

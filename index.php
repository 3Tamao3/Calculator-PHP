<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator - PHP</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #222;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        input[type="number"],
        select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 30px;
            border: 2px solid #444;
            background-color: #333;
            color: #f5f5f5;
            font-size: 18px;
            text-align: center;
        }

        button {
            padding: 10px;
            font-size: 18px;
            background-color: #ff5722;
            color: #ffffff;
            border: none;
            border-radius: 30px;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: darkorange;
        }

        .calc-result {
            position: absolute;
            margin-top: 350px;
            font-size: 20px;
            color: #ff5722;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num1" placeholder="Number">
        <select name="oper">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="multi">x</option>
            <option value="divi">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number">
        <button>Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $oper = htmlspecialchars($_POST["oper"]);

        $errors = false;

        if (empty($num1) || empty($num2)) {
            echo "<p>Enter Numbers</p>";
            $errors = true;
        }

        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "<p>Enter Numbers ONLY</p>";
        }

        if (!$errors) {
            $value = 0;
            switch ($oper) {
                case "add":
                    $value = $num1 + $num2;
                    break;
                case "sub":
                    $value = $num1 - $num2;
                    break;
                case "multi":
                    $value = $num1 * $num2;
                    break;
                case "divi":
                    $value = $num1 / $num2;
                    break;
                default:
                    echo "Error";
            }

            echo "<p class='calc-result'>Result = " . $value . "</p>";
        }
    }
    ?>

</body>

</html>
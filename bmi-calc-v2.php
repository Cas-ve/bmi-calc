<DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>body mass index</title>
  </head>

  <body>
    <?php
    function calculateBMI($gewicht, $lengte)
    {
      $bmi = $gewicht / ($lengte * $lengte);
      return $bmi;
    }

    function calculateWeightclass($bmi)
    {
      if ($bmi < 18.5) {
        return "ondergewicht";
      } elseif ($bmi >= 18.5 && $bmi < 25) {
        return "goed gewicht";
      } elseif ($bmi >= 25 && $bmi < 30) {
        return "matig overgewicht";
      } elseif ($bmi >= 30 && $bmi < 40) {
        return "ernstig overgewicht";
      } elseif ($bmi >= 40) {
        return "gevaarlijk overgewicht";
      }
    }

    ?>

    <form name="form" action="" method="get">
      <label for="gewicht">Gewicht</label>
      <input type="number" name="gewicht" id="gewicht" step="0.1" min="0">
      <label for="lengte">Lengte</label>
      <input type="number" name="lengte" id="lengte" step="0.01" min="0">
      <button type="submit" name="submit">berekenen</button>
    </form>

    <?php
    if (isset($_GET['gewicht'])) {
      $gewicht = $_GET['gewicht'];
    }

    if (isset($_GET['lengte'])) {
      $lengte = $_GET['lengte'];
    }

    if (isset($lengte) && isset($gewicht)) {
      $bmi = calculateBMI($gewicht, $lengte);
      $weightclass = calculateWeightclass($bmi);

      echo "<h1>BMI overzicht bij " . $lengte .  " m: </h1>";
      echo "<p>Uw BMI is : " . $bmi . ", u hebt " . $weightclass . "</p><hr><ul>";

      for ($x = 40; $x <= 150; $x += 10) {
        $bmiTemp = calculateBMI($x, $lengte);
        echo "<li> Bij een gewicht van " . $x . "kg hebt u een bmi van " . $bmiTemp . ", u hebt " . calculateWeightclass($bmiTemp) . ".</li>";
      }
      echo "</ul>";
    }
    ?>
  </body>

  </html>
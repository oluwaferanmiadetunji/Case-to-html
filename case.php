<?php
	include("config.php");
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM cases WHERE id=$id;";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
			$case_title = $row['case_title'];
			$year = $row['year'];
			$suit_number = $row['suit_number'];
			$date = $row['date'];
			$court = $row['court'];
			$judges = $row['judges'];
			$appellants = $row['appellants'];
			$respondents = $row['respondents'];
			$issue = $row['issue'];
		}
	}
	$currentDateStr = date('Y-m-d H-i-s');
	$oneYearOn = date('Y-m-d H-i-s',strtotime(date("Y-m-d", mktime()) . " + 366 day"));

    $uri = $_SERVER['REQUEST_URI'];;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $case_title ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
            .hide {
                display: none;
            }
        </style>
        <script type="text/javascript">
            function checkDevice() {
                var isMobile = {
                    Android: function() {
                        return navigator.userAgent.match(/Android/i);
                    },
                    BlackBerry: function() {
                        return navigator.userAgent.match(/BlackBerry/i);
                    },
                    iOS: function() {
                        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                    },
                    Opera: function() {
                        return navigator.userAgent.match(/Opera Mini/i);
                    },
                    Windows: function() {
                        return navigator.userAgent.match(/IEMobile/i);
                    },
                    any: function() {
                        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                    }
                };
                var win = window,
                    doc = document,
                    docElem = doc.documentElement,
                    body = doc.getElementsByTagName('body')[0],
                    x = win.innerWidth || docElem.clientWidth || body.clientWidth,
                    y = win.innerHeight|| docElem.clientHeight|| body.clientHeight;

                if(isMobile.iOS()) {
                    document.getElementById("android").className = "hide";
                    document.getElementById("computer").className = "hide";
                } else {
                    if(x > 560) {
                        document.getElementById("ios").className = "hide";
                        document.getElementById("android").className = "hide";
                    } else {
                        document.getElementById("ios").className = "hide";
                        document.getElementById("computer").className = "hide";
                    }

                }

            }
        </script>
	</head>
    <body style="color:black;background-color:white;font-size:20px;" onload="checkDevice()">
        <div style="width:100%;margin-left:auto;margin-right:auto;margin-top:40px;">
            <img  style="margin-left:47%;margin-right:47%;" src="http://www.funmiquadrionline.com/frn.jpg" alt="">
        </div>
        <hr>
        <div style="width:80%;height:auto;margin-left:auto;margin-right:auto;">
            <div style="width:100%;margin-left:auto;margin-right:auto;position:relative;">
                <h1 style="color:green;text-align:center;"><?php echo $case_title ;?></h1>
            </div>
            <div style="width:600px;margin-left:auto;margin-right:auto;margin-top:20px;">
                <hr><p style="color:#1F386E;text-align:center;font-size:25px;">In the <?php echo $court ;?></p><hr>
                <p style="color:#1F386E;text-align:center;">On <?php echo $date ;?></p><hr>
                <p style="color:#1F386E;text-align:center;"><?php echo $suit_number ;?></p><hr>
            </div>
            <div style="width:100%;margin-left:auto;margin-right:auto;margin-top:40px;">
                <p style="color:black;text-align:center;">Before Their Lordships</p>

                <?php
                    $all_judges = explode(",",$judges);
                    $arrayLength = count($all_judges);
                    $i = 0;
                    while ($i < $arrayLength)
                    {
                        echo "<p style='color:black;text-align:left;'>".$all_judges[$i] ." JSC</p>";
                        $i++;
                    }
                ?>
            </div>
            <div style="width:100%;text-align:center;color:#1F386E;">
                <p style="font-size:30px;">Between</p>
                <?php
                    $all_appellants = explode(",",$appellants);
                    $appellantsLength = count($all_appellants);
                    $i = 0;
                    while ($i < $appellantsLength)
                    {
                        echo "<p style='color:black;'>".$all_appellants[$i] ."</p>";
                        $i++;
                    }
                ?>
                <p style="font-size:30px;">And</p>
                <?php
                    $all_respondents = explode(",",$respondents);
                    $respondentsLength = count($all_respondents);
                    $i = 0;
                    while ($i < $respondentsLength)
                    {
                        echo "<p style='color:black;'>".$all_respondents[$i] ."</p>";
                        $i++;
                    }
                ?>
            </div>
        </div><hr>
        <div style="width:80%;margin-left:auto;margin-right:auto;">
            <h3>Issue:</h3>
            <p style="text-align:justify;font-size:18px;">
                <?php echo $issue ;?>
            </p>
			<div style="margin-right:auto;margin-left:auto;text-align:center;margin-bottom:30px;">
                <div id="android" class="">
                    <a href="https://play.google.com/store/apps/details?id=com.funmiquadrionline.elc">Read Full Judgement</a>
                </div>
                <div id="ios" class="">
                    <a href="#">Read Full Judgement</a>
                </div>
                <div id="computer" class="">
                    <a href="http://www.funmiquadrionline.com/search/home.html">Read Full Judgement</a>
                </div>
            </div>
        </div>

		<!-- Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto" style="font-size:14px;color:blue;">
              <span>Copyright &copy; Funmi Quadri &amp; Co Law Companion</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
    </body>
</html>

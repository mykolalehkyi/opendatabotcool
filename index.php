<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>OpenDataBot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="http://localhost/openchota/libs/jquery.js"></script>
    <script src="http://localhost/openchota/libs/popper.js"></script>
    <link rel="stylesheet" href="http://localhost/openchota/libs/bootstrap.css">
    <script src="http://localhost/openchota/libs/bootstrap.js"></script>
    <script defer src="http://localhost/openchota/libs/font-awesome.js"></script>
    <link rel="stylesheet" href="http://localhost/openchota/css/style.css">

</head>
<body class="bg-light">
  
  <?php 

    // $code = $_GET["code"];

    // $url = "https://opendatabot.com/api/v1/company/".$code."?apiKey=Nb78bSymFmFK";
    $url = "http://localhost/openchota/data.json";
    $json = json_decode(file_get_contents($url), true);



  ?>

  <br><br>
  <div class="container">
    <div class="card">
      <div class="card-header bg-dark text-light">
        <form action="" id="form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">#</div>
            </div>
            <input type="text" class="form-control" placeholder="Company Code" name="code">
          </div>  

          <button class="form-control btn btn-light" id="btn">Search</button>
        </form>
      </div>
      <div class="card-body">

        <ul>
        


        <?php 

// $styl=$arr[4 % $eigth]";
        $counter=0;
         $sty=array("p-3 mb-2 bg-primary text-white","p-3 mb-2 bg-secondary text-white","p-3 mb-2 bg-success text-white","p-3 mb-2 bg-danger text-white","p-3 mb-2 bg-warning text-dark","p-3 mb-2 bg-info text-white","p-3 mb-2 bg-light text-dark","p-3 mb-2 bg-dark text-white","p-3 mb-2 bg-white text-dark");

          function getData($arr, $i){  	
          	$ei=$i%8;
          //	$styl=$arr[$i % $eigth];
          	echo '<div class="';
          	echo ".col-";
          	echo '">';
            foreach ($arr as $key => $value) {
              if (is_array($value)) {
                if (strlen($key) < 3) {
                  getData($value, $i);
                }else{
                  echo '<b id="hidetype" onclick="function content'.$GLOBALS["counter"].'()">';
                  echo '<script type="text/javascript"> function content'.$GLOBALS["counter"].'(){$("#content'.$GLOBALS["counter"].'").toggle();} </script>';
                  echo "$key: Show click</b> <br>";
                  echo '<ul id="content'.$GLOBALS["counter"].'">';
                  $GLOBALS['counter']++;
                  // for ($j=0; $j < $i; $j++) { 
                  //   echo "- ";
                  // }
                  getData($value, $i + 1);
                  echo "</ul>";
                }
                
              }else{
                echo '<li>';
                // for ($j=0; $j < $i; $j++) { 
                //   echo "> ";
                // }
                echo "$key : $value";
                echo "</li>";
              }
            }
            echo '</div>';
          }

          getData($json, 0);

        ?>

        </ul>
        <script type="text/javascript">
    //     jQuery(document).ready(function(){
    //     jQuery('#hidetype').on('click', function(event) {        
    //          jQuery('#content').toggle('show');
    //     });
    // });
        </script>
      </div>
    </div>
  </div>

</body>
</html>
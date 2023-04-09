<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Web site created using PHP"
    />
    <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
    <!--
      manifest.json provides metadata used when your web app is installed on a
      user's mobile device or desktop. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
    <!--
      Notice the use of %PUBLIC_URL% in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.

      Unlike "/favicon.ico" or "favicon.ico", "%PUBLIC_URL%/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>Módulo PHP con Base de Datos MYSQL </title>
  </head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">PHP / Bases de Datos</h2>
                        <a href="create.php" class="btn btn-success pull-right">Agregar nuevo tema de desarrollo</a>
                    </div>
<?php
	$db_host='pdb22.awardspace.net';
	$db_user='3621316_albertosaenz';
	$db_pass='albSaenz23';
        $db_name='3621316_albertosaenz';
        
	$link=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (mysqli_connect($db_host, $db_user, $db_pass))
	{
		echo "Connected to $db_user! <hr> The database contains the following tables: <br />";
	} else {
		die(mysqli_error());
	}
	$showtablequery = "
		SHOW TABLES
		FROM
		$db_user
		";
	$showtablequery_result = mysqli_query($link,$showtablequery);
	
	while($showtablerow = mysqli_fetch_array($showtablequery_result))
	{
		echo $showtablerow[0]."<br \>";
	}
	
         $sql = "SELECT * FROM php01";
                    if($result = mysqli_query($link,$sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Titulo</th>";
                                        echo "<th>Descripción</th>";
                                        echo "<th>Fecha de creación</th>";
                                        echo "<th>Mantenimiento</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_temas'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['createdat'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id_temas'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id_temas'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id_temas'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
        
	mysqli_close($link);
	echo "<hr> Connection closed!";
?>
</div>
            </div>        
        </div>
    </div>
    <hr>
    <p style="text-align:right">Copyright ©AlbertoSaenzWebsite. All rights reserved.</p>
</body>
</html>
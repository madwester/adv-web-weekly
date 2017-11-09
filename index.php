<?php
include("includes/database.php");
if($connection){
    //echo "success!";     
    $query = "SELECT name,price, description FROM products";
    //run the query (prepare is a method of mysqli)
    $statement = $connection -> prepare($query);
    $statement -> execute();
    //get the result
    $result = $statement -> get_result();
}
else{
    echo "no connection";
}
?>
<!doctype html>
<html>
    <?php include("includes/head.php");
    ?>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">
                    Website name
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            </div>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
            if($result -> num_rows > 0){
                $counter = 0; //dont need to initialize in php. 
                //converting each row into an array
                while($row = $result -> fetch_assoc() ){
                    $name = $row["name"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $counter++;
                    if($counter == 1){
                        echo "<div class=\"row\">";
                    }
                    echo "<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12 column\">
                        <h3>$name</h3>
                        <h4 class=\"price\">$price</h4>
                        <p>$description</p>
                    </div>";
                    if($counter == 4){
                        echo "</div>";
                        $counter = 0;
                    }
                    //if you use double quotes php can recognize values
                    //echo "<p>Product Name is $name and price is $ $price</p>";
                }
            }
            else
            ?>
        </div>
        <script src="components/jquery/dist/jquery.js"></script>
        <script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="custom.js"></script>
    </body>
</html>
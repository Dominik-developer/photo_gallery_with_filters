<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo gallery</title>
    <meta name="author" content="Dominik Szczepański">
    <!--  link to repo: https://github.com/Dominik-developer/photo_gallery_with_filters-->

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <section>
        <h1> Photo galley</h1>
    <ul class="filter-menu">
            <li class="filter-option <?php echo !isset($_GET["filter"]) ? "active" : ""  ?>">

            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "cars" ? "active" : ""  ?>">
                <a href="?filter=cars">Cars</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "cats" ? "active" : ""  ?>">
                <a href="?filter=cats">Cats</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "cities" ? "active" : ""  ?>">
                <a href="?filter=cities">Cities</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "flowers" ? "active" : ""  ?>">
                <a href="?filter=flowers">Flowers</a>
            </li>
        </ul>
        <div class="gallery">
            <?php

            $categories = ["cars", "cats", "cities", "flowers"];
            $currentFilter = isset($_GET["filter"]) ? $_GET["filter"]: "all";

            $dir = $currentFilter; 

            if($_GET["filter"] == "all" || !isset($_GET["filter"]) ){

                echo '<h3>Select a photo category</h3>';


            }else{
                

                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {

                        
                        while (($file = readdir($dh)) !== false) {
                
                            if ($file != "." && $file != "..") {
                                echo '<div class="gallery-item" style="height: 200px; background-image: url(\'' . $currentFilter . '/' . $file . '\');"></div>';
                            }
                        }

                        closedir($dh);
                    }
                } else {
                    echo "Directory doesn't exist";
                }
            }
            ?>
        </div>
    </section>
    
</body>
</html>
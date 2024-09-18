<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo gallery</title>
    <meta name="author" content="Dominik Szczepański">

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <section>
        <h1> Photo galley</h1>
    <ul class="filter-menu">
            <li class="filter-option <?php echo !isset($_GET["filter"]) ? "active" : ""  ?>">
                <!--<a href="?">All</a>-->
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

            $dir = $currentFilter; #$_GET["filter"]; // Ścieżka do katalogu na podstawie linku URL

            if($_GET["filter"] == "all" || !isset($_GET["filter"]) ){


            }else{
                
                // Sprawdzanie, czy udało się otworzyć katalog
                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {

                        // Iterowanie po plikach i katalogach
                        while (($file = readdir($dh)) !== false) {
                
                            if ($file != "." && $file != "..") {
                                echo '<div class="gallery-item" style="height: 200px; background-image: url(\'' . $currentFilter . '/' . $file . '\');"></div>';
                            }
                        }
                        // Zamknięcie katalogu
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
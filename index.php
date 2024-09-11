<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos filter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section>
        <ul class="filter-menu">
            <li class="filter-option <?php echo !isset($_GET["filter"]) ? "active" : ""  ?>">
                <a href="?">All</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "city" ? "active" : ""  ?>">
                <a href="?filter=city">cities</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "car" ? "active" : ""  ?>">
                <a href="?filter=car">cars</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "nature" ? "active" : ""  ?>">
                <a href="?filter=nature">Nature</a>
            </li>
            <li class="filter-option <?php echo isset($_GET["filter"])
                && $_GET["filter"] == "electronics" ? "active" : ""  ?>">
                <a href="?filter=electronics">Electronics</a>
            </li>
        </ul>
        <div class="gallery">
            <?php
                $categories = ["city", "car", "nature", "electronics"];
                $totalImages =12;
                $currentFilter = isset($_GET["filter"]) ? $_GET["filter"]: "all";

                for ($i = 0; $i < $totalImages; $i++) {
                    $category = $categories[$i % count($categories)];

                    if ($currentFilter === "all" || $currentFilter === $category) {
                        //echo "<div style='background-image: url('photos/car/1.jpeg');'> Elo</div>";
                        
                        /*echo "<div style='height: 100px; 
                            background-image: url('photos/" .$category. "4.jpeg.webp');'>X</div>";*/
                        
                        /* style='background-image: url(https://source.unsplash.com/200x200/?
                            .$category.". "&" .rand(). ");'> x  */
    
                        echo '<div class="gallery-item" style="height: 200px; background-image: url(\'photos/' . $category . rand(1,4).'.jpeg\');"></div>';

                        
                    }
                }
                        //<img src="photos/car/4.jpeg.webp" alt="Opis zdjęcia">
                        
                        //<div style="height: 100px; background-image: url('photos/car/4.jpeg.webp');">X</div>

                        //echo "<div style='height: 100px; background-image: url('photos/" .$category. "4.jpeg.webp');'>X</div>";
                        //$category = 'city';
                        //echo '<div style="height: 100px; background-image: url(\'photos/' . $category . '1.jpeg\');">X</div>';
            ?>
        </div>
    </section>
    
</body>
</html>
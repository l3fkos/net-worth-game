<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');

// get DOM from URL or file
$html = file_get_html('https://www.celebritynetworth.com/list/top-50-singers/');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celebrity_net_worth";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    echo "Connection failed " . $conn->connect_error;
}

$i = 300;


foreach($html->find("#top_100_list") as $top_100_list) {
    foreach ($top_100_list->find("li") as $li) {
        foreach ($li->find("a") as $a) {
            foreach ($a->find(".thumb") as $thumb) {
                foreach ($thumb->find("img") as $img) {
                    $image = $img->src;
                }
            }
                foreach ($a->find(".summary") as $summary) {
                foreach ($summary->find(".title") as $title) {
                    $rawName = str_replace("Net Worth", "", $title->innertext);
                    $name = trim($rawName);
                    foreach ($summary->find(".bio") as $bio) {
                        $description = $bio->innertext;
                    foreach ($summary->find(".net_worth") as $net_worth) {
                        if (strpos($net_worth->innertext, 'Million')) {
                            $c = 1000000;
                        } else {
                            $c = 1000000000;
                        }
                        $worth = filter_var($net_worth->innertext, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) * $c;
                        $sql = "INSERT INTO celebrities(id, name, net_worth, category, description, image) VALUES('$i', '$name', '$worth', 'singer', '$description', '$image'); ";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $i++;
                        }
                    }
                }
            }
        }
    }
}




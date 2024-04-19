<?php
    $db = new mysqli('localhost', 'root', '', 'stacje_narciarskie');
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
       
    if(isset($_GET["id"])){
        $getName = "SELECT nazwa FROM stacje WHERE id_stacji = " . $_GET["id"];
        $name = $db->query($getName);
        $row = $name->fetch_assoc();
        echo "<h1>" . $row["nazwa"] . "</h1>";
        $sql = "SELECT * FROM trasy WHERE id_stacji = " . $_GET["id"];
        $result = $db->query($sql);
        echo "<table>";
        for($i = 0; $i < $result->field_count; $i++) {
            if($result->fetch_field_direct($i)->name != "id_stacji"){
                echo "<th>" . $result->fetch_field_direct($i)->name . "</th>";
            }
        }
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nazwa"] . "</td>";
            echo "<td>" . $row["dlugosc"] . "</td>";            
            echo "</tr>";
        }
    }else if(isset($_GET["opinia"])){
        echo "<form action='post.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $_GET["opinia"] . "'>";
        echo "<label for='imie'>Imię:</label>";
        echo "<input type='text' name='imie' id='imie'>";
        echo "<label for='opinia'>Opinia:</label>";
        echo "<textarea name='opinia' id='opinia'></textarea>";
        echo "<input type='submit' value='Dodaj opinię'>";
        echo "</form>";

    }else if(isset($_GET["opinie"])){
        $opinie = "SELECT * FROM opinie WHERE id_stacji = " . $_GET["opinie"];
        $opinie = $db->query($opinie);
        echo "<table>";
        for($i = 0; $i < $opinie->field_count; $i++) {
            if($opinie->fetch_field_direct($i)->name != "id_opinii" && $opinie->fetch_field_direct($i)->name != "id_stacji" && $opinie->fetch_field_direct($i)->name != "id"){
                echo "<th>" . $opinie->fetch_field_direct($i)->name . "</th>";
            }
        }
        while($row = $opinie->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["imie"] . "</td>";
            echo "<td>" . $row["opinia"] . "</td>";            
            echo "<td>". $row["data"] . "</td>";
            echo "</tr>";
        }

    }
    else{        
        echo "<table>";
        $sql = "SELECT * FROM stacje";
        $result = $db->query($sql); 
        for($i = 0; $i < $result->field_count; $i++) {
            if($result->fetch_field_direct($i)->name != "id_stacji"){   
            echo "<th>" . $result->fetch_field_direct($i)->name . "</th>";
            }
        }
        echo "<th>Więcej informacji</th>";
        echo "<th>Dodaj opinię</th>";
        echo "<th>Czytaj opinie</th>";
        while($row = $result->fetch_assoc()) {
            $opinie = "SELECT COUNT(*) as opinie FROM opinie WHERE id_stacji = " . $row["id_stacji"];
            $opinie = $db->query($opinie);
            $opinie = $opinie->fetch_assoc();

            echo "<tr>";
            echo "<td>" . $row["nazwa"] . "</td>";
            echo "<td>" . $row["orczyki"] . "</td>";
            echo "<td>" . $row["krzeselka"] . "</td>";
            echo "<td>" . $row["gondole/kolejki"] . "</td>";
            echo "<td>" . $row["nasniezanie"] . "</td>";
            echo "<td>" . $row["oswietlenie"] . "</td>";
            echo "<td>" . "<a href='index.php?id=" . $row["id_stacji"] . "'>Więcej informacji</a>" . "</td>";
            echo "<td>" . "<button onclick='window.location.href=\"index.php?opinia=" . $row["id_stacji"] . "\"'>Dodaj opinię</button>" . "</td>";
            if($opinie["opinie"] > 0){
                echo "<td>" . "<button onclick='window.location.href=\"index.php?opinie=" . $row["id_stacji"] . "\"'>Czytaj opinie</button>" . "</td>";                
            }else
            {
                echo "<td>Brak opinii</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
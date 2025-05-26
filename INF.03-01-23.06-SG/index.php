<!DOCTYPE html>
<html>
    <head lang="pl">
        <meta charset="utf-8">
        <title>Sklep dla uczniów</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Dzisiejsze promocje naszego sklepu</h1>
        </header>
        <div id="lewy">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '','sklep');
                    $zapytanie = mysqli_query($polaczenie,"SELECT `nazwa` FROM `towary` WHERE `promocja`=1;");
                    while($wynik = mysqli_fetch_array($zapytanie)){
                        echo "<li>";
                        echo $wynik[0];
                        echo "</li>";
                    }
                    mysqli_close($polaczenie);
                ?>
            </ol>
        </div>
        <div id="srodkowy">
            <h2>Sprawdź cenę</h2>
            <form action="./index.php" method="post">
                <select id="wybor" name="wybor">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <input type="submit" value="SPRAWDŹ">
            </form>
            <div id="wynik">
                <?php
                    $wybor = $_POST['wybor'];
                    $polaczenie = mysqli_connect('localhost', 'root', '','sklep');
                    $zapytanie2 = mysqli_query($polaczenie, "SELECT `cena` FROM `towary` WHERE `nazwa` LIKE '".$wybor."';");
                    while($wynik2 = mysqli_fetch_array($zapytanie2))
                    {
                        echo "<p>cena regularna: ".$wynik2[0]."</p>";
                        echo "<p>cena w promocji 30%: ".($wynik2[0]*0.7)."</p>";
                    }
                    mysqli_close($polaczenie);
                ?>
            </div>
        </div>
        <div id="prawy">
            <h2>Kontakt</h2>
            <p><a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p><br>
            <img src="./promocja.png" alt="promocja">
        </div>
        <footer>
            <h4>Autor strony: PESEL</h4>
        </footer>
    </body>
</html>
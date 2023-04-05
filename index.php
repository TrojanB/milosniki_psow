<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <div id="baner">
        <h1>Forum miłośników psów</h1>
    </div>

    <div id="lewy">
        <img src="zad1/Avatar.png" alt="Użytkownik forum">
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'forumpsy');
            $kw = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta INNER JOIN pytania ON konta.id=pytania.konta_id WHERE pytania.id = 1;";
            $w = mysqli_query($db, $kw);
            while($p = mysqli_fetch_row($w)){
                echo "<h4>Użytkownik: $p[0]</h4> <br>";
                echo "<p>$p[1] postów na forum</p> <br>";
                echo "<p>$p[2]</p> <br>";
            }
            mysqli_close($db);

        ?>

        <video controls loop>
            <source src="zad1/video.mp4">
        </video>
    </div>

    <div id="prawy">
        <form action="" method="POST">
            <textarea name="txta" rows="4" cols="40"></textarea>

            <input type="submit" value="Dodaj opdpowiedź">
        </form>
        <?php
        if(isset($_POST['txta'])){
            $db = mysqli_connect('localhost', 'root', '', 'forumpsy');
            $tx = $_POST['txta'];
            $kw = "INSERT INTO odpowiedzi VALUES(8,1,5, '$tx');";
            mysqli_query($db, $kw);
            mysqli_close($db);
        }
        ?>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php
                $db = mysqli_connect('localhost', 'root', '', 'forumpsy');
                $kw = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi INNER JOIN konta ON odpowiedzi.konta_id = konta.id;";

                $w = mysqli_query($db, $kw);
                while($p = mysqli_fetch_row($w)){
                    echo "<li>$p[1] <i>$p[2]</i> <hr></li>";
                }
                mysqli_close($db);

            ?>
        </ol>
    </div>

    <footer>Autor: Trojan Bogacki 3pir <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></footer>

</body>
</html>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template1
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        <div class="main" id="main">
            <?php
            $filelist = glob("*.txt");
            foreach ($filelist as $lis) {
                echo '<a href=' . $lis . ' download>' . $lis . '</a>';
                echo '<br>';
            }
            $con = new PDO("mysql:host=localhost;dbname=worktest", "test", "12456");
            $row = $con->prepare("SELECT * FROM work2 ORDER BY glava");
            $row->execute();
            $res = array();
            $num = 0;
            $nach = 319;
            while ($r = $row->fetch()) {
                $engT = explode(PHP_EOL, $r['textEng']);
                $engR = explode(PHP_EOL, $r['textRus']);
                $res[]='<title> CHAPTER '.$nach+$num.' </title>'. PHP_EOL;

                for ($i = 0; $i < count($engT) - 1; $i++) {
                    if (strlen($engT[$i]) != 2 && strlen($engT[$i]) != 3) {
                        if (strlen($engT[$i]) > 1) {
                                $res[] = $engT[$i] . PHP_EOL . $engR[$i];
                        } else {
                                $res[] = $engT[$i] . PHP_EOL . $engR[$i] . PHP_EOL;
                        }
                    }
                }
                for ($i = 0; $i < count($res); $i++) {
                    if (strlen($res[$i]) == 4) {
                        $res[$i] = substr($res[$i], 0, -2);
                    }
                }
                foreach ($res as $s) {
                    $test = $test . $s;
                    if (strlen($s) > 8 && !preg_match('/[А-Яа-яЁё]/u', $s) &&
                            preg_match('/[A-Za-z]/', $s)) {
                        echo $r['glava'].' !!! '.$s . '<br>';
                    }
                } 
                
                $test = $test . '-----------------------------------------';
                $res = array();
                $num++;
                if ($num == 10) {
                    $file = $nach . '-' . $nach+9 . '.txt';
                    $files = file_put_contents($file, $test);
                    $test = '';
                    $num = 0;
                    $nach = $nach + 10;
                }
            }
            $files = file_put_contents('text.txt', $test);
            ?>
        </div>
    </body>
</html>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template1
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="javas.js"></script>
        <title></title>
    </head>
    <body> 
        <br><br><br><br>




        <!-- Modified by Novikov.ua -->
        <style type="text/css">
            a.gflag {
                vertical-align: middle;
                font-size: 15px;
                padding: 0px;
                background-repeat: no-repeat;
                background-image: url(//gtranslate.net/flags/16.png);
            }

            a.gflag img {
                border: 0;
            }

            a.gflag:hover {
                background-image: url(//gtranslate.net/flags/16a.png);
            }

            #goog-gt-tt {
                display: none !important;
            }

            .goog-te-banner-frame {
                display: none !important;
            }

            .goog-te-menu-value:hover {
                text-decoration: none !important;
            }

            body {
                top: 0 !important;
            }

            #google_translate_element2 {
                display: none !important;
            }
        </style>
        
        <a href="#" onclick="doGTranslate('ru|ru');return false;" title="Russian" class="gflag nturl"
           style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16"
                                                        alt="German"/></a>

        <div id="google_translate_element2"></div>

        <script type="text/javascript">
            function googleTranslateElementInit2() {
                new google.translate.TranslateElement({
                    pageLanguage: 'ru',
                    autoDisplay: false
                }, 'google_translate_element2');
            }
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            eval(function (p, a, c, k, e, r) {
                e = function (c) {
                    return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                };
                if (!''.replace(/^/, String)) {
                    while (c--)
                        r[e(c)] = k[c] || e(c);
                    k = [function (e) {
                            return r[e]
                        }];
                    e = function () {
                        return '\\w+'
                    };
                    c = 1
                }
                while (c--)
                    if (k[c])
                        p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                return p
            }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
                    /* ]]> */
        </script>
        <!--- Modified by Novikov.ua --->





















        <div id="url">
            <?php
            include 'parseSait.php';
            $url = "";
            if (isset($_POST["url"])) {                                    
                $url = mb_eregi_replace('[а-яё]', '', $_POST["url"]);               
                $id = parseId($url);
                $f = parseSait($url);
                $etap = 'url';
            }
            ?> 
            <form method="POST">
                <p><input type="text" name="url" /></p>
                <input type="submit" value="url"/>
                <input id="nexk"type="submit" onclick="next()" value="next"/>
            </form>
            <script>
                        function next() {
                            document.getElementsByName('url')[0].value =
                                    document.getElementsByClassName('wp-post-nav-shortcode')[0].children[1].href;
                        }
            </script>
        </div>



        <div id="eng">
            <?php
            if (isset($_POST["url"])) {
                $url = mb_eregi_replace('[а-яё]', '', $_POST["url"]);               
                $id = parseId($url);
                $f = parseSait($url);
            }
            if (isset($_POST["eng"]) && $_POST["eng"] != '') {
                $eng = $_POST["eng"];
                $con = new PDO("mysql:host=localhost;dbname=worktest", "test", "12456");
                $row = $con->exec("INSERT INTO work2( glava, textEng ) VALUES ('$id','$eng')");
                $etap = 'eng';
            }
            ?>
            <form method="POST">
                <textarea name="eng" id="eng" hidden></textarea>
                <p><input type="text" name="url" hidden/></p>
                <input id="engk" type="submit" onclick="urlEng()" value="eng"/>
            </form>
        </div>



        <div id="rus">
            <?php
            if (isset($_POST["url"])) {
                $url = mb_eregi_replace('[а-яё]', '', $_POST["url"]);               
                $id = parseId($url);
                $f = parseSait($url);
            }
            if (isset($_POST["rus"]) && $_POST["rus"] != '') {
                if (preg_match('/[А-Яа-яЁё]/u', $_POST["rus"])) {
                    $rus = $_POST["rus"];
                    $con = new PDO("mysql:host=localhost;dbname=worktest", "test", "12456");
                    $sql = "UPDATE work2 SET textRus=? WHERE glava=?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute([$rus, $id]);
                    $etap = 'rus';
                } else {
                    $etap = 'eng (нет русских символов)';
                }
            }
            ?>
            <form method="POST">
                <textarea name="rus" id="rus" hidden></textarea>
                <p><input type="text" name="url" hidden/></p>
                <input id="rusk" type="submit" onclick="urlRus()" value="rus"/>
            </form>
        </div>



        <div id="clear">
            <form method="GET">
                <input type="submit" onclick="clear()" value="clear"/>
            </form>
            <script>
                        function clear() {
                            document.getElementsByName('eng')[0].value = '';
                            document.getElementsByName('rus')[0].value = '';
                            document.getElementsByName('url')[0].value = '';
                            document.getElementsByName('url')[1].value = '';
                            document.getElementsByName('url')[2].value = '';
                        }
            </script>
        </div>


        <div class="id" id=id'><?php echo $etap; ?></div>
        <div class="id2" id=id2'><?php echo '<br>' . $id; ?></div>
        <div class="main" id=main'>
            <?php echo $url; ?>
            <br>
            <input id="botk" type="submit" onclick="scrolls();" value="bot" style="height:100px; width:500px"/>
            <script>
                        var i = -600;
                        function scrolls() {
                            setTimeout(function () {
                                if (i < 0) {
                                    document.getElementsByClassName('gflag nturl')[0].onclick();
                                }
                                window.scrollTo(0, i);
                                i = i + 200;
                                console.log('hod');
                                if (i < 10000) {
                                    scrolls();
                                } else if (i == 10000) {
                                    console.log('exit');
                                    window.scrollTo(0, 0);
                                    document.getElementById('rusk').click();
                                }
                            }, 700);
                        }
            </script>
        </div>
        <p><a href="file/file.php">files</a></p>
        <br>
        <div class="main1" id=main1'><?php echo $f; ?></div>

        <div class="ttt" id=ttt'>
            <script type="text/javascript">
                        window.onload = setTimeout(zagr, 5000);
            </script>
        </div>

    </body>
</html>

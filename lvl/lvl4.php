<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <?php include '../templates/includes/css.php' ?> -->
    <link rel="stylesheet" href="../css/style_defi_4.css">
    <link rel="shortcut icon" href="#" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
    <title>Pinball CROUS</title>
</head>

<body>
    <main>

            <div class="loader-container">
                <div class="loader"><img src="../img/loader.png" alt=""></div>
            </div>

            <div onload="chronoStart()">

                <div class="container">
                    <div class="score current-score">
                        score<br><span></span>
                    </div>
                    <div class="score high-score">
                        high score<br><span></span>
                    </div>

                    <button class="trigger left-trigger">tap!</button>
                    <button class="trigger right-trigger">tap!</button>
                    <button class="lancer">Go!</button>

                    <div class="letter" id="c">C</div>
                    <div class="letter" id="r">R</div>
                    <div class="letter" id="o">O</div>
                    <div class="letter" id="u">U</div>
                    <div class="letter" id="s">S</div>
                </div>
                <div id="levelDisplay"></div>
                <div class="level lvl-score">
                    lvl<br><span></span>
                </div>
                <div id="monthDisplay">

                </div>

                <div id="timelaps" style="position: absolute; top: 50px; right: 10vw; color: black; line-height: 0.6em; text-transform: none;">

                </div>

                <div style="position: absolute; top: 52px; right: 10vw; color: black; line-height: 0.6em; text-transform: none;">
                    <h4>Définition de CROUS :</h4>
                    <p id="cent" class="hidden">Centre</p>
                    <p id="regi" class="hidden">Régional des</p>
                    <p id="oeuv" class="hidden">Oeuvres</p>
                    <p id="univ" class="hidden">Universitaires et</p>
                    <p id="scol" class="hidden">Scolaires</p>
                </div>

                <div>
                    <p class="definition" id="centr">Centre</p>
                    <p class="definition" id="regio">Régional</p>
                    <p class="definition" id="oeuvr">Oeuvres</p>
                    <p class="definition" id="unive">Universitaires</p>
                    <p class="definition" id="scola">Scolaires</p>
                </div>
                <div class="prebtn">
                    <a href="../templates/index.php"><button class="btn_menu">Menu</button></a>
                </div>

                <!-- <audio src="musique/blaster.mp3" id="blaster"></audio>
                <audio id="theme" src="musique/theme.mp3" loop autoplay></audio> -->

                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                <script src='https://cdn.rawgit.com/schteppe/poly-decomp.js/1ef946f1/build/decomp.min.js'></script>
                <script src='https://cdn.rawgit.com/liabru/matter-js/0895d81f/build/matter.min.js'></script>
                <script src='https://cdn.rawgit.com/liabru/matter-attractors/c470ed42/build/matter-attractors.min.js'></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="../js/loader.js"></script>



                <script src="../js/index_defi4.js"></script>
                <!-- <audio id="blaster" src="musique/blaster.mp3"></audio>
                <audio id="theme" loop="" autoplay="" src="musique/theme.mp3"></audio>
                <audio id="PADDLE" src="musique/PADDLE.mp3"></audio>
                <audio id="launch" src="musique/launch.mp3"></audio>
                <audio id="letter" src="musique/letter.mp3"></audio> -->




            </div>

    </main>



    <?php include '../templates/includes/js.php'; ?>
</body>

</html>
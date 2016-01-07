<?php
/**
 * Created by PhpStorm.
 * User: Dominic Dubreuil
 * Date: 2016-01-06
 * Time: 18:23
 */?>

<html>
<head>
    <style>
        div.img {
            margin: 5px;
            border: 1px solid #ccc;
            width: 250px;
            display: inline-block;
        }

        div.img:hover {
            border: 1px solid #777;
        }

        div.img img {
            width: 100%;
            height: 250px;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
        #Wrapper_gallery{
            width: 700px;
        }
    </style>
</head>
<body>

<div id="Wrapper_gallery">

<div class="img">
    <a target="_blank" href="fjords.jpg">
        <img src="images/gallery1.jpg" alt="Fjords" >
    </a>
    <div class="desc">Bonjour mon nom est Catherine</div>
</div>

<div class="img">
    <a target="_blank" href="img_forest.jpg">
        <img src="images/gallery2.jpg" alt="Forest" >
    </a>
    <div class="desc">Bonjour mon nom est Robert</div>
</div>

<div class="img">
    <a target="_blank" href="lights.jpg">
        <img src="images/gallery3.jpg" alt="Northern Lights" >
    </a>
    <div class="desc">Salut moi c'est Jean-Claude</div>
</div>

<div class="img">
    <a target="_blank" href="img_mountains.jpg">
        <img src="images/gallery4.jpg" alt="Mountains" width="300" height="200">
    </a>
    <div class="desc">Bonjour mon nom est Julie.</div>
</div>

</div>

</body>
</html>

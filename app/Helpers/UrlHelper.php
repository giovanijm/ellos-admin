<?php

function getUrlImageServidor($idImage){
    $result = env('CLOUDFLARE_URL_DEFAULT') . "/" . $idImage;
    return $result;
}

<?php

function rupiah($nilai) {
    return "Rp. ". number_format(ceil($nilai), "0",",",".");
}

function persen($nilai) {
    return number_format(ceil($nilai)) . "%";
}
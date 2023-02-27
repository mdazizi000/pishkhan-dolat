<?php

function payment(){
    return \App\Services\Gateway::use();
}
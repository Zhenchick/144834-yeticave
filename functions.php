<?php

function formatPrice ($price)
{
    return number_format($price, 0, '.', ' ') . ' ' . '<b class="rub">р</b>';
}

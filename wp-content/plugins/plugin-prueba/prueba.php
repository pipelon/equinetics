<?php

function mostrar() {
    

    $output = '<a class="more-link" href="<?= get_permalink() ?>">HClick to Read!</a>';
    $output .= '<div>';
    $output .= '    <span>hola 2 </span>';
    $output .= '</div>';
    return $output;
   
}


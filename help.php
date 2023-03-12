<?php

function getId($url) {

    $html = file_get_html($url);
    $element = $html->find('.wp-site-blocks');

    $html2 = str_get_html($element[0]->innertext);
    $element2 = $html2->find('*');

    $i = 0;
    foreach ($element2 as $r1) {
        if (str_contains($r1, 'wp-block-group has-global-padding is-layout-constrained')) {
            $i++;
            $html3 = str_get_html($r1->innertext);
            if ($i === 3) {
                break;
            }
        }
    }

    $element3 = $html3->find('*');

    foreach ($element3 as $r2) {
        if (str_contains($r2, 'wp-block-group has-global-padding is-layout-constrained')) {
            $html4 = str_get_html($r2->innertext);
            break;
        }
    }

    $element4 = $html4->find('*');

    foreach ($element4 as $r3) {
        if (str_contains($r3, 'Chapter')) {
            $res = $r3->innertext;
            break;
        }
    }

    if (mb_substr($res, 8, 3)>100){
        return mb_substr($res, 8, 3);
    } else {
        return mb_substr($res, 9, 3);
    }
}

?>

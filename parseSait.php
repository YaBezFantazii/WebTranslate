<?php

include 'simplehtmldom/simple_html_dom.php';
include 'help.php';

function parseId($url) {
    if (str_contains($url, 'http')) {
        $id = getId($url);
        return $id;
    }
    return (string) '';
}

function parseSait($url) {
    if (str_contains($url, 'http')) {

        $html = file_get_html($url);
        $element = $html->find('.wp-site-blocks');

        $html2 = str_get_html($element[0]->innertext);
        $element2 = $html2->find('*');

        foreach ($element2 as $r1) {
            if (str_contains($r1, 'wp-block-group is-layout-flow')) {
                $f = $r1;
            }
        }

        return $f;
    }
    return (string) '';
}
?>


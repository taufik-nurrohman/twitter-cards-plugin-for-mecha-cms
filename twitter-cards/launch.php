<?php

function do_twitter_cards() {
    $config = Config::get();
    $twitter_cards_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize();
    $T2 = str_repeat(TAB, 2);
    echo O_BEGIN . $T2 . '<!-- Start Twitter Cards -->' . NL;
    echo $T2 . '<meta name="twitter:card" content="' . (isset($config->{$config->page_type}->image) && $config->{$config->page_type}->image !== Image::placeholder() ? 'summary_large_image' : 'summary') . '"' . ES . NL;
    echo $T2 . '<meta name="twitter:site" content="@' . $twitter_cards_config['twitter_site'] . '"' . ES . NL;
    echo $T2 . '<meta name="twitter:creator" content="@' . $twitter_cards_config['twitter_creator'] . '"' . ES . NL;
    echo $T2 . '<meta name="twitter:title" content="' . Text::parse($config->page_title, '->text') . '"' . ES . NL;
    echo $T2 . '<meta name="twitter:url" content="' . Filter::colon('twitter:url', $config->url_current) . '"' . ES . NL;
    if(isset($config->{$config->page_type}->description)) {
        $config->description = $config->{$config->page_type}->description;
    }
    echo $T2 . '<meta name="twitter:description" content="' . Text::parse($config->description, '->text') . '"' . ES . NL;
    if($config->page_type !== '404' && isset($config->{$config->page_type}->image)) {
        echo $T2 . '<meta name="twitter:image" content="' . $config->{$config->page_type}->image . '"' . ES . NL;
    } else {
        echo $T2 . '<meta name="twitter:image" content="' . $config->url . '/favicon.ico"' . ES . NL;
    }
    echo $T2 . '<!-- End Twitter Cards -->' . O_END;
}

Weapon::add('meta', 'do_twitter_cards', 11);
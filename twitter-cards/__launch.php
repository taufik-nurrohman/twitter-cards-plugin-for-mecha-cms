<?php

Route::accept($config->manager->slug . '/plugin/' . File::B(__DIR__) . '/update', function() use($config, $speak) {
    if($request = Request::post()) {
        Guardian::checkToken($request['token']);
        unset($request['token']);
        $request['twitter_site'] = trim(Text::parse($request['twitter_site'], '->array_key'), '_');
        $request['twitter_creator'] = trim(Text::parse($request['twitter_creator'], '->array_key'), '_');
        File::serialize($request)->saveTo(__DIR__ . DS . 'states' . DS . 'config.txt', 0600);
        Notify::success(Config::speak('notify_success_updated', $speak->plugin));
        Guardian::kick(File::D($config->url_current));
    }
});
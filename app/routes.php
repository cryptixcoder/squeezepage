<?php

$app->get('/', 'HomeController:index');

$app->post('/subscribe', 'HomeController:postSubscribe');

$app->get('/reward', 'HomeController:getReward');
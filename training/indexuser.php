<?php

include __DIR__.'/User.php';
include __DIR__.'/../training2/User.php';

use SmileOSS\Lab\OOP\Training\User;
use External\Training\User as User2;

$user1 = new User();
$user2 = new User2();

var_dump($user1->getMyNamespace(), $user2->getMyNamespace());

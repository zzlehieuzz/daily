<?php

use Cake\Core\Configure;

// セクションタイムアウト設定
Configure::write('Session', [
	'defaults' => 'php',
	'timeout' => 4320 // 3日間 = 3*24*60
]);

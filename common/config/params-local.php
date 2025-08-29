<?php

require __DIR__ . '/env.php';

return [
	Yii::setAlias('@imageurl', getenv('PUBLIC_DOMAIN')),
	Yii::setAlias('@privateurl', getenv('PUBLIC_DOMAIN') . '/storage'),
];

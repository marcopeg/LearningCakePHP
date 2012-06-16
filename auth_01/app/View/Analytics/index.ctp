View's Content

<?php

/*
PowerConfig::write('test','aaa');
PowerConfig::debug();
echo '<hr>';

Configure::write('aaa','bbb');

Configure::write('aaa1.ccc.dd.eee','ccc');

debug(Configure::read());
*/


PowerConfig::set(array(
	'key1' => 'a string',
	'key2' => 23,
	'key3' => array( 'red', 'blue', 'green' ),
	'key4' => array(
		'subKey1' => 'sub1',
		'subKey2' => 'aaa'
	)
));


PowerConfig::prepend( 'key3', 'yellow', 'fuchsia' );
PowerConfig::append( 'key3', 'orange', 'green' );

PowerConfig::pushDiff( 'key4', array(
	'subKey1' => 'bbb',
	'subKey2' => 'modified',
	'subKey3' => 'new'
));

PowerConfig::debug();


#debug(PowerConfig::exists('key.key1.key2'));
#debug(PowerConfig::exists('key.key2.key2'));

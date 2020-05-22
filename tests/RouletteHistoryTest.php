<?php

require 'app/models/Roulette.php';

use PHPUnit\Framework\TestCase;
 
class RouletteHistoryTest extends TestCase
{	
	public function testGetHistory()
	{
		$this->assertFileExists('data.txt');
	}
}
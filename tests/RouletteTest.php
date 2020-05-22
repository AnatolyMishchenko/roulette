<?php

require 'app/models/Roulette.php';

use PHPUnit\Framework\TestCase;
 
class RouletteTest extends TestCase
{
    private $roulette;
	
	public function testGetPlayers()
    {
		$this->roulette = new Roulette();
		$players = $this->roulette->getPlayers(3);
        $this->assertEquals([1, 2, 3], $players);
		
		return $players;
	}
	
    public function testGetRate()
    {
		$this->roulette = new Roulette();
		$rate = $this->roulette->getRate(2);
        $this->assertEquals('red', $rate);
		
		return $rate;
    }
	
	/**
     * @depends testGetPlayers
	 * @depends testGetRate
     */
	public function testGetPlayersRate($players, $rate)
    {
		$this->roulette = new Roulette();
		$rateP = [[0 => 33], [1 => 'red'], [2 => 10]];
		$this->assertIsArray($rateP, 'Не массив!');
		$this->assertSame([1, 2, 3], $players);
		$this->assertSame('red', $rate);
		
		return $rateP; 
	}
	
	public function testGetWinnerValue()
	{
		$this->roulette = new Roulette();
		$winner = $this->roulette->getWinnerValue(22, 1);
		$win = array();
		$win = [1 => 22, 2 => 'red'];
		$this->assertIsArray($winner, 'Не массив!');
		$this->assertEquals($win, $winner);
		
		return $winner;
	}
	
	/**
     * @depends testGetWinnerValue
	 * @depends testGetPlayersRate
     */
	public function testGetResultRound($winner, $rateP)
	{
		$this->assertSame([1 => 22, 2 => 'red'], $winner);
		$this->assertSame([[0 => 33], [1 => 'red'], [2 => 10]], $rateP);
		$this->assertFileExists('round.txt');
		$this->assertFileExists('data.txt');
		$this->assertContains('red', $winner);
	}
 
}

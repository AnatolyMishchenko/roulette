<?php

class Roulette
{

    public function getRoulette(): array
    {
        $rouletteArray = range(1, 36);

        return $rouletteArray;
    }

    public function getWinnerValue($winNumber = null, $winColor = null): array
    {
        $win = array();
        $rateArray = [0 => 'black', 1 => 'red'];
        if (!$winNumber && !$winColor) {
            $winNumber = random_int(1, 36);
            $winColor = random_int(0, 1);
        }
        $win = [1 => $winNumber, 2 => $rateArray[$winColor]];

        return $win;
    }

    public function getPlayers($playersCount = null): array
    {
        if (!$playersCount) {
            $playersCount = random_int(1, 10);
        }
        $playersArray = range(1, $playersCount);

        return $playersArray;
    }

    public function getRate($setRate): string
    {
        $rateArray = [1 => 'black', 2 => 'red', 3 => 'number'];
        foreach ($rateArray as $rateArrayItem => $rateArrayValue) {
            if ($rateArrayItem == $setRate) {
                if ($setRate == 3) {
                    $rate = random_int(1, 36);
                } else {
                    $rate = $rateArrayValue;
                }
            }
        }

        return $rate;
    }

    public function getPlayersRate(): array
    {
        $arrRate = array();
        $players = $this->getPlayers();

        foreach ($players as $playersItem => $playersValue) {
            $setRate = random_int(1, 3);
            $val = $this->getRate($setRate);
            $arrRate [] = [$playersItem => $val];
        }

        return $arrRate;
    }

    public function getStartRound(): array
    {
        $roulette = $this->getRoulette();
        $players = $this->getPlayersRate();
        $count = count($players);
        $_SESSION['arrP'] = $players;
        $data = [
            'roulette' => $roulette,
            'players' => $players,
            'count' => $count,
        ];

        return $data;
    }

    public function getResultRound(): array
    {
        $winners = array();
        $win = $this->getWinnerValue();
        $players = $_SESSION['arrP'];
        $count = count($players);
        for ($i = 0; $i < $count; $i++) {
            foreach ($players[$i] as $playersItem => $playersValue) {
                foreach ($win as $winItem) {
                    if ($winItem == $playersValue) {
                        $winners[] = [$playersItem => $playersValue];
                    }
                }
            }
        }
        $countWinner = count($winners);
        if (file_exists('round.txt')) {
            $round = file_get_contents('round.txt', true);
            if (empty($round)) {
                $round = 1;
            } else {
                $round = $round + 1;
            }
            $fpP = fopen('round.txt', 'w');
            fwrite($fpP, $round);
            fclose($fpP);
        } else {

            return false;
        }
        if (file_exists('data.txt')) {
            $data = [
                'players' => $players,
                'count' => $count,
                'countWinner' => $countWinner,
                'winners' => $winners,
                'win' => $win,
                'round' => $round,
            ];
            $fileData = serialize($data);

            $fp = fopen('data.txt', 'a');
            fwrite($fp, $fileData . PHP_EOL);
            fclose($fp);
        } else {

            return false;
        }

        return $data;
    }

    public function getHistory(): array
    {
        $file = fopen('data.txt', 'r');
        $history = array();
        if ($file) {
            while (($buffer = fgets($file)) !== false) {
                $dataHistory = unserialize($buffer);
                $history[] = $dataHistory;
            }
        }

        return $history;
    }

}

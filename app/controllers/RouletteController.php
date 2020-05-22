<?php

include('app/models/Roulette.php');

class RouletteController extends Controller
{

    public function index()
    {
        $model = new Roulette();
        $data = [];
        if (isset($_POST["start-round"])) {
            $data = $model->getResultRound();
        } else {
            $data = $model->getStartRound();
        }

        return $this->view->generate('index.php', $data);
    }

    public function history()
    {
        $model = new Roulette();
        $data = $model->getHistory();

        return $this->view->generate('history.php', $data);
    }
}



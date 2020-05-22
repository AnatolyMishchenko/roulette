<div class="content">
    <a href="/">Новый раунд</a>

    <?php foreach ($data as $dataValue) {
        foreach ($dataValue as $dataValueItem) {


            ?>
            <div class="winners">
                <h1><?php echo 'Раунд: ' . $dataValue['round']; ?></h1>
                <h4>Ставки игроков:</h4>
                <div class="players">
                    <?php for ($i = 0; $i < $dataValue['count']; $i++) {
                        foreach ($dataValue['players'][$i] as $playersItem => $playersValue) { ?>
                            <div class="item-player"><?php echo 'Player ' . $playersItem . ' Rate ' . $playersValue; ?></div>
                            <?php
                        }
                    } ?>
                </div>

                <h4>Выпало:</h4>
                <?php foreach ($dataValue['win'] as $itemWin) { ?>
                    <div class="win-item"><?php echo $itemWin; ?></div>
                <?php } ?>
                <h4>Победители:</h4>
                <?php if (empty($dataValue['winners'])) {
                    echo 'Победители отсутствуют!';
                } else {
                    for ($j = 0; $j < $dataValue['countWinner']; $j++) {
                        foreach ($dataValue['winners'][$j] as $winnersItem => $winnersValue) { ?>
                            <div class="item-winner"><?php echo 'Победитель: Player ' . $winnersItem . ' Ставка: ' . $winnersValue; ?></div>
                            <?php
                        }
                    }
                } ?>
            </div>


            <?php break;
            ?>
        <?php } ?>
    <?php } ?>


</div>
<link rel="stylesheet" href="/css/style.css"/>
<div class="content">
    <a href="/history">Просмотреть историю</a>
    <?php if (empty($data['roulette'])) { ?>
        <a href="/">Новый раунд</a>
        <br>
        <h1 class="round"><?php echo 'Раунд № ' . $data['round']; ?></h1>
        <h4>Ставки игроков:</h4>
        <div class="players">
            <?php for ($i = 0; $i < $data['count']; $i++) {
                foreach ($data['players'][$i] as $playersItem => $playersValue) { ?>
                    <div class="item-player"><?php echo 'Player ' . $playersItem . ' Rate ' . $playersValue; ?></div>
                    <?php
                }
            } ?>
        </div>
        <h4>Выпало:</h4>
        <?php foreach ($data['win'] as $itemWin) { ?>
            <div class="win-item"><?php echo $itemWin; ?></div>
        <?php } ?>
        <h4>Победители:</h4>
        <?php if (!empty($data['winners'])) { ?>
            <div class="winners">
                <?php for ($j = 0; $j < $data['countWinner']; $j++) {
                    foreach ($data['winners'][$j] as $winnersItem => $winnersValue) { ?>
                        <div class="item-winner"><?php echo 'Победитель: Player ' . $winnersItem . ' Ставка: ' . $winnersValue; ?></div>
                        <?php
                    }
                } ?>
            </div>
        <?php } else {
            echo 'Победители отсутствуют!';
        } ?>

    <?php } else { ?>
        <div class="roulette">
            <?php foreach ($data['roulette'] as $item) {
                if ($item % 2 === 0) { ?>
                    <div class="item red"><?php echo $item; ?></div>
                <?php } else { ?>
                    <div class="item black"><?php echo $item; ?></div>
                <?php }
            }
            ?>
        </div>
        <h4>Ставки игроков:</h4>
        <div class="players">
            <?php for ($i = 0; $i < $data['count']; $i++) {
                foreach ($data['players'][$i] as $playersItem => $playersValue) { ?>
                    <div class="item-player"><?php echo 'Player ' . $playersItem . ' Rate ' . $playersValue; ?></div>
                    <?php
                }
            } ?>
        </div>


        <form id="start" action="" method="post">

            <input type="submit" name="start-round" value="Старт">
        </form>
    <?php } ?>
</div>
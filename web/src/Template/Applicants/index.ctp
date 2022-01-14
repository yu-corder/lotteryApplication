<div class="winpage-container">
    <h2 class="winorlost-text">当落結果表示</h2>
    <?php $chk = false; ?>
    <?php foreach ($data as $obj) : ?>
        <?php
            if ($obj['name'] == '戸田優也') {
                $chk = true;
            }
        ?>
    <?php endforeach; ?>
    <?php if ($chk) : ?>
        <p class="winning_text">当選!</p>
    <?php else : ?>
        <p class="lost_text">落選</p>
    <?php endif; ?>
</div>

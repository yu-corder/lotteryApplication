<p>LIVE当落シュミレーションアプリになります。</p>
<p>ライブの応募者と会場のキャパを選択してください。</p>

<form action="/applicants" method="post" id="dev-input-form" class="lottery_form">
    <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken') ?>">

    <div>
        <p>応募者</p>
        <input type="radio" name="applicants_num" id="applicants_num_3" value="3" checked><label for="applicants_num_3" class="links">3万人</label>
        <input type="radio" name="applicants_num" id="applicants_num_5" value="5" ><label for="applicants_num_5" class="links">5万人</label>
        <input type="radio" name="applicants_num" id="applicants_num_10" value="10" ><label for="applicants_num_10" class="links">10万人</label>
    </div>

    <div>
        <p>ライブ会場キャパ</p>
        <input type="radio" name="winner_cap" id="winner_cap_1.5" value="15000" checked><label for="winner_cap_1.5" class="links">1.5万人</label>
        <input type="radio" name="winner_cap" id="winner_cap_3" value="30000" ><label for="winner_cap_3" class="links">3万人</label>
        <input type="radio" name="winner_cap" id="winner_cap_5" value="50000" ><label for="winner_cap_5" class="links">5万人</label>
    </div>

    <button class="account_next_link links en-bold dev-heavy"><?php echo __('Next');?></button>
</form>

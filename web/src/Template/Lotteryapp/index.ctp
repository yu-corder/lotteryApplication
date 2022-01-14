<p>LIVE当落シュミレーションアプリになります。</p>
<p>ライブの応募者と会場のキャパを選択してください。</p>

<form action="/applicants" method="post" id="dev-input-form" class="lottery_form">
    <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken') ?>">

    <div class="form_box">
        <p class="form_text">応募者</p>
        <div class="form-container">
            <input type="radio" name="applicants_num" id="applicants_num_3" value="3" class="applicants_radio" checked><label for="applicants_num_3" id="applicants_num_3_radio" class="links push_checked">3万人</label>
            <input type="radio" name="applicants_num" id="applicants_num_5" value="5" class="applicants_radio" ><label for="applicants_num_5" id="applicants_num_5_radio" class="links">5万人</label>
            <input type="radio" name="applicants_num" id="applicants_num_10" value="10" class="applicants_radio"><label for="applicants_num_10" id="applicants_num_10_radio" class="links">10万人</label>
        </div>
    </div>

    <div class="form_box">
        <p class="form_text">ライブ会場キャパ</p>
        <div class="form-container">
            <input type="radio" name="winner_cap" id="winner_cap_15" value="15000" class="cap_radio" checked><label for="winner_cap_15" id="winner_cap_15_radio" class="links push_checked">1.5万人</label>
            <input type="radio" name="winner_cap" id="winner_cap_3" value="30000" class="cap_radio"><label for="winner_cap_3" id="winner_cap_3_radio" class="links">3万人</label>
            <input type="radio" name="winner_cap" id="winner_cap_5" value="50000" class="cap_radio"><label for="winner_cap_5" id="winner_cap_5_radio" class="links">5万人</label>
        </div>
    </div>

    <button class="account_next_link en-bold dev-heavy">選択</button>
</form>

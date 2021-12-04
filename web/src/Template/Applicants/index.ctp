<p>テストユーザ表示</p>
<table>
    <thead>
        <tr>
            <th>UserID</th>
            <th>名前</th>
            <th>同行者</th>
        </tr>
    </thead>
    <?php foreach ($data->toArray() as $obj) : ?>
        <tr>
            <td><?=h($obj->id) ?></td>
            <td><?=h($obj->name) ?></td>
            <td>
                <?php if (isset($obj->accompanying_person_name)) : ?>
                    <?=h($obj->accompanying_person_name) ?>
                <?php else : ?>
                    なし
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

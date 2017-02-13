<div id="title-header">List daily</div>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="25%">username</th>
            <th>name</th>
            <th width="25%">login_date</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($aryDaily): ?>
            <?php foreach ($aryDaily as $intDailyKey => $objDailyItem): ?>
                <tr>
                    <td><?= ($intDailyKey + 1) ?></td>

                    <td>X</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">ありませんでした</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
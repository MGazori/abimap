<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?> panel</title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/favicon-64.png">
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/admin-panel.css" />
</head>

<body>
    <div class="main-panel">
        <h1>پنل مدیریت <span style="color:#007bec">آبی مپ</span></h1>
        <div class="box">
            <a class="statusToggle" href="<?= BASE_URL ?>" target="_blank">🏠</a>
            <a class="statusToggle active" href="?status=1">فعال</a>
            <a class="statusToggle" href="?status=0">غیرفعال</a>
            <a class="statusToggle" href="?logout=1" style="float:left">خروج</a>
        </div>
        <div class="box">
            <table class="tabe-locations">
                <thead>
                    <tr>
                        <th style="width:40%">عنوان مکان</th>
                        <th style="width:15%" class="text-center">تاریخ ثبت</th>
                        <th style="width:10%" class="text-center">lat</th>
                        <th style="width:10%" class="text-center">lng</th>
                        <th style="width:25%">وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++) : ?>
                        <tr>
                            <td>نام مکان اینجا</td>
                            <td class="text-center">12 خرداد 95</td>
                            <td class="text-center">25.454</td>
                            <td class="text-center">34.456</td>
                            <td>
                                <button class="statusToggle active" data-loc='111'>فعال</button>
                                <button class="statusToggle" data-loc='111'>غیر فعال</button>
                                <button class="preview" data-loc='111'>👁️‍🗨️</button>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">
                <img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjM2NXB0IiB2aWV3Qm94PSIwIDAgMzY1LjcxNzMzIDM2NSIgd2lkdGg9IjM2NXB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiNmNDQzMzYiPjxwYXRoIGQ9Im0zNTYuMzM5ODQ0IDI5Ni4zNDc2NTYtMjg2LjYxMzI4Mi0yODYuNjEzMjgxYy0xMi41LTEyLjUtMzIuNzY1NjI0LTEyLjUtNDUuMjQ2MDkzIDBsLTE1LjEwNTQ2OSAxNS4wODIwMzFjLTEyLjUgMTIuNTAzOTA2LTEyLjUgMzIuNzY5NTMyIDAgNDUuMjVsMjg2LjYxMzI4MSAyODYuNjEzMjgyYzEyLjUwMzkwNyAxMi41IDMyLjc2OTUzMSAxMi41IDQ1LjI1IDBsMTUuMDgyMDMxLTE1LjA4MjAzMmMxMi41MjM0MzgtMTIuNDgwNDY4IDEyLjUyMzQzOC0zMi43NS4wMTk1MzItNDUuMjV6bTAgMCIvPjxwYXRoIGQ9Im0yOTUuOTg4MjgxIDkuNzM0Mzc1LTI4Ni42MTMyODEgMjg2LjYxMzI4MWMtMTIuNSAxMi41LTEyLjUgMzIuNzY5NTMyIDAgNDUuMjVsMTUuMDgyMDMxIDE1LjA4MjAzMmMxMi41MDM5MDcgMTIuNSAzMi43Njk1MzEgMTIuNSA0NS4yNSAwbDI4Ni42MzI4MTMtMjg2LjU5Mzc1YzEyLjUwMzkwNi0xMi41IDEyLjUwMzkwNi0zMi43NjU2MjYgMC00NS4yNDYwOTRsLTE1LjA4MjAzMi0xNS4wODIwMzJjLTEyLjUtMTIuNTIzNDM3LTMyLjc2NTYyNC0xMi41MjM0MzctNDUuMjY5NTMxLS4wMjM0Mzd6bTAgMCIvPjwvZz48L3N2Zz4=" />
            </span>
            <div class="modal-content">
                <iframe id='mapWindow' src="#" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            $('.preview').click(function() {
                $('.modal-overlay').fadeIn(250);
                $('#mapWindow').attr('src', '<?= BASE_URL ?>');
            });
            $('.modal-overlay .close').click(function() {
                $('.modal-overlay').fadeOut(250);
            });
        });
    </script>
</body>

</html>
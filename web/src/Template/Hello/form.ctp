<!DOCTYPE html>
<html>
<head>
    <title><?= h($values['title']) ?></title>
    <style>
        h1 {
            font-size: 45pt;
            margin: 0px 0px 10px 0px;
            padding: 0px 20px;
            color: #fff;
            background: linear-gradient(to right, #aaa, #fff);
        }
        p {
            font-size: 14pt; color: #666;
        }
    </style>
</head>
<body>
    <header class="row">
        <h1><?= h($values['title']) ?></h1>
    </header>
    <div class="row">
        <p><?= h($values['message']) ?></p>
    </div>
</body>

</htm>

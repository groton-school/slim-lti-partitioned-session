<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
    <style>
        @keyframes spinner-border {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .spinner-border {
            position: absolute;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
            height: 15vw;
            width: 15vw;
            display: inline-block;
            vertical-align: -0.125em;
            border-radius: 50%;
            border: 0.25em solid hsla(0, 0%, 50%, 0.75);
            border-right-color: transparent;
            animation: 0.75s linear infinite spinner-border;
        }

        .spinner-border:has(+ .container) {
            display: none;
        }
    </style>
</head>

<body>
    <div class="spinner-border"></div>
    <?= $content ?>
</body>

</html>
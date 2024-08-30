<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Crud</title>
    <link data-minify="1" href="https://www.bacancytechnology.com/blog/wp-content/cache/min/1/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css?ver=1723808772" rel="stylesheet" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Livewire CRUD Blog</a>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center mt-3">
            @livewire('post')
        </div>
    </div>

    @livewireScripts
<script>var rocket_lcp_data = {"ajax_url":"https:\/\/www.bacancytechnology.com\/blog\/wp-admin\/admin-ajax.php","nonce":"fe83b8ca0f","url":"https:\/\/www.bacancytechnology.com\/blog\/crud-operations-using-laravel-livewire","is_mobile":true,"elements":"img, video, picture, p, main, div, li, svg","width_threshold":393,"height_threshold":830,"debug":null}</script><script data-name="wpr-lcp-beacon" src='https://www.bacancytechnology.com/blog/wp-content/plugins/wp-rocket/assets/js/lcp-beacon.min.js' async></script></body>
</html>

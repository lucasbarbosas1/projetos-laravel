<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 18/06/2016
 * Time: 12:50
 */
?>
<html>
    <head>
        @yield('assets')
    </head>
    <body>
        @yield('menu')

        @yield('content')

        @yield('modals')

        @yield('jsrender')
    </body>
</html>
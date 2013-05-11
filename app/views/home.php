<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Laravel 4 + EmberJS Todo App</title>
    <meta name="description" content="A sample todo application build with Laravel 4 and EmberJS">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

    <script type="text/x-handlebars">
        <div class="container">
            <div class="row">
                <div class="span6 offset3">
                    <header class="app-header">
                        <h1 class="app-title">todos</h1>
                    </header>
                    <div class="main">
                        <form action="">
                            <input type="text" class="input-todo input-block-level" placeholder="What needs to be done?">
                        </form>
                        <ul class="todo-list unstyled">
                            <li class="clearfix">
                                <input type="checkbox" class="todo-checkbox">
                                <span class="todo">Sample todo item asdf kajs asd asd asd asd asd</span>
                                <button class="delete"><i class="icon-trash"></i></button>
                            </li>
                        </ul>
                    </div>
                    <footer class="details clearfix">
                        <span class="remaining pull-left">
                            <strong>1</strong> items left
                        </span>
                        <ul class="filters unstyled pull-right">
                            <li>
                                <a href="#" class="active">All</a>
                            </li>
                            <li>
                                <a href="#">Completed</a>
                            </li>
                            <li>
                                <a href="#">Remaining</a>
                            </li>
                        </ul>
                    </footer>
                </div>
                <div class="span6 offset3">
                    <div class="info">
                        <p>Double-click a todo to edit</p>
                        <p>Created by <a href="https://twitter.com/jahvi" target="_blank">@jahvi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.0.0-rc.3/handlebars.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ember.js/1.0.0-rc.3/ember.js"></script>
    <script src="//builds.emberjs.com.s3.amazonaws.com/ember-data-latest.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>

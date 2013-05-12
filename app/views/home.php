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
                    {{outlet}}
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

    <script type="text/x-handlebars" id="todos">
        <div class="main">
            <form {{action "createTodo" on="submit"}}>
                {{view Ember.TextField class="input-todo input-block-level" placeholder="What needs to be done?" valueBinding="todoText"}}
            </form>
            <ul class="todo-list unstyled">
            {{#each todo in model}}
                <li {{bindAttr class=":clearfix todo.isCompleted:completed"}}>
                    {{view Ember.Checkbox checkedBinding="todo.isCompleted" class="todo-checkbox"}}
                    <span class="todo">{{todo.text}}</span>
                    <button class="delete"><i class="icon-trash"></i></button>
                </li>
            {{/each}}
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
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.0.0-rc.3/handlebars.min.js"></script>
    <script src="//builds.emberjs.com.s3.amazonaws.com/ember-latest.js"></script>
    <script src="//builds.emberjs.com.s3.amazonaws.com/ember-data-latest.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/router.js"></script>
    <script src="/js/store.js"></script>
    <script src="/js/models/todo.js"></script>
    <script src="/js/controllers/todos.js"></script>
</body>
</html>

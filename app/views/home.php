<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Laravel 4 + EmberJS Todo App</title>
    <meta name="description" content="A sample todo application built with Laravel 4 and EmberJS">
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
                        <p>
                            Created by <a href="https://twitter.com/jahvi" target="_blank">@jahvi</a> - <a href="https://github.com/jahvi/laravel-ember-todo">Source code</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/x-handlebars" id="todos">
        <div class="main">
            <form {{action "createTodo" on="submit"}}>
                {{input class="input-todo input-block-level" placeholder="What needs to be done?" value=todoText}}
            </form>
            <ul class="todo-list unstyled">
            {{#each controller itemController="todo"}}
                <li {{bind-attr class=":clearfix isCompleted:completed"}}>
                {{#if isEditing}}
                    {{edit-todo class="input-block-level" value=bufferedText insert-newline="doneEditing" focus-out="cancelEditing" escape-press="cancelEditing"}}
                {{else}}
                    {{input type="checkbox" class="todo-checkbox" checked=isCompleted}}
                    <span class="todo" {{action "editTodo" on="doubleClick"}}>{{text}}</span>
                    <button class="delete" {{action "deleteTodo"}}><i class="icon-trash"></i></button>
                {{/if}}
                </li>
            {{else}}
                <p>No todos to show here!</p>
            {{/each}}
            </ul>
        </div>
        <footer class="details clearfix">
            <span class="remaining pull-left">
                {{{remainingFormatted}}}
            </span>
            <ul class="filters unstyled pull-right">
                <li>
                    {{#link-to "todos.index"}}All{{/link-to}}
                </li>
                <li>
                    {{#link-to "todos.completed"}}Completed{{/link-to}}
                </li>
                <li>
                    {{#link-to "todos.remaining"}}Remaining{{/link-to}}
                </li>
            </ul>
            <span class="order pull-right">
                Order <a href="#" {{bind-attr class=":order-direction orderAsc:ascending"}} {{action "orderToggle"}}></a>
            </span>
        </footer>
    </script>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
    <script src="//builds.emberjs.com/tags/v1.3.0/ember.min.js"></script>
    <script src="//builds.emberjs.com/tags/v1.0.0-beta.3/ember-data.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/router.js"></script>
    <script src="/js/models/todo.js"></script>
    <script src="/js/controllers/todo.js"></script>
    <script src="/js/controllers/todos.js"></script>
    <script src="/js/views/edit_todo.js"></script>
</body>
</html>

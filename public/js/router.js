/* global Ember, App */

App.Router.map(function () {
    this.resource('todos', { path : '/'}, function () {
        this.route('completed');
        this.route('remaining');
    });
});

App.TodosIndexRoute = Ember.Route.extend({
    setupController: function () {
        var todos = App.Todo.find();
        this.controllerFor('todos').set('model', todos);
    }
});

App.TodosCompletedRoute = Ember.Route.extend({
    setupController: function () {
        var todos = App.Todo.filter(function (todo) {
            if (todo.get('isCompleted')) {
                return true;
            }
        });

        this.controllerFor('todos').set('model', todos);
    }
});

App.TodosRemainingRoute = Ember.Route.extend({
    setupController: function () {
        var todos = App.Todo.filter(function (todo) {
            if (!todo.get('isCompleted')) {
                return true;
            }
        });

        this.controllerFor('todos').set('model', todos);
    }
});
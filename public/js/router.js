/* global Ember, App */

App.Router.map(function () {
    this.resource('todos', { path : '/'}, function () {
        this.route('completed');
    });
});

App.TodosRoute = Ember.Route.extend({
    model: function () {
        return App.Todo.find();
    }
});

App.TodosIndexRoute = Ember.Route.extend({
    setupController: function () {
        var todos = App.Todo.find();
        this.controllerFor('todos').set('filteredTodos', todos);
    }
});

App.TodosCompletedRoute = Ember.Route.extend({
    setupController: function () {
        var todos = App.Todo.filter(function (todo) {
            if (todo.get('isCompleted')) {
                return true;
            }
        });

        this.controllerFor('todos').set('filteredTodos', todos);
    }
});
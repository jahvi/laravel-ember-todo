/* global Ember, App */

App.Router.map(function () {
    this.resource('todos', { path : '/'}, function () {
        this.route('completed');
        this.route('remaining');
    });
});

App.TodosRoute = Ember.Route.extend({
    model: function () {
        return this.store.find('todo');
    }
});

App.TodosIndexRoute = Ember.Route.extend({
    setupController: function () {
        this.controllerFor('todos').set('model', this.modelFor('todos'));
    }
});

App.TodosCompletedRoute = Ember.Route.extend({
    setupController: function () {
        var todos = this.store.filter('todo', function (todo) {
            return todo.get('is_completed');
        });

        this.controllerFor('todos').set('model', todos);
    }
});

App.TodosRemainingRoute = Ember.Route.extend({
    setupController: function () {
        var todos = this.store.filter('todo', function (todo) {
            return !todo.get('is_completed');
        });

        this.controllerFor('todos').set('model', todos);
    }
});
/* global App, Ember */

App.TodoController = Ember.ObjectController.extend({
    deleteTodo: function () {
        var todo = this.get('model');

        todo.deleteRecord();
        todo.get('store').commit();
    }
});
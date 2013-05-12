/* global App, Ember */

App.TodoController = Ember.ObjectController.extend({
    isEditing: false,

    deleteTodo: function () {
        var todo = this.get('model');

        todo.deleteRecord();
        todo.get('store').commit();
    },

    editTodo: function () {
        this.set('isEditing', true);
    }
});
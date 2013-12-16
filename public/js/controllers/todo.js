/* global App, Ember */

App.TodoController = Ember.ObjectController.extend({
    isEditing: false,

    actions: {
        deleteTodo: function () {
            var todo = this.get('model');

            todo.deleteRecord();
            todo.save();
        },

        editTodo: function () {
            this.set('isEditing', true);
        }
    }

});
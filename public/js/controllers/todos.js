/* global App, Ember */

App.TodosController = Ember.ArrayController.extend({
    createTodo: function () {
        var todoText = this.get('todoText');

        if (!todoText) {
            return;
        }

        App.Todo.createRecord({
            text: todoText,
            isCompleted: false
        });

        this.set('todoText', '');

        this.get('store').commit();
    }
});
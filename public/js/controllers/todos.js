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
    },

    remaining: function () {
        return this.filterProperty('isCompleted', false).get('length');
    }.property('@each.isCompleted'),

    remainingFormatted: function () {
        var remainingTodos = this.get('remaining'),
            todoPlural     = remainingTodos === 1 ? 'item' : 'items';

        return '<strong>%@</strong> %@ left'.fmt(remainingTodos, todoPlural);
    }.property('remaining')
});
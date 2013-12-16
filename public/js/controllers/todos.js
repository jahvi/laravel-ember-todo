/* global App, Ember */

App.TodosController = Ember.ArrayController.extend({
    orderAsc: true,

    createTodo: function () {
        var todoText = this.get('todoText');

        if (!todoText) {
            return;
        }

        App.Todo.createRecord({
            text: todoText,
            is_completed: false
        });

        this.set('todoText', '');

        this.get('store').commit();
    },

    remaining: function () {
        return this.filterProperty('is_completed', false).get('length');
    }.property('@each.is_completed'),

    remainingFormatted: function () {
        var remainingTodos = this.get('remaining'),
            todoPlural     = remainingTodos === 1 ? 'item' : 'items';

        return '<strong>%@</strong> %@ left'.fmt(remainingTodos, todoPlural);
    }.property('remaining'),

    orderToggle: function () {
        this.set('sortProperties', ['text']);
        this.set('sortAscending', this.get('orderAsc'));

        this.set('orderAsc', !this.get('orderAsc'));
    }
});
/* global App, Ember */

App.TodosController = Ember.ArrayController.extend({
    orderAsc: true,

    actions: {
        createTodo: function () {
            var todoText, todo;

            todoText = this.get('todoText').trim();

            if (!todoText) {
                return;
            }

            todo = this.store.createRecord('todo', {
                text: todoText,
                is_completed: false
            });

            todo.save();

            this.set('todoText', '');
        }

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
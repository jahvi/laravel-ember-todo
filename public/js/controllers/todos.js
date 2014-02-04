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
        },

        orderToggle: function () {
            this.set('sortProperties', ['text']);
            this.set('sortAscending', this.get('orderAsc'));

            this.set('orderAsc', !this.get('orderAsc'));
        }
    },

    remaining: Ember.computed.filterBy('content', 'is_completed', false)

});
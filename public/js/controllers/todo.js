/* global App, Ember */

App.TodoController = Ember.ObjectController.extend({
    isEditing: false,

    bufferedText: Ember.computed.oneWay('text'),

    actions: {
        deleteTodo: function () {
            var todo = this.get('model');

            todo.deleteRecord();
            todo.save();
        },

        editTodo: function () {
            this.set('isEditing', true);
        },

        cancelEditing: function() {
            this.set('isEditing', false);
        },

        doneEditing: function() {
            var bufferedText = this.get('bufferedText').trim();

            if (!bufferedText) {
                this.send('deleteTodo');
            } else {
                var todo = this.get('model');
                todo.set('text', bufferedText);
                todo.save();
            }

            // Re-set newly edited title to persist it's trimmed version
            this.set('bufferedText', bufferedText);
            this.set('isEditing', false);
        }
    }

});
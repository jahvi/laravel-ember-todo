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
            this.set('bufferedText', this.get('text'));
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
    },

    isCompleted: function(key, value){
        var todo = this.get('model');

        if (value === undefined) {
            // property being used as a getter
            return todo.get('is_completed');
        } else {
            // property being used as a setter
            todo.set('is_completed', value);
            todo.save();
            return value;
        }
    }.property('model.is_completed')

});
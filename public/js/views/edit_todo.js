/* global App, Ember */

App.EditTodoView = Ember.TextField.extend({
    classNames: ['input-block-level'],

    valueBinding: Ember.Binding.oneWay('todo.text'),

    change: function () {
        var value = this.get('value');

        if (Ember.isEmpty(value)) {
            this.get('controller').deleteTodo();
        }
    },

    focusOut: function () {
        this.set('controller.isEditing', false);
    },

    insertNewline: function () {
        this.set('controller.isEditing', false);
        this.set('todo.text', this.get('value'));
    },

    didInsertElement: function () {
        this.$().focus();
    }
});
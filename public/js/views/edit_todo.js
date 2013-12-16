/* global App, Ember */

App.EditTodoView = Ember.TextField.extend({
    focusOnInsert: function () {
        this.$().focus();
    }.on('didInsertElement')
});

Ember.Handlebars.helper('edit-todo', App.EditTodoView);
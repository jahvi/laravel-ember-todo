/* global App, Ember */

App.TodosView = Ember.View.extend({
	focusInput: function() {
		this.$('#new-todo').focus();
	}.on('didInsertElement')
});
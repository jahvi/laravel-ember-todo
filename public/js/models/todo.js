/* global App, Ember */

App.Todo = DS.Model.extend({
    text: DS.attr('string'),
    isCompleted: DS.attr('boolean')
});
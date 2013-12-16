/* global App, DS */

App.Todo = DS.Model.extend({
    text: DS.attr('string'),
    is_completed: DS.attr('boolean')
});
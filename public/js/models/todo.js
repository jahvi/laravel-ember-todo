/* global App, Ember, DS */

App.Todo = DS.Model.extend({
    text: DS.attr('string'),
    isCompleted: DS.attr('boolean'),

    todoDidChange: function () {
        Ember.run.once(this, function () {
            this.get('store').commit();
        });
    }.observes('isCompleted', 'text')
});
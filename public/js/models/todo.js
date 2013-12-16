/* global App, Ember, DS */

App.Todo = DS.Model.extend({
    text: DS.attr('string'),
    is_completed: DS.attr('boolean'),

    todoDidChange: function () {
        Ember.run.once(this, function () {
            this.get('store').commit();
        });
    }.observes('is_completed', 'text')
});
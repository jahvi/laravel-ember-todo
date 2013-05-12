<?php

class Todo extends Eloquent {

    public $timestamps = false;

    protected $fillable = array('text', 'is_completed');

}
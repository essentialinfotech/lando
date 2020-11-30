<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    protected $fillable = [
        'image', 'heading', 'para1', 'para2', 'para3', 'card_title', 'card_amount', 'status'];
    }
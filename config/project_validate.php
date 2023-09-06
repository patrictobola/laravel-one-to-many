<?php
return
    [
        'title' => 'bail|required|string|max:255',
        'description' => 'bail|required|string',
        'date' => 'bail|required|date',
        'thumb' => 'bail|required|url:http,https|max:500'
    ];

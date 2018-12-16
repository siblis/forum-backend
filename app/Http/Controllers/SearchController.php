<?php

namespace App\Http\Controllers;

use App\Search;

class SearchController extends Controller
{
    public function search()
    {
        return Search::searchQuery();
    }
}

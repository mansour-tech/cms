<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Page;

class PageComposer
{
    protected $pages;

    public function __construct(Page $page)
    {
        $this->pages=$page;
    }

    public function compose(View $view)
    {       
        return $view->with('pages',$this->pages->all());
    }
}
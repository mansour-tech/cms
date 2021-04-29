<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer 
{

    protected $categories;

    public function __construct(Category $categories)
    {
        $this->categories = $categories ;
    }
    public function compose(View $view)
    {
        $view->with('categories', $this->categories->all());
    }
}
?>
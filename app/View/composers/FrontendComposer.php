<?php
 
namespace App\View\Composers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\View\View;
 
class FrontendComposer
{
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $banners = Banner::latest()->paginate(1);
        $categories = Category::all();
        $view->with([
            'categories' => $categories,
            'banners' => $banners
        ]);
    }
}
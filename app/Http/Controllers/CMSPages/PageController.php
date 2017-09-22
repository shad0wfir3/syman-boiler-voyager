<?php

namespace App\Http\Controllers\CMSPages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TCG\Voyager\Models\Page;

class PageController extends Controller
{
    public function index($page_slug){
        $page = Page::where('slug',$page_slug)->active()->firstorFail();
        return view('website.pages.cms.default.index',compact('page'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Section;

class MainController extends Controller
{
    public function index($locale, $view = 'index')
    {
        $this->checkLocale($locale);
        $page = $this->getPage($view);

        if ($locale === 'am') {
            $sectionSelect = ['id', 'name', 'description', 'url', 'type'];
        } elseif ($locale === 'en') {
            $sectionSelect = ['id', 'eName as name', 'eDescription as description', 'url', 'type'];
        }

        $sections = Section::with(['mainFiles', 'child', 'charts'])
            ->select($sectionSelect)
            ->where('page', '=', $page)
            ->whereNull('parent_id')
            ->orderBy('order', 'asc')
            ->get();

        foreach ($sections as &$section) {
            if ($section->type === 6) {
                $section->description = explode(', ', strip_tags($section->description));
            } elseif ($section->type === 2) {
                $section->description = explode('<p>', $section->description);
            }
        }

        return view("main/$view", compact(['sections', 'locale', 'view']));
    }

    private function getPage($page)
    {
        switch ($page) {
            case 'index':
                $page =  1;
                break;
            case 'domestic':
                $page = 2;
                break;
            case 'statistics':
                $page = 3;
                break;
            case 'your-rights':
                $page = 4;
                break;
        }

        if (!is_int($page)) {
            abort(400);
        }

        return $page;
    }

    private function checkLocale($locale)
    {
        if (!in_array($locale, ['en', 'am'])) {
            abort(400);
        }
    }
}

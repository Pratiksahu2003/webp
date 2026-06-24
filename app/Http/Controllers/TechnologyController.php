<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Technology;
use App\Support\TechnologyStack;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    public function index(): View
    {
        $technologies = Technology::active()->ordered()->get();
        $sections = Section::active()->ordered()->get();
        $stacks = TechnologyStack::all();
        $stackTechnologies = TechnologyStack::groupByStack($technologies);

        return view('technologies.index', compact('technologies', 'sections', 'stacks', 'stackTechnologies'));
    }

    public function stack(string $stack): View
    {
        $stackData = TechnologyStack::find($stack);

        abort_unless($stackData !== null, 404);

        $technologies = Technology::active()
            ->ordered()
            ->whereIn('category', $stackData['categories'])
            ->get();

        $groupedByType = $technologies->groupBy('technology_type');
        $sections = Section::active()->ordered()->get();

        return view('technologies.stack', compact('stackData', 'technologies', 'groupedByType', 'sections'));
    }

    public function show(Technology $technology): View
    {
        abort_unless($technology->status || $technology->is_active, 404);

        $technology->load(['subServices' => fn ($query) => $query->where('status', true)->with('service')]);

        $stackSlug = TechnologyStack::slugForCategory($technology->category);
        $stackData = $stackSlug ? TechnologyStack::find($stackSlug) : null;

        $related = Technology::active()
            ->ordered()
            ->where('category', $technology->category)
            ->where('id', '!=', $technology->id)
            ->take(6)
            ->get();

        $sections = Section::active()->ordered()->get();

        return view('technologies.show', compact('technology', 'stackData', 'stackSlug', 'related', 'sections'));
    }
}

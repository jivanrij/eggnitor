<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class WeekStatus extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WeekStatus>
     */
    public static $model = \App\Models\WeekStatus::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $weeks = [];
        foreach(range(1,52) as $week) {
            $weeks[$week] = $week;
        }

        return [
            BelongsTo::make('House')->sortable()->filterable(),
            Select::make('Week')
                ->options($weeks)
                ->required()
                ->default(now()->week)
                ->sortable()
                ->filterable(),
            Select::make('Year')->options([
                2023 => 2023,
                2024 => 2024,
                2025 => 2025,
                2026 => 2026,
                2027 => 2027,
                2028 => 2028,
            ])->required()->default(now()->year)->sortable()->filterable(),
            Select::make('Status')->options([
                0 => 'Nog doen',
                1 => 'Niet thuis',
                2 => '6 verkocht',
                3 => '10 verkocht',
                4 => 'Niets verkocht',
            ])->displayUsingLabels()->required()->default(0)->sortable()->filterable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}

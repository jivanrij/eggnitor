<?php

namespace App\Nova;

use App\Models\House\Status;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class House extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\House>
     */
    public static $model = \App\Models\House::class;

    public static $perPageOptions = [500];

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

    public function title()
    {
        return $this->street->name . ' ' . $this->number;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('Street')->filterable()->sortable(),
            Text::make('Number')->required()->sortable()->filterable()->sortable(),
            HasMany::make('Week Statuses', 'weekStatuses', WeekStatus::class),
            HasMany::make('House Notes', 'houseNotes', HouseNote::class),
            Select::make('Status')->options([
                Status::Active->slug() => Status::Active->label(),
                Status::InActive->slug() => Status::InActive->label(),
            ])->displayUsingLabels()->required()->default(0)->sortable()->filterable(),
            BelongsTo::make('Route', 'walkingRoute', WalkingRoute::class)->filterable()->sortable(),
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
        return [
            (new DownloadExcel)
                ->withFilename(uniqid().'.xlsx')
                ->withHeadings()
                ->only('street', 'number', 'statusLabel', 'lastNote')
                ->withHeadings('Straat', 'Nummer', 'Status', 'Laatste notitie')
        ];
    }
}

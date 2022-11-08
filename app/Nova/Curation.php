<?php

namespace App\Nova;

use App\Enums\DiscountType;
use App\Models\Newspaper;
use App\Nova\Actions\AcceptAdmin;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Ek0519\Quilljs\Quilljs;
use Hubertnnn\LaravelNova\Fields\DynamicSelect\DynamicSelect;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;

class Curation extends Resource
{
    /*public static $group = "4. 판매관리";

    public static $priority = 2;*/

    public static $group = "큐레이션";

    public static $priority = 1;

    public static function label()
    {
        return __("Curations");
    }


    public static function singularLabel()
    {
        return __("Curation");
    }

    public static $model = \App\Models\Curation::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        "title"
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make(__("User"), "user", User::class)->required(),
            Text::make(__("title"), "title")->required(),
            HasMany::make(__("Newspapers"), "newspapers", \App\Nova\Newspaper::class),
            /*Images::make(__("m"), "m"),
            Textarea::make(__("title"), "title")->rules(["required", "string", "max:500"]),
            Quilljs::make(__("content"), "content")->config([
                ["bold"],
                [ ['header'=> 1 ], ['header'=> 2]],
                [[ 'size'=> ["small", false, "large", "huge"] ]],
                [[ 'header'=> [1, 2, 3, 4, 5, 6, false] ]],
                // [[ 'color'=> [] ], [ 'background'=> [] ]],
                [[ 'align'=> [] ]],
                ["link", "image", "video"]
            ])->maxFileSize(20)->rules([])->withFiles("s3")->height(600),*/
        ];
    }
    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [

        ];
    }
}

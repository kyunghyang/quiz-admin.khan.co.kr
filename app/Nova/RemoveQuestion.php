<?php

namespace App\Nova;

use App\Enums\DiscountType;
use App\Nova\Actions\AcceptAdmin;
use App\Nova\Actions\DeleteQuestion;
use App\Nova\Filters\FromFilter;
use App\Nova\Filters\ToFilter;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Ek0519\Quilljs\Quilljs;
use Hubertnnn\LaravelNova\Fields\DynamicSelect\DynamicSelect;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;

class RemoveQuestion extends Resource
{
    public static $group = "오늘의 퀴즈";

    public static $priority = 2;

    public static function label()
    {
        return __("RemoveQuestions");
    }


    public static function singularLabel()
    {
        return __("RemoveQuestion");
    }

    public static $model = \App\Models\Question::class;

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
        "title", "description"
    ];

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withTrashed()->whereNotNull("deleted_at");
    }

    public function authorizedToRestore(Request $request)
    {
        return false;
    }

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
            Text::make(__("title"), "title")->required(),

            Text::make(__("description"), "description")->displayUsing(function(){
                return substr($this->description, 0,20)."...";
            })->required()->exceptOnForms(),
            Textarea::make(__("description"), "description")->required()->onlyOnForms(),

            Boolean::make(__("public"), "public")->hideFromIndex(),

            Text::make(__("memo"), "memo")->displayUsing(function(){
                return substr($this->memo, 0,10)."...";
            })->required()->exceptOnForms(),
            Textarea::make(__("memo"), "memo")->required()->onlyOnForms(),

            Date::make(__("opened_at"), "opened_at")->required()->hideFromIndex(),

            Text::make(__("user_create"), "user_create")->exceptOnForms(),

            Text::make(__("url"), "url")->required()->onlyOnForms(),

            Textarea::make(__("explain"), "explain")->required(),


            DateTime::make(__("created_at"), "created_at")->sortable(),

            Text::make(__("user_remove"), "user_remove")->exceptOnForms(),

            Text::make(__("reason_remove"), "reason_remove")->exceptOnForms(),

            DateTime::make(__("deleted_at"), "deleted_at")->sortable(),

            /*Text::make(__("count_answer"), "user_create")->displayUsing(function(){
                $question = \App\Models\Question::find($this->id);

                return $question->answers()->count();
            })->exceptOnForms()->hideFromIndex(),

            HasMany::make(__("Options"), "options", Option::class),
            HasMany::make(__("Answer"), "answers", Answer::class),*/
            /*Number::make(__("point"), "point"),*/
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
            new FromFilter(),
            new ToFilter()
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
            (new DeleteQuestion())->canSee(function(Request $request){
                return $request->user()->master;
            })->canRun(function(Request  $request){
                return $request->user()->master;
            })
        ];
    }
}

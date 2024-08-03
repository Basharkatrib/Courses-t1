<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Illuminate\Http\Request;
use Laravel\Nova\Resource;

class Video extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Video';

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
        'id', 'title', 'description', 'url'
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
            ID::make()->sortable(),

            BelongsTo::make('Course')
                ->display('title')  // عرض عنوان الدورة
                ->sortable()
                ->rules('required'),

            Text::make('Title','title')
                ->sortable()
                ->rules('required', 'max:255'),
                
            Text::make('Teacher','teacher')
            ->sortable()
            ->rules('required', 'max:255'),

            Textarea::make('Description','description')
                ->rules('required'),

            Text::make('URL')
                ->rules('required', 'url'),

            Image::make('Image')
                ->disk('public')
                ->path('videos/images'),
        ];
    }
}

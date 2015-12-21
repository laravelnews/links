<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Generate an icon based on category slug
     *
     * @return string
     */
    public function icon()
    {
        switch ($this->slug) {
            case 'tips-tutorials':
                $icon = 'fa-lightbulb-o';
                break;
            case 'packages':
                $icon = 'fa-code';
                break;
            case 'css':
                $icon = 'fa-css3';
                break;
            case 'javascript':
                $icon = 'fa-file-code-o';
                break;
            case 'podcast':
                $icon = 'fa-microphone';
                break;
            case 'video':
                $icon = 'fa-video-camera';
                break;
            case 'event':
                $icon = 'fa-calendar-o';
                break;
            case 'job':
                $icon = 'fa-briefcase';
                break;
            default:
                $icon = 'fa-rocket';
        }
        return $icon;
    }
}
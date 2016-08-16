<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Article extends Model
{
    /**
    * Declare the fields you wish to be able to manipulate
    * Declare the fields you wish to be able to manipulate
    */
    protected $fillable = ['title','body','published_at','user_id','category_id'];

    /**
    * Convert dates into Carbon instance
    */
    protected $dates = ['published_at','created_at'];

    /**
    * Scopes
    */
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>=', Carbon::now());
    }

    /**
    * Sets published at attribute to friendly format
    */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
    * Gets list of tags only
    */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }

    /**
    * An article belongs to a user.
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * An article belongs to a category.
    */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
    * Article belongs to many tags : defines
    */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function belongsToLoggedinUser($user_id_in_article_table)
    {

        return ($user_id_in_article_table == Auth::user()->id) ? TRUE : FALSE;
    }

}

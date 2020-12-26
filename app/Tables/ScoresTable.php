<?php

namespace App\Tables;

use App\Model\Scores;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Support\Facades\Route;
use \Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class ScoresTable extends AbstractTable
{
    protected $classes = 'bg-light';

    protected Request $request;

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->request = $request;
    // }

    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
      // Route::get('/scores/destroy/{$id}', 'HomeController@destroy')->name('scores.destroy');
        // $classes = 'bg-light';
        $table = (new Table)->model(Scores::class)->identifier('Scores table')
                  ->query(function(Builder $query){
                    $query->whereDate('created_at', Carbon::today());
                  })->routes([
                    'index'   => ['name' => 'scores.index'],
                    'create'  => ['name' => 'scores.create'],
                    // 'edit'    => ['name' => 'scores.edit'],
                    'destroy' => ['name' => 'scores.destroy'],
                  ]);
        $table->destroyConfirmationHtmlAttributes(function (Scores $scores) {
            return [
                'data-confirm' => 'Are you sure you want to delete the score of ' . $scores->score . ' for member ' . $scores->name . ' ?',
                'id' => 'destroy-button-'.$scores->id,
            ];
        });
        // dd($table);
        // route('scores.destroy', ['id' => $id]);
        // $table->trClasses(['{{ bg-danger']);
        // dd($table->toArray());


        // $table->rowsConditionalClasses(function(Scores $scores){
        //   $this->classes = 'bg-danger';
        //       return $scores->score < 0;
        //     }, [$this->classes]);
        return $table;
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
      // $table->column('member_id')->sortable()->searchable();
      $table->column('name')->title('Member');
      $table->column('score')->title('Score')->sortable()->searchable();
      // $table->column()->link(function(News $news){
      //       return route('news.show', $news);
      //   })->button(['btn', 'btn-sm', 'btn-primary']);
      $table->column()->link(function(Scores $scores){
          return route('scores.destroy', $scores->id);
      })->button(['btn', 'btn-sm', 'btn-primary']);
        // $table->column('member_id')->sortable()->searchable();
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        // $table->result()->title('Total Score')->html(function(Scores $scores){
        //     return $scores->sum('score');
        // });
    }
}

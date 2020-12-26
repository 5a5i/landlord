<?php

namespace App\Tables;

use App\Model\Members;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class MembersTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(Members::class)->routes([
            'index'   => ['name' => 'members.index'],
            'create'  => ['name' => 'members.create'],
            'edit'    => ['name' => 'members.edit'],
            // 'destroy' => ['name' => 'members.destroy'],
        ])->destroyConfirmationHtmlAttributes(function (Members $members) {
            return [
                'data-confirm' => __('Are you sure you want to this member ' . $members->name . ' ?'),
            ];
        });
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
        $table->column('name')->title('Member Name')->sortable()->searchable();
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}

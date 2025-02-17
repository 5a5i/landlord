<tbody>
    @if($table->getPaginator()->isEmpty())
        <tr{{ classTag($table->getTrClasses()) }}>
            <td{{ classTag($table->getTdClasses(), 'text-center', 'p-3') }}{{ htmlAttributes($table->getColumnsCount() > 1 ? ['colspan' => $table->getColumnsCount()] : null) }} scope="row">
                <span class="text-info">
                    {!! config('laravel-table.icon.info') !!}
                </span>
                @lang('No results were found.')
            </td>
        </tr>
    @else
        @foreach($table->getPaginator() as $model)
            <tr{{ classTag($table->getTrClasses(), $model->conditionnalClasses, $model->disabledClasses) }}>
                @foreach($table->getColumns() as $columnKey => $column)
                    @php
                        $value = $model->{$column->getDbField()};
                        $customValue = $column->getCustomValueClosure() ? ($column->getCustomValueClosure())($model, $column) : null;
                        $html = $column->getCustomHtmlClosure() ? ($column->getCustomHtmlClosure())($model, $column) : null;
                        $url = $column->getUrlClosure()
                            ? ($column->getUrlClosure())($model, $column)
                            : ($column->getUrl() === '__VALUE__' ? ($customValue ? $customValue : $value) : $column->getUrl());
                        $showPrepend = $column->getPrependedHtml() && (($customValue || $value) || $column->shouldForcePrependedHtmlDisplay());
                        $showAppend = $column->getAppendedHtml() && (($customValue || $value) || $column->shouldForceAppendedHtmlDisplay());
                        $showLink = $url && ($customValue || $value || $showPrepend || $showAppend);
                        $showButton = $column->getButtonClasses() && ($value || $customValue || $showPrepend || $showAppend);
                    @endphp
                    <td class="{{rtrim(str_replace('class="','',classTag($table->getTdClasses(), $column->getClasses())),'"')}} {{ $column->getDbField() == 'score' ? (is_numeric((int)$value) ? ((int)$value > 0 ? 'bg-success' : ((int)$value < 0 ? 'bg-danger' : 'bg-light')) : '') : ''}}" {{-- classTag($table->getTdClasses(), $column->getClasses()) --}}{{ htmlAttributes($columnKey === 0 ? ['scope' => 'row'] : null) }}>
                        {{-- custom html element --}}
                        @if($html)
                            {!! $html !!}
                        @else
                            {{-- link --}}
                            @if($showLink)
                                <a href="{{ $url }}" title="{{ $customValue ? $customValue : $value }}">
                            @endif
                            {{-- button start--}}
                            @if($showButton)
                                <button{{ classTag(
                                    $column->getButtonClasses(),
                                    $value ? Str::slug(strip_tags($value), '-') : null,
                                    $customValue ? Str::slug(strip_tags($customValue), '-') : null
                                ) }}>
                            @endif
                                {{-- prepend --}}
                                @if($showPrepend)
                                    {!! $column->getPrependedHtml() !!}
                                @endif
                                {{-- custom value --}}
                                @if($customValue)
                                    {{ $customValue }}
                                {{-- string limit --}}
                                @elseif($column->getStringLimit())
                                    {{ Str::limit(strip_tags($value), $column->getStringLimit()) }}
                                {{-- datetime format --}}
                                @elseif($column->getDateTimeFormat())
                                    {{ $value
                                        ? \Carbon\Carbon::parse($value)->format($column->getDateTimeFormat())
                                        : null }}
                                {{-- basic value --}}
                                @else
                                    {!! $value !!}
                                @endif
                                {{-- append --}}
                                @if($showAppend)
                                    {!! $column->getAppendedHtml() !!}
                                @endif
                            {{-- button end --}}
                            @if($showButton)
                                </button>
                            @endif
                            {{-- link end --}}
                            @if($showLink)
                                </a>
                            @endif
                        @endif
                    </td>
                @endforeach
                {{-- actions --}}
                @if(($table->isRouteDefined('edit') || $table->isRouteDefined('destroy') || $table->isRouteDefined('show')))
                    <td{{ classTag($table->getTdClasses(), 'text-right') }}>
                        @if(! $model->disabledClasses)
                            <div class="d-flex justify-content-end">
                                @include('laravel-table::' . $table->getShowTemplatePath())
                                @include('laravel-table::' . $table->getEditTemplatePath())
                                @include('laravel-table::' . $table->getDestroyTemplatePath())
                            </div>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        @include('laravel-table::' . $table->getResultsTemplatePath())
    @endif
</tbody>

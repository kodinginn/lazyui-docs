@aware([ 'tableName', 'primaryKey' ])
@props(['row', 'rowIndex'])

@if ($this->collapsingColumnsAreEnabled && $this->hasCollapsedColumns)
    @php($customAttributes = $this->getTrAttributes($row, $rowIndex))
    <tr
        x-data
        @toggle-row-content.window="($event.detail.tableName === '{{ $tableName }}' && $event.detail.row === {{ $rowIndex }}) ? $el.classList.toggle('hidden') : null"
        {{
            $attributes->merge([
                    'wire:loading.class.delay' => 'opacity-50 dark:bg-cat-900 dark:opacity-60',
                    'wire:key' => $tableName.'-row-'.$row->{$primaryKey}.'-collapsed-contents',
                ])
                ->merge($customAttributes)
                ->class([
                    'hidden bg-cat-200 dark:bg-cat-750/50 dark:text-white rappasoft-striped-row' => ($customAttributes['default'] ?? true),
                ])
                ->except(['default','default-styling','default-colors'])
        }}
    >
        <td colspan="{{ $this->getColspanCount }}" class="text-left pt-4 pb-2 px-4">
            <div>
                @foreach($this->getCollapsedColumnsForContent as $colIndex => $column)
                    <p
                        wire:key="{{ $tableName }}-row-{{ $row->{$primaryKey} }}-collapsed-contents-{{ $colIndex }}"
                        @class([
                            'block mb-2 text-sm',
                            'sm:block' => $column->shouldCollapseAlways(),
                            'sm:block md:hidden' => !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && $column->shouldCollapseOnMobile(),
                            'sm:block lg:hidden' => !$column->shouldCollapseAlways() && ($column->shouldCollapseOnTablet() || $column->shouldCollapseOnMobile()),
                        ])
                    >
                        <strong>{{ $column->getTitle() }}</strong>:
                        @if($column->isHtml())
                            {!! $column->setIndexes($rowIndex, $colIndex)->renderContents($row) !!}
                        @else
                            {{ $column->setIndexes($rowIndex, $colIndex)->renderContents($row) }}
                        @endif
                    </p>
                @endforeach
            </div>
        </td>
    </tr>
@endif

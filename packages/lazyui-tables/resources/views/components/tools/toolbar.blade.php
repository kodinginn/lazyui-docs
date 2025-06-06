@aware([ 'tableName' ])
@props([])
@php($toolBarAttributes = $this->getToolBarAttributesBag)

<div
    {{
        $toolBarAttributes->merge()
            ->class([
                'md:flex md:justify-between' => ($toolBarAttributes['default-styling'] ?? true),
            ])
            ->except(['default','default-styling','default-colors'])
    }}
>
    <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex items-center space-y-4 md:space-y-0 md:space-x-2" >
        @if ($this->hasConfigurableAreaFor('toolbar-left-start'))
            <div x-cloak x-show="!currentlyReorderingStatus" class="flex rounded-md shadow-sm">
                @include($this->getConfigurableAreaFor('toolbar-left-start'), $this->getParametersForConfigurableArea('toolbar-left-start'))
            </div>
        @endif

        @if ($this->showReorderButton())
            <x-livewire-tables::tools.toolbar.items.reorder-buttons />
        @endif

        @if ($this->showSearchField())
            <x-livewire-tables::tools.toolbar.items.search-field />
        @endif

        @if ($this->showFiltersButton())
            <x-livewire-tables::tools.toolbar.items.filter-button />
        @endif

        @if($this->showActionsInToolbarLeft())
            <x-livewire-tables::includes.actions/>
        @endif

        @if ($this->hasConfigurableAreaFor('toolbar-left-end'))
            <div x-cloak x-show="!currentlyReorderingStatus" class="flex rounded-md shadow-sm">
                @include($this->getConfigurableAreaFor('toolbar-left-end'), $this->getParametersForConfigurableArea('toolbar-left-end'))
            </div>
        @endif
    </div>

    <div x-cloak x-show="!currentlyReorderingStatus" class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2">
        @includeWhen($this->hasConfigurableAreaFor('toolbar-right-start'), $this->getConfigurableAreaFor('toolbar-right-start'), $this->getParametersForConfigurableArea('toolbar-right-start'))

        @if($this->showActionsInToolbarRight())
            <x-livewire-tables::includes.actions/>
        @endif

        @if ($this->showBulkActionsDropdownAlpine() && $this->shouldAlwaysHideBulkActionsDropdownOption != true)
            <x-livewire-tables::tools.toolbar.items.bulk-actions />
        @endif

        @if ($this->columnSelectIsEnabled)
            <x-livewire-tables::tools.toolbar.items.column-select />
        @endif

        @if ($this->showPaginationDropdown())
            <x-livewire-tables::tools.toolbar.items.pagination-dropdown />
        @endif

        @includeWhen($this->hasConfigurableAreaFor('toolbar-right-end'), $this->getConfigurableAreaFor('toolbar-right-end'), $this->getParametersForConfigurableArea('toolbar-right-end'))
    </div>
</div>


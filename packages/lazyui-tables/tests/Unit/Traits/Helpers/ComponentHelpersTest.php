<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Unit\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Models\Pet;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

final class ComponentHelpersTest extends TestCase
{
    public function test_can_see_if_component_has_model(): void
    {
        $this->assertTrue($this->basicTable->hasModel());
    }

    public function test_can_get_component_model(): void
    {
        $this->assertSame(Pet::class, $this->basicTable->getModel());
    }

    public function test_can_get_current_theme(): void
    {
        $this->assertEquals('tailwind', $this->basicTable->getTheme());
    }

    public function test_can_get_default_empty_message(): void
    {
        $this->assertEquals(__($this->basicTable->getLocalisationPath().'No items found, try to broaden your search'), $this->basicTable->getEmptyMessage());
    }

    public function test_can_get_offline_status(): void
    {
        $this->assertTrue($this->basicTable->getOfflineIndicatorStatus());

        $this->assertTrue($this->basicTable->offlineIndicatorIsEnabled());

        $this->basicTable->setOfflineIndicatorDisabled();

        $this->assertTrue($this->basicTable->offlineIndicatorIsDisabled());

        $this->assertFalse($this->basicTable->getOfflineIndicatorStatus());
    }

    public function test_can_get_default_sorting_labels(): void
    {
        $this->assertSame('A-Z', $this->basicTable->getDefaultSortingLabelAsc());
        $this->assertSame('Z-A', $this->basicTable->getDefaultSortingLabelDesc());
    }

    public function test_can_get_query_string_status(): void
    {
        $this->assertTrue($this->basicTable->getQueryStringStatus());

        $this->assertTrue($this->basicTable->queryStringIsEnabled());

        $this->basicTable->setQueryStringDisabled();

        $this->assertTrue($this->basicTable->queryStringIsDisabled());

        $this->assertFalse($this->basicTable->getQueryStringStatus());
    }

    public function test_can_get_table_name(): void
    {
        $this->assertSame('table', $this->basicTable->getTableName());

        $this->basicTable->setTableName('table2');

        $this->assertSame('table2', $this->basicTable->getTableName());
    }

    public function test_can_get_page_name(): void
    {
        $this->assertNull($this->basicTable->getPageName());

        $this->basicTable->setPageName('page2');

        $this->assertSame('page2', $this->basicTable->getPageName());
    }

    public function test_can_check_if_table_equals_name(): void
    {
        $this->assertTrue($this->basicTable->isTableNamed('table'));
        $this->assertFalse($this->basicTable->isTableNamed('table2'));

        $this->basicTable->setTableName('table2');

        $this->assertTrue($this->basicTable->isTableNamed('table2'));
    }

    public function test_can_check_if_table_has_page_name(): void
    {
        $this->assertFalse($this->basicTable->hasPageName());

        $this->basicTable->setPageName('page2');

        $this->assertTrue($this->basicTable->hasPageName());
    }

    public function test_can_get_eager_load_relations_status(): void
    {
        $this->assertFalse($this->basicTable->eagerLoadAllRelationsIsEnabled());

        $this->basicTable->setEagerLoadAllRelationsEnabled();

        $this->assertFalse($this->basicTable->eagerLoadAllRelationsIsDisabled());

        $this->assertTrue($this->basicTable->eagerLoadAllRelationsIsEnabled());

        $this->basicTable->setEagerLoadAllRelationsDisabled();

        $this->assertFalse($this->basicTable->eagerLoadAllRelationsIsEnabled());

        $this->assertTrue($this->basicTable->eagerLoadAllRelationsIsDisabled());
    }

    public function test_can_get_collapsing_columns_status(): void
    {
        $this->assertTrue($this->basicTable->getCollapsingColumnsStatus());

        $this->assertTrue($this->basicTable->CollapsingColumnsAreEnabled());

        $this->basicTable->setCollapsingColumnsDisabled();

        $this->assertTrue($this->basicTable->CollapsingColumnsAreDisabled());

        $this->assertFalse($this->basicTable->getCollapsingColumnsStatus());
    }

    public function test_can_check_for_tr_url(): void
    {
        $this->assertFalse($this->basicTable->hasTableRowUrl());

        $this->basicTable->setTableRowUrl(function ($row) {
            return 'https://example.com';
        });

        $this->assertTrue($this->basicTable->hasTableRowUrl());
    }

    public function test_can_get_additional_selects(): void
    {
        $this->assertEquals([], $this->basicTable->getAdditionalSelects());

        $this->basicTable->setAdditionalSelects(['id', 'name']);

        $this->assertEquals(['id', 'name'], $this->basicTable->getAdditionalSelects());
    }

    public function test_can_get_additional_selects_nonarray(): void
    {
        $this->assertEquals([], $this->basicTable->getAdditionalSelects());

        $this->basicTable->setAdditionalSelects('name');

        $this->assertEquals(['name'], $this->basicTable->getAdditionalSelects());
    }

    public function test_can_add_additional_selects(): void
    {
        $this->assertEquals([], $this->basicTable->getAdditionalSelects());

        $this->basicTable->setAdditionalSelects(['id', 'name']);

        $this->assertEquals(['id', 'name'], $this->basicTable->getAdditionalSelects());

        $this->basicTable->addAdditionalSelects(['updated_at']);

        $this->assertEquals(['id', 'name', 'updated_at'], $this->basicTable->getAdditionalSelects());
    }

    public function test_can_add_additional_selects_nonarray(): void
    {
        $this->assertEquals([], $this->basicTable->getAdditionalSelects());

        $this->basicTable->setAdditionalSelects('name');

        $this->assertEquals(['name'], $this->basicTable->getAdditionalSelects());

        $this->basicTable->addAdditionalSelects('updated_at');

        $this->assertEquals(['name', 'updated_at'], $this->basicTable->getAdditionalSelects());
    }

    // Exists in DataTableComponentTest
    // public function test_can_get_dataTable_fingerprint(): void
    // {
    //     $this->assertSame($this->defaultFingerPrintingAlgo($this->basicTable::class), $this->basicTable->getDataTableFingerprint());
    // }

    public function test_can_get_query_string_alias_and_it_will_be_the_same_as_table_name_by_default(): void
    {
        $this->assertSame($this->basicTable->getTableName(), $this->basicTable->getQueryStringAlias());
    }
}

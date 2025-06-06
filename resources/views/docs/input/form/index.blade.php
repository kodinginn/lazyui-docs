@extends('docs.layouts.app')

@section('content')
    <div class="lazy-container-sm">

        <div class="flex flex-col gap-10">
            <section>
                <div class="mb-5">
                    <div class="text-3xl font-bold">Form</div>
                    <div class="text-cat-500 text-sm">A form component.</div>
                </div>
                <div>
                    <div class="text-sm mb-3">Before you can use this component, you need to run this command to publish the component to <code class="break-words">resources/views/components</code>.</div>
                    <div class="rounded-xl bg-white dark:bg-cat-800 border border-dashed border-cat-300 dark:border-cat-700">
                        <pre class="text-[0.9rem]"><code class="language-">php artisan lazy:component form</code></pre>
                    </div>
                </div>
            </section>

            <section>
                <div class="mb-5">
                    <div class="text-xl font-semibold">Usage</div>
                    {{-- <div class="text-cat-500 text-sm"></div> --}}
                </div>
                <div x-data="{ tab: 'preview' }">
                    <div class="flex items-center justify-start text-sm mb-5 text-cat-500">
                        <button type="button" x-on:click="tab = 'preview'" :class="{ 'active': tab === 'preview' }" class="px-3 py-1.5 border-b-2 border-transparent [&.active]:text-cat-800 [&.active]:dark:text-white [&.active]:border-cat-800 [&.active]:dark:border-white cursor-pointer">Preview</button>
                        <button type="button" x-on:click="tab = 'code'" :class="{ 'active': tab === 'code' }" class="px-3 py-1.5 border-b-2 border-transparent [&.active]:text-cat-800 [&.active]:dark:text-white [&.active]:border-cat-800 [&.active]:dark:border-white cursor-pointer">Code</button>
                    </div>

                    <div>
                        <div class="rounded-xl bg-white dark:bg-cat-800 border border-dashed border-cat-300 dark:border-cat-700">
                            <div x-show="tab === 'preview'">
                                <div class="flex flex-wrap gap-3 justify-center px-3 py-10 max-w-xs mx-auto">
                                    @include('docs.input.form.basic')
                                </div>
                            </div>

                            <div x-show="tab === 'code'" x-cloak>
                                @php
                                    $file = resource_path('views/docs/input/form/basic.blade.php');
                                    $content = file_exists($file) ? file_get_contents($file) : 'File not found';
                                @endphp
                                <pre class="text-[0.9rem] p-0"><code class="language-html">{{ $content }}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="mb-5">
                    <div class="text-xl font-semibold">Event Listener</div>
                    {{-- <div class="text-cat-500 text-sm"></div> --}}
                </div>
                <div x-data="{ tab: 'preview' }">
                    <div class="flex items-center justify-start text-sm mb-5 text-cat-500">
                        <button type="button" x-on:click="tab = 'preview'" :class="{ 'active': tab === 'preview' }" class="px-3 py-1.5 border-b-2 border-transparent [&.active]:text-cat-800 [&.active]:dark:text-white [&.active]:border-cat-800 [&.active]:dark:border-white cursor-pointer">Preview</button>
                        <button type="button" x-on:click="tab = 'code'" :class="{ 'active': tab === 'code' }" class="px-3 py-1.5 border-b-2 border-transparent [&.active]:text-cat-800 [&.active]:dark:text-white [&.active]:border-cat-800 [&.active]:dark:border-white cursor-pointer">Code</button>
                    </div>

                    <div>
                        <div class="rounded-xl bg-white dark:bg-cat-800 border border-dashed border-cat-300 dark:border-cat-700">
                            <div x-show="tab === 'preview'">
                                <div class="flex flex-wrap gap-3 justify-center px-3 py-10 max-w-xs mx-auto">
                                    @include('docs.input.form.event')
                                </div>
                            </div>

                            <div x-show="tab === 'code'" x-cloak>
                                @php
                                    $file = resource_path('views/docs/input/form/event.blade.php');
                                    $content = file_exists($file) ? file_get_contents($file) : 'File not found';
                                @endphp
                                <pre class="text-[0.9rem] p-0"><code class="language-html">{{ $content }}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="mb-5">
                    <div class="text-xl font-semibold">Form Attributes</div>
                    {{-- <div class="text-cat-500 text-sm"></div> --}}
                </div>
                <div>
                    <div class="relative overflow-hidden rounded-md border border-cat-200 dark:border-cat-750">
                        <div class="overflow-x-auto max-w-full">
                            <table class="min-w-full divide-y divide-cat-200 dark:divide-cat-750">
                                <thead class="bg-cat-200 dark:bg-cat-750 font-semibold text-cat-800 dark:text-white">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 sm:pl-6 text-left text-sm">Attribute</th>
                                        <th scope="col" class="py-3.5 px-3 text-left text-sm">Values</th>
                                        <th scope="col" class="py-3.5 px-3 text-left text-sm">Description</th>
                                    </tr>
                                </thead>
                                <tbody x-data class="divide-y divide-cat-200 dark:divide-cat-750 bg-white dark:bg-cat-800 text-sm font-medium text-cat-800 dark:text-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">:toast</td>
                                        <td class="whitespace-nowrap py-4 px-3">true | false (default: true)</td>
                                        <td class="whitespace-nowrap py-4 px-3">Show or hide toast message (loading, success, error)</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">toastErrors</td>
                                        <td class="whitespace-nowrap py-4 px-3">summary | detailed (default: summary)</td>
                                        <td class="whitespace-nowrap py-4 px-3">
                                            Specifies the format for displaying errors as toasts. <br />
                                            <strong>summary</strong>: shows only the first error from each field. <br />
                                            <strong>detailed</strong>: shows all errors from each field in order.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="mb-5">
                    <div class="text-xl font-semibold">Example Backend</div>
                    {{-- <div class="text-cat-500 text-sm"></div> --}}
                </div>
                @php
                    $file = resource_path('views/docs/input/form/backend.blade.php');
                    $content = file_exists($file) ? file_get_contents($file) : 'File not found';
                @endphp
                <pre class="text-[0.9rem] p-0"><code class="language-php">{{ $content }}</code></pre>
            </section>
        </div>

    </div>
@endsection

@push('head')
    <link rel="stylesheet" href="{{ asset('assets/lazy/vendor/highlight/lazy.css') }}">
@endpush

@push('body')
    <script src="{{ asset('assets/lazy/vendor/highlight/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/lazy/vendor/highlight/lazy.js') }}"></script>
@endpush

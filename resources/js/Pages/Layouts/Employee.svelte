<script>
    import { inertia, Link } from '@inertiajs/svelte'
    import Navigation from './Navigations/Employee.svelte'
    export let title = ""
    export let current_navigation = ""
    let hide_mobile_menu = true;
</script>

<!--
This example requires updating your template:

```
<html class="h-full bg-blue-100">
<body class="h-full">
    ```
-->
<div class="min-h-full">
    <nav class="bg-blue-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" use:inertia>
                            <img class="h-8" src="https://ayp-group.com/wp-content/uploads/2021/11/AYP-logo.png" alt="AYP group">
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-blue-900 text-white", Default: "text-blue-300 hover:bg-blue-700 hover:text-white" -->
                            <Navigation {current_navigation} />
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-blue-800 p-2 text-blue-400 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-800" aria-controls="mobile-menu" aria-expanded="false" on:click|preventDefault|stopPropagation={() => {hide_mobile_menu = !hide_mobile_menu}}>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden {hide_mobile_menu ? 'hidden' : ''}" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-blue-900 text-white", Default: "text-blue-300 hover:bg-blue-700 hover:text-white" -->
                <Navigation {current_navigation} is_mobile={true}/>
            </div>
        </div>
    </nav>
    
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-blue-900">{title}</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 px-3">
            <slot />
        </div>
    </main>
</div>
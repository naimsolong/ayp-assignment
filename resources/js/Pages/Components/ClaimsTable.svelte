<script>
    import { inertia, Link } from '@inertiajs/svelte'
    
    export let data = []
    
    function statusBackgroundColor(status) {
        if(status == 'D')
            return 'bg-gray-200'
        if(status == 'A')
            return 'bg-green-200'
        if(status == 'R')
            return 'bg-red-200'
    }
</script>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-left text-gray-500">
        <thead class=" text-gray-700 bg-blue-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            {#each data.data as row}
            <tr class="bg-white border-b hover:bg-blue-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {row.display_type}
                </th>
                <td class="px-6 py-4">
                    {row.description}
                </td>
                <td class="px-6 py-4">
                    {row.date}
                </td>
                <td class="px-6 py-4 {statusBackgroundColor(row.status)} font-bold">
                    {row.display_status}
                </td>
                <td class="px-6 py-4 text-right">
                    {#if row.status == 'D' && row.submitted_at == null}
                    <a href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</a>
                    {:else}
                    <span class="text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Edit</span>
                    {/if}
                </td>
            </tr>
            {:else}
            <tr class="bg-white border-b hover:bg-blue-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="5">
                    No data available
                </th>
            </tr>
            {/each}
        </tbody>
    </table>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="{data.prev_page_url}" use:inertia class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" disable={data.prev_page_url == null}>Previous</a>
            <a href="{data.next_page_url}" use:inertia class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" disable={data.next_page_url == null}>Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{data.from}</span>
                    to
                    <span class="font-medium">{data.to}</span>
                    of
                    <span class="font-medium">{data.total}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="{data.prev_page_url}" use:inertia class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0" disable={data.prev_page_url == null}>
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Current: "z-10 bg-blue-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->

                    {#each data.links as link}
                    {#if link.label != '&laquo; Previous' &&  link.label != 'Next &raquo;'}
                    <a href="{link.url}" use:inertia class="relative {link.active ? 'z-10 bg-blue-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600' : 'text-gray-900 focus:outline-offset-0'} inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20 border border-gray-300 " disable={link.url == null}>{link.label}</a>
                    {/if}
                    {/each}
                    <a href="{data.next_page_url}" use:inertia class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0" disable={data.next_page_url == null}>
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
    import Layout from "~Layouts/Admin.svelte"
    import Table from "~Components/ClaimsTable.svelte"
    import { inertia } from "@inertiajs/svelte";
    
    export let tab = 'all'

    export let claims = []

    let getPlaceholder = (tab) => {
        if(tab == 'draft')
            return 'Here is the list of claim that currently either <strong class="font-bold text-gray-800">draft</strong> or <strong class="font-bold text-gray-800">waiting for approval</strong>.'
        if(tab == 'approved')
            return 'Here is the list of <strong class="font-bold text-green-800">approved</strong> claim.'
        if(tab == 'rejected')
            return 'Here is the list of <strong class="font-bold text-red-800">rejected</strong> claim.'

        return 'Here is the list of <strong class="font-bold text-gray-800">all</strong> claim submitted.'
    }
</script>

<Layout title="Admin's Dashboard" current_navigation="admin_dashboard">

    <div class="mb-4 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <a href='/dashboard/admin?tab=all' use:inertia class="inline-block p-4 border-b-2 {tab == 'all' ? 'rounded-t-lg font-bold' : 'border-transparent hover:text-gray-600 hover:border-gray-30'}">All</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href='/dashboard/admin?tab=draft' use:inertia class="inline-block p-4 border-b-2 {tab == 'draft' ? 'rounded-t-lg font-bold' : 'border-transparent hover:text-gray-600 hover:border-gray-30'}">Draft</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href='/dashboard/admin?tab=approved' use:inertia class="inline-block p-4 border-b-2 {tab == 'approved' ? 'rounded-t-lg font-bold' : 'border-transparent hover:text-gray-600 hover:border-gray-30'}">Approved</a>
            </li>
            <li role="presentation">
                <a href='/dashboard/admin?tab=rejected' use:inertia class="inline-block p-4 border-b-2 {tab == 'rejected' ? 'rounded-t-lg font-bold' : 'border-transparent hover:text-gray-600 hover:border-gray-30'}">Rejected</a>
            </li>
        </ul>
    </div>
    <div id="myTabContent" class="mb-5">
        <div class="p-4 rounded-lg bg-gray-50" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500">{@html getPlaceholder(tab)}</p>
        </div>
    </div>

    <Table data={claims}/>
</Layout>
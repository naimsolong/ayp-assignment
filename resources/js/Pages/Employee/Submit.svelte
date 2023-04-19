<script>
    import { router } from '@inertiajs/svelte'
    import Layout from "~Layouts/Employee.svelte"
    
    export let types = []

    $: values = {
        type: '',
        date: '',
        description: '',
        amount: 0
    }

    let handleSubmit = () => {
        router.post('/dashboard/employee/submit', values)
    }
</script>

<Layout title="Submit Claim" current_navigation="employee_claim">
    <form on:submit|preventDefault|stopPropagation={handleSubmit}>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type (required)</label>
                <select id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required bind:value={values.type}>
                    <option value="" selected>Choose a claim type</option>
                    {#each types as type}
                    <option value="{type.value}">{type.text}</option>
                    {/each}
                </select>
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Date (required)</label>
                <input type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required bind:value={values.date}>
            </div>
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
            <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Description..." bind:value={values.description}>
        </div>
        <div class="mb-6">
            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Amount (required)</label>
            <input type="number" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Amount" bind:value={values.amount}>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
</Layout>
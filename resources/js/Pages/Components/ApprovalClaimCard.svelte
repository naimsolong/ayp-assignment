<script>
	import { createEventDispatcher } from 'svelte';

	const dispatch = createEventDispatcher();
    
	function forwardReject(id) {
		dispatch('click', {
            action: 'reject',
			id: id
		});
	}
    
	function forwardApprove(id) {
		dispatch('click', {
            action: 'approve',
			id: id
		});
	}
    
    export let data = {}
</script>

<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <h5 class="mb-2 text-3xl font-bold text-gray-900">{data.display_type}</h5>
    {#if data.description != ''}
    <p class="mb-2 text-base text-gray-500 sm:lg">{data.description}</p>
    {/if}
    <p class="mb-2 text-base text-gray-500 sm:lg">Date: {data.display_date}</p>
    <p class="mb-2 text-base text-gray-500 sm:lg">Amount: {data.amount}</p>
    <div class="my-3 items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
        <button class="w-full sm:w-auto bg-red-800 hover:bg-red-700 focus:ring-1 focus:outline-none focus:ring-red-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5" on:click|preventDefault|stopPropagation={() => forwardReject(data.id)}>
            <div class="text-left">
                <div class="w-20 mb-1 font-sans text-center font-bold">Reject </div>
            </div>
        </button>
        <button class="w-full sm:w-auto bg-green-800 hover:bg-green-700 focus:ring-1 focus:outline-none focus:ring-green-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5" on:click|preventDefault|stopPropagation={() => forwardApprove(data.id)}>
            <div class="text-left">
                <div class="w-20 mb-1 font-sans text-center font-bold">Approve</div>
            </div>
        </button>
    </div>
    <p class="mb-2 text-sm text-gray-500">Submitted At: {data.display_submitted_at}</p>
</div>
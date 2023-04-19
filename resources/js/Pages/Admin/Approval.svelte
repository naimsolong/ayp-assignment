<script>
    import axios from 'axios'
    import Layout from "~Layouts/Admin.svelte"
    import Card from "~Components/ApprovalClaimCard.svelte"

    export let claims = []

    let handleClaim = (event) => {
        let action = event.detail['action']
        let id = event.detail['id']

        axios.post('/api/dashboard/admin/claim/'+id+'/'+action)

        claims = claims.filter(claim => claim.id != id)
    }
</script>


<Layout title="Claim Approval" current_navigation="admin_approval">
    <div class="flex flex-col">
        {#each claims as claim}
        <div class="my-4">
            <Card data={claim} on:click={handleClaim}/>
        </div>
        {/each}
    </div>
</Layout>
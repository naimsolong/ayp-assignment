<script>
    import Table from "~Components/ClaimsTable.svelte"
    import Layout from "~Layouts/Employee.svelte"
    
    export let claims = []
</script>

<Layout title="Employee's Dashboard" current_navigation="employee_dashboard">
    <Table data={claims} edit_url="/dashboard/employee/edit/"/>
</Layout>
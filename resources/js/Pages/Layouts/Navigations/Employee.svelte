<script>
    import { inertia, Link } from '@inertiajs/svelte'
    export let is_mobile = false
    export let current_navigation = ""
</script>

<a href="/dashboard/employee" use:inertia class="{current_navigation == 'employee_dashboard' ? 'bg-blue-900' : 'text-blue-300 hover:bg-blue-700'} text-white rounded-md px-3 py-2 {is_mobile ? 'block text-base' : 'text-sm'} font-medium">Dashboard</a>
                            
<a href="/dashboard/employee/submit" use:inertia class="{current_navigation == 'employee_claim' ? 'bg-blue-900' : 'text-blue-300 hover:bg-blue-700'} hover:text-white rounded-md px-3 py-2 {is_mobile ? 'block text-base' : 'text-sm'} font-medium">Submit claim</a>
<script>
    import { inertia, Link } from '@inertiajs/svelte'
    export let is_mobile = false
    export let current_navigation = ""
</script>

<a href="/dashboard/admin" use:inertia class="{current_navigation == 'admin_dashboard' ? 'bg-red-900' : 'text-red-300 hover:bg-red-700'} text-white rounded-md px-3 py-2 {is_mobile ? 'block text-base' : 'text-sm'} font-medium">Dashboard</a>
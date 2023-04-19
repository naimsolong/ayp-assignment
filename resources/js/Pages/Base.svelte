<script>
    import { inertia, Link } from '@inertiajs/svelte'
</script>

<div class="flex flex-row items-center justify-center py-20 px-20">
    <!-- centered content -->
  
    <a href="/dashboard/employee" use:inertia class="text-white bg-blue-800 m-5 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-blue-500">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white-900">Employee</h5>
        <p class="font-normal text-white-700">Here is dashboard for employee view. Employee are able to:</p>
        <ul class="list-disc ml-4 font-semibold">
            <li>Submit claim</li>
            <li>Check claim's status and details</li>
        </ul>
    </a>

    <a href="/dashboard/admin" use:inertia class="text-white bg-red-800 m-5 block max-w-sm p-6 bg-red border border-gray-200 rounded-lg shadow hover:bg-red-500">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white-900">Admin</h5>
        <p class="font-normal text-white-700">Here is dashboard for admin or HR view. Admin are able to:</p>
        <ul class="list-disc ml-4 font-semibold">
            <li>View employee's claim</li>
            <li>Approve or reject claim</li>
        </ul>
    </a>
  
    <!-- end centered content -->
  </div>
  

  

<template>
    <nav>
        <ul class="flex space-x-6">
            <li><NavLink href="/Home" :active="$page.component === '/home'">Home</NavLink></li>
            <li><NavLink href="/Users" :active="$page.component === 'Users'">Users</NavLink></li>
            <li><NavLink href="/Setting" :active="$page.component === 'Setting'">Setting</NavLink></li>
            <li><NavLink href="/logout" :active="$page.component === 'logout'" method="post" :data="{foo : 'bar'}">logout</NavLink></li>
<!--            <li><Link href="/home" class="text-blue-500 hover:text-blue-400 hover:underline" :class="{'font-bold underline': $page.url === '/home'}">Home</Link></li>-->
<!--            <li><Link href="/Users?foo=bar&bar=buzz" class="text-blue-500 hover:text-blue-400 hover:underline" :class="{'font-bold underline': $page.component === 'Users' }">User</Link></li>-->
<!--            <li><Link href="/Setting" class="text-blue-500 hover:text-blue-400 hover:underline" :class="{'font-bold underline': $page.component === 'Setting'}">Setting</Link></li>-->
<!--            <li><Link href="/logout" method="post" :data="{foo : 'bar'}" class="text-blue-500 hover:text-blue-400 hover:underline" :class="{'font-bold underline': $page.component === '/LogOut'}">LogOut</Link></li>-->
        </ul>
    </nav>
</template>

<script>
import  NavLink  from './NavLink.vue';
export default {
    name: "Nav",
    components: { NavLink },
    computed: {
        $page() {
            return this.$inertia.page;
        }
    }
}
</script>

<style scoped>

</style>

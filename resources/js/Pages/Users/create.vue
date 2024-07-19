<template>
    <Head title="Create User"/>
    <h1 class="text-3xl">Create New User</h1>
    <form @submit.prevent="submit" action="" class="max-w-md mx-auto mt-7">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
            <input type="text" v-model="form.name" class="border border-gray-400 p-2 w-full" name="name" id="name">
            <div v-if="errors.name" v-text="errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
            <input type="email" v-model="form.email" class="border border-gray-400 p-2 w-full" name="email" id="email">
            <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>


        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input type="password" v-model="form.password" class="border border-gray-400 p-2 w-full" name="password" id="password">
            <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
defineProps({
    errors:Object
});

let form = useForm({
    name : "",
    email : "",
    password : "",
});
let submit = () => {
    form.post('/Users',form);
}
</script>

<style scoped>

</style>

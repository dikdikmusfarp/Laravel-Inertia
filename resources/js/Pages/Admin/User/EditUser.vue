<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';


const props = defineProps({
    user: Object,
})

// masukin data ke form dari props jangan lupa import
const form = useForm({
    name: props.user.name,
    username: props.user.username,
    email: props.user.email,
})

// ini buat submit si datanya pake route jangan lupa dan idnya ngambil dari prop lagii
const submit = () => {
    form.put(route('user.update', {id: props.user.id}));
}


</script>

<template>
    <AdminLayout>
        <template #pretitle>User Data</template>
        <template #title>Edit User Data</template>
        <div class="card">
            <!-- action ngambil dari const submit -->
            <form @submit.prevent="submit">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" v-model="form.name" class="form-control"
                            :class="{ 'is-invalid': $page.props.errors.name }" placeholder="Name">
                        <div class="invalid-feedback">{{ $page.props.errors.name }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" v-model="form.username" class="form-control"
                            :class="{ 'is-invalid': $page.props.errors.username }" placeholder="Username">
                        <div class="invalid-feedback">{{ $page.props.errors.username }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" v-model="form.email" class="form-control"
                            :class="{ 'is-invalid': $page.props.errors.email }" placeholder="Email">
                        <div class="invalid-feedback">{{ $page.props.errors.email }}</div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </AdminLayout>
</template>

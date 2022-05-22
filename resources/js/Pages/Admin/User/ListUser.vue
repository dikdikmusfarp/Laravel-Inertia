<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Pagination from '@/Components/Pagination.vue';
import { Head } from '@inertiajs/inertia-vue3';


const search = ref(props.filters?.search)
const role = ref(props.filters?.role)

// Untuk mengambil data user yang berupa objek
const props = defineProps({
    users: Object,
    filters: Object,
})

function filterRole() {
    Inertia.get(route('admin.user.index'), {
        role: role.value,
        search: search.value,
    }, {
        // mematikan agar tulisan di search tidak hilang
        preserveState: true,
        replace: true,
    })
}

// Untuk funsi search
watch(search, value => {
    // tereksekusi ketika ada perubahan di data search
    Inertia.get(route('admin.user.index'), {
        search: value,
        role: role.value,
    }, {
        // mematikan agar tulisan di search tidak hilang
        preserveState: true,
    })
})
</script>

<template>
    <Head title="List User"></Head>
    <AdminLayout>
        <template #pretitle>User</template>
        <!--Seperti fungsi section @section('pretitle')-->
        <template #title>List User</template>
        <!--Seperti fungsi section @section('title')-->

        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" v-model="search" placeholder="search...">
            </div>
            <div class="col-md-6">
                <select v-model="role" @change="filterRole" class="form-select">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ini seperti fungsi forelse (v-for) dengan key berupa user.id-->
                        <tr v-for="user in users.data" :key="user.id">
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <img :src="user.avatar_url" class="avatar me-2" />
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ user.name }}</div>
                                        <div class="text-muted"><a href="#" class="text-reset">{{ user.email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted" data-label="Role">
                                {{ user.role }}
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <!-- tombol tag a di ganti jadi link lalu di bind href -->
                                    <Link :href="route('admin.user.edit', { id: user.id })" class="btn">
                                    Edit
                                    </Link>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <Link :href="route('admin.user.destroy', { id: user.id })" method="delete"
                                                as="button" class="dropdown-item" href="#">
                                            Delete
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <!-- Ngambil dari Pagination component -->
                <Pagination :links="users.links"></Pagination>
            </div>
        </div>
    </AdminLayout>
</template>

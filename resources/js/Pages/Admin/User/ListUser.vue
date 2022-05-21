<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import { ref,watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';


const search = ref(props.filters?.search)
const role = ref(props.filters?.role)

// Untuk mengambil data user yang berupa objek
const props = defineProps({
    users: Object,
    filters: Object,
})

function filterRole() {
    Inertia.get(route('user.index'), {
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
    Inertia.get(route('user.index'), {
        search: value,
        role: role.value,
    }, {
        // mematikan agar tulisan di search tidak hilang
        preserveState: true,
    })
})
</script>

<template>
    <AdminLayout>
        <template #pretitle>User</template> <!--Seperti fungsi section @section('pretitle')-->
        <template #title>List User</template> <!--Seperti fungsi section @section('title')-->

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
                                User
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="#" class="btn">
                                        Edit
                                    </a>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <!-- ini untuk pagination tag a bisa diganti menjadi tag link-->
                    <!-- bind class diambil untuk if trus tulisannya akan aktif-->
                    <li class="page-item" :class="{ 'active': link.active }" v-for="link in users.links">
                        <Link :href="link.url" class="page-link" v-html="link.label">
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </AdminLayout>
</template>

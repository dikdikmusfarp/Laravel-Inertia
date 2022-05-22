<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import Pagination from '@/Components/Pagination.vue';



const props = defineProps({

    items: Object,

})

</script>

<template>
    <AdminLayout>
        <template #pretitle>Item</template>
        <template #title>List Item</template>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Views</th>
                            <th>Status</th>
                            <!-- <th>User</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items.data" :key="item.id">
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ item.name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted" data-label="Role">
                                {{ item.description }}
                            </td>
                            <td class="text-muted" data-label="Role">
                                {{ item.price }}
                            </td>
                            <td class="text-muted" data-label="Role">
                                {{ item.views }}
                            </td>
                            <td class="text-muted" data-label="Role">
                                {{ item.approved_at ? 'Approved' : 'Pending' }}
                            </td>
                            <!-- <td class="text-muted" data-label="Role">
                                {{ item.user.name }}
                            </td> -->
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <!-- <div class="dropdown-menu dropdown-menu-end">
                                            <Link class="dropdown-item">
                                            Edit
                                            </Link>
                                            <Link v-if="item.approved_at == null"
                                                :href="route('admin.item.approve', { id: item.id })" method="put"
                                                as="button" class="dropdown-item" href="#">
                                            Approve
                                            </Link>
                                        </div> -->
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex align-items-center">
                <!-- Ngambil dari Pagination component -->
                <Pagination :links="items.links"></Pagination>
            </div>
        </div>
    </AdminLayout>
</template>

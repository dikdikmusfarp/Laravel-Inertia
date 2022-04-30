<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'

defineProps({
    users: Object,
})
</script>

<template>
    <AdminLayout>
        <template #pretitle>User</template>
        <template #title>List User</template>

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
                <tr v-for="user in users" :key="user.id">
                  <td data-label="Name" >
                    <div class="d-flex py-1 align-items-center">
                      <img :src="user.avatar_url" class="avatar me-2" />
                      <div class="flex-fill">
                        <div class="font-weight-medium">{{ user.name }}</div>
                        <div class="text-muted"><a href="#" class="text-reset">{{ user.email }}</a></div>
                      </div>
                    </div>
                  </td>
                  <td class="text-muted" data-label="Role" >
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
        </div>
    </AdminLayout>
</template>
